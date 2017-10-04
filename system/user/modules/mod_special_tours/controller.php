<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "test";

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
      $special_tours = new Mod_SpecialTours();
      $special_tours->createTable();

      $views = new Default_Views();
      $views->setModule('special_tours');

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
      $views->setModule('special_tours');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('special_tours');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $special_tours = new Mod_SpecialTours();

      $special_tours->setValues($_POST);
	  $special_tours->setSortOrder($special_tours->nextOrderValue());
      $special_tours->setCreatedBy(Sessions::getAdminId());
      $special_tours->setCreatedDate(time());

      if ($special_tours->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_special_tours", "add", "New Special tour has been added successfully");

            Default_Common::jsonSuccess("New Special tour has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('special_tours');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $special_tours = new Mod_SpecialTours();

      $special_tours->setValues($_POST);

      $special_tours->setModifiedBy(Sessions::getAdminId());
      $special_tours->setModifiedDate(time());

      if ($special_tours->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_special_tours", "edit", "Special tour Details has been Updated successfully.");

            Default_Common::jsonSuccess("Special tour Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $special_tours = new Mod_SpecialTours();

      $special_tours->setId($_POST['id']);

      if ($special_tours->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_special_tours", "delete", "Special tour Deleted successfully.");

            Default_Common::jsonSuccess("Special tour Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $special_tours = new Mod_SpecialTours();
            $special_tours->setSortOrder($position);
            $special_tours->setId($item);
            $special_tours->updateSortOrder();
      }
}

?>