<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "mod_card_page";

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
      $card_page = new Mod_CardPage();
      $card_page->createTable();

      $views = new Default_Views();
      $views->setModule('card_page');

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
      $views->setModule('card_page');
      $views->load('admin/view', '', true);
}

function add() { }

function addPost() { }

function edit() {
      require_once(dirname(__FILE__) . '/helper.php');
      $views = new Default_Views();
      $views->setModule('card_page');
      $views->load('admin/edit', '', true);
}

function updatePost() {
      require_once(dirname(__FILE__) . '/helper.php');
      $card_page = new Mod_CardPage();
      $card_page->setValues($_POST);

      $card_page->setModifiedBy(Sessions::getAdminId());
      $card_page->setModifiedDate(time());

      if ($card_page->update()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_card_page", "edit", "Card page content has been updated successfully.");
            Default_Common::jsonSuccess("Card page content has been updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() { }

function sortTable() { }
