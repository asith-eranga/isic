<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "events";

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
      $events = new Mod_Events();
      $events->createTable();

      $views = new Default_Views();
      $views->setModule('events');

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
      $views->setModule('events');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('events');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $events = new Mod_Events();

      $events->setValues($_POST);
	  $events->setSortOrder($events->nextOrderValue());
      $events->setCreatedBy(Sessions::getAdminId());
      $events->setCreatedDate(time());

      if ($events->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("Mod_Events", "add", "New Event has been added successfully");

            Default_Common::jsonSuccess("New Event has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('events');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $events = new Mod_Events();

      $events->setValues($_POST);

      $events->setModifiedBy(Sessions::getAdminId());
      $events->setModifiedDate(time());

      if ($events->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("Mod_Events", "edit", "Event Details has been Updated successfully.");

            Default_Common::jsonSuccess("Event Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $events = new Mod_Events();

      $events->setId($_POST['id']);

      if ($events->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("Mod_Events", "delete", "Event Deleted successfully.");

            Default_Common::jsonSuccess("Event Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $events = new Mod_Events();
            $events->setSortOrder($position);
            $events->setId($item);
            $events->updateSortOrder();
      }
}

?>