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
      $standard_tours = new Mod_StandardTours();
      $standard_tours->createTable();

      $views = new Default_Views();
      $views->setModule('standard_tours');

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
      $views->setModule('standard_tours');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('standard_tours');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $standard_tours = new Mod_StandardTours();

      $standard_tours->setValues($_POST);
	  $standard_tours->setSortOrder($standard_tours->nextOrderValue());
      $standard_tours->setCreatedBy(Sessions::getAdminId());
      $standard_tours->setCreatedDate(time());

      if ($standard_tours->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_standard_tours", "add", "New Standard tour has been added successfully");

            Default_Common::jsonSuccess("New Standard tour has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('standard_tours');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $standard_tours = new Mod_StandardTours();

      $standard_tours->setValues($_POST);

      $standard_tours->setModifiedBy(Sessions::getAdminId());
      $standard_tours->setModifiedDate(time());

      if ($standard_tours->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_standard_tours", "edit", "Standard tour Details has been Updated successfully.");

            Default_Common::jsonSuccess("Standard tour Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $standard_tours = new Mod_StandardTours();

      $standard_tours->setId($_POST['id']);

      if ($standard_tours->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_standard_tours", "delete", "Standard tour Deleted successfully.");

            Default_Common::jsonSuccess("Standard tour Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $standard_tours = new Mod_StandardTours();
            $standard_tours->setSortOrder($position);
            $standard_tours->setId($item);
            $standard_tours->updateSortOrder();
      }
}

?>