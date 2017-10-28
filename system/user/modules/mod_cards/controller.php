<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "cards";

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
      $cards = new Mod_Cards();
      $cards->createTable();

      $views = new Default_Views();
      $views->setModule('cards');

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
      $views->setModule('cards');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('cards');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $cards = new Mod_Cards();

      $cards->setValues($_POST);
	  $cards->setSortOrder($cards->nextOrderValue());
      $cards->setCreatedBy(Sessions::getAdminId());
      $cards->setCreatedDate(time());

      if ($cards->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_cards", "add", "New Card has been added successfully");

            Default_Common::jsonSuccess("New Card has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('cards');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $cards = new Mod_Cards();

      $cards->setValues($_POST);

      $cards->setModifiedBy(Sessions::getAdminId());
      $cards->setModifiedDate(time());

      if ($cards->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_cards", "edit", "Card Details has been Updated successfully.");

            Default_Common::jsonSuccess("Card Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $cards = new Mod_Cards();

      $cards->setId($_POST['id']);

      if ($cards->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_cards", "delete", "Card Deleted successfully.");

            Default_Common::jsonSuccess("Card Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $cards = new Mod_Cards();
            $cards->setSortOrder($position);
            $cards->setId($item);
            $cards->updateSortOrder();
      }
}