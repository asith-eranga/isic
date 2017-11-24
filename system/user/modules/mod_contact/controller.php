<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "contact";

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
      $contact = new Mod_Contact();
      $contact->createTable();

      $views = new Default_Views();
      $views->setModule('contact');

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
      $views->setModule('contact');

      $views->load('admin/view', '', true);
}

function add() { }

function addPost() { }

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('contact');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $contact = new Mod_Contact();

      $contact->setValues($_POST);

      $contact->setModifiedBy(Sessions::getAdminId());
      $contact->setModifiedDate(time());

      if ($contact->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_contact", "edit", "Contact details has been Updated successfully.");

            Default_Common::jsonSuccess("Contact details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() { }

function sortTable() { }
