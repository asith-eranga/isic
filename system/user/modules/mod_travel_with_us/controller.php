<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "travel_with_us";

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
      $travel_with_us = new Mod_TravelWithUs();
      $travel_with_us->createTable();

      $views = new Default_Views();
      $views->setModule('travel_with_us');

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
      $views->setModule('travel_with_us');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('travel_with_us');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $travel_with_us = new Mod_TravelWithUs();

      $travel_with_us->setValues($_POST);
	  $travel_with_us->setSortOrder($travel_with_us->nextOrderValue());
      $travel_with_us->setCreatedBy(Sessions::getAdminId());
      $travel_with_us->setCreatedDate(time());

      if ($travel_with_us->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_travel_with_us", "add", "New detail has been added successfully");

            Default_Common::jsonSuccess("New detail has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('travel_with_us');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $travel_with_us = new Mod_TravelWithUs();

      $travel_with_us->setValues($_POST);

      $travel_with_us->setModifiedBy(Sessions::getAdminId());
      $travel_with_us->setModifiedDate(time());

      if ($travel_with_us->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_travel_with_us", "edit", "Details has been Updated successfully.");

            Default_Common::jsonSuccess("Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $travel_with_us = new Mod_TravelWithUs();

      $travel_with_us->setId($_POST['id']);

      if ($travel_with_us->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_travel_with_us", "delete", "Detail Deleted successfully.");

            Default_Common::jsonSuccess("Detail Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $travel_with_us = new Mod_TravelWithUs();
            $travel_with_us->setSortOrder($position);
            $travel_with_us->setId($item);
            $travel_with_us->updateSortOrder();
      }
}

?>