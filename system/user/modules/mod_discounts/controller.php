<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "discounts";

switch ($action) {
      case "load":
            load();
            break;
      case "view":
            view();
            break;
      case "add":
            add();
            break;
      case "addPost":
            addPost();
            break;
      case "edit";
            edit();
            break;
      case "updatePost":
            updatePost();
            break;
      case "doDelete":
            doDelete();
            break;
	  case "sortTable":
            sortTable();
            break;
}

function load() {

      // create table if not exsists
      require_once(dirname(__FILE__) . '/helper.php');
      $discounts = new Mod_Discounts();
      $discounts->createTable();

      $views = new Default_Views();
      $views->setModule('discounts');

      //load default view
      if (!Sessions::isAdminLogged()) {
            $views->setModule('users');
            $views->load('admin/login', '', true);
      } else {
            $views->load('admin/home', '', true);
      }
}

function view() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('discounts');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('discounts');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $discounts = new Mod_Discounts();

      $discounts->setValues($_POST);
      $discounts->setCardType(serialize($_POST['card_type']));
      $discounts->setCategory(serialize($_POST['category']));
	  $discounts->setSortOrder($discounts->nextOrderValue());
      $discounts->setCreatedBy(Sessions::getAdminId());
      $discounts->setCreatedDate(time());

      if ($discounts->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("Mod_Discounts", "add", "New discount detail has been added successfully");

            Default_Common::jsonSuccess("New discount detail has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('discounts');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $discounts = new Mod_Discounts();

      $discounts->setValues($_POST);
      $discounts->setCardType(serialize($_POST['card_type']));
      $discounts->setCategory(serialize($_POST['category']));
      $discounts->setModifiedBy(Sessions::getAdminId());
      $discounts->setModifiedDate(time());

      if ($discounts->update()) {

          setDiscountOrder($_POST['sort_order']);

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("Mod_Discounts", "edit", "Discount detail has been Updated successfully.");

            Default_Common::jsonSuccess("Discount detail has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $discounts = new Mod_Discounts();

      $discounts->setId($_POST['id']);

      if ($discounts->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("Mod_Discounts", "delete", "Discount detail Deleted successfully.");

            Default_Common::jsonSuccess("Discount detail Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {
            $new_position = $position + (($_POST['page'] - 1) * 10);
            $discounts = new Mod_Discounts();
            $discounts->setSortOrder($new_position);
            $discounts->setId($item);
            $discounts->updateSortOrder();
      }
}

function setDiscountOrder($sort_order) {
    require_once(dirname(__FILE__) . '/helper.php');
    $discounts = new Mod_Discounts();
    $discounts_need_to_update = $discounts->getRequiredDiscountToUpdate($sort_order);

    for ($i = 0; $i < count($discounts_need_to_update); $i++) {
        $discounts->extractor($discounts_need_to_update, $i);
        $discounts->setSortOrder($sort_order + $i);
        $discounts->setId($discounts->id());
        $discounts->updateSortOrder();
    }
}
