<?php
define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];
$module_name = "fly_now_pay_later";

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

      // create table if not exists
      require_once(dirname(__FILE__) . '/helper.php');
      $fly_now_pay_later = new Mod_FlyNowPayLater();
      $fly_now_pay_later->createTable();

      $views = new Default_Views();
      $views->setModule('fly_now_pay_later');

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
      $views->setModule('fly_now_pay_later');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('fly_now_pay_later');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $fly_now_pay_later = new Mod_FlyNowPayLater();

      $fly_now_pay_later->setValues($_POST);
	  $fly_now_pay_later->setSortOrder($fly_now_pay_later->nextOrderValue());
      $fly_now_pay_later->setCreatedBy(Sessions::getAdminId());
      $fly_now_pay_later->setCreatedDate(time());

      if ($fly_now_pay_later->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_fly_now_pay_later", "add", "New detail has been added successfully");

            Default_Common::jsonSuccess("New detail has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('fly_now_pay_later');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $fly_now_pay_later = new Mod_FlyNowPayLater();

      $fly_now_pay_later->setValues($_POST);

      $fly_now_pay_later->setModifiedBy(Sessions::getAdminId());
      $fly_now_pay_later->setModifiedDate(time());

      if ($fly_now_pay_later->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_fly_now_pay_later", "edit", "Details has been Updated successfully.");

            Default_Common::jsonSuccess("Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $fly_now_pay_later = new Mod_FlyNowPayLater();

      $fly_now_pay_later->setId($_POST['id']);

      if ($fly_now_pay_later->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_fly_now_pay_later", "delete", "Detail Deleted successfully.");

            Default_Common::jsonSuccess("Detail Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $fly_now_pay_later = new Mod_FlyNowPayLater();
            $fly_now_pay_later->setSortOrder($position);
            $fly_now_pay_later->setId($item);
            $fly_now_pay_later->updateSortOrder();
      }
}
