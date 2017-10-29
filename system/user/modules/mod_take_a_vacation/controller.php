<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "take_a_vacation";

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
      $take_a_vacation = new Mod_TakeAVacation();
      $take_a_vacation->createTable();

      $views = new Default_Views();
      $views->setModule('take_a_vacation');

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
      $views->setModule('take_a_vacation');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('take_a_vacation');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $take_a_vacation = new Mod_TakeAVacation();

      $take_a_vacation->setValues($_POST);
	  $take_a_vacation->setSortOrder($take_a_vacation->nextOrderValue());
      $take_a_vacation->setCreatedBy(Sessions::getAdminId());
      $take_a_vacation->setCreatedDate(time());

      if ($take_a_vacation->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_take_a_vacation", "add", "New detail has been added successfully");

            Default_Common::jsonSuccess("New detail has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('take_a_vacation');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $take_a_vacation = new Mod_TakeAVacation();

      $take_a_vacation->setValues($_POST);

      $take_a_vacation->setModifiedBy(Sessions::getAdminId());
      $take_a_vacation->setModifiedDate(time());

      if ($take_a_vacation->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_take_a_vacation", "edit", "Details has been Updated successfully.");

            Default_Common::jsonSuccess("Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $take_a_vacation = new Mod_TakeAVacation();

      $take_a_vacation->setId($_POST['id']);

      if ($take_a_vacation->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_take_a_vacation", "delete", "Detail Deleted successfully.");

            Default_Common::jsonSuccess("Detail Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $take_a_vacation = new Mod_TakeAVacation();
            $take_a_vacation->setSortOrder($position);
            $take_a_vacation->setId($item);
            $take_a_vacation->updateSortOrder();
      }
}

?>