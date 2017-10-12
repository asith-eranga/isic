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
      $testimonials = new Mod_Testimonials();
      $testimonials->createTable();

      $views = new Default_Views();
      $views->setModule('testimonials');

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
      $views->setModule('testimonials');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('testimonials');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $testimonials = new Mod_Testimonials();

      $testimonials->setValues($_POST);
	  $testimonials->setSortOrder($testimonials->nextOrderValue());
      $testimonials->setCreatedBy(Sessions::getAdminId());
      $testimonials->setCreatedDate(time());

      if ($testimonials->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_testimonials", "add", "New Testimonial has been added successfully");

            Default_Common::jsonSuccess("New Testimonial has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('testimonials');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $testimonials = new Mod_Testimonials();

      $testimonials->setValues($_POST);

      $testimonials->setModifiedBy(Sessions::getAdminId());
      $testimonials->setModifiedDate(time());

      if ($testimonials->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_testimonials", "edit", "Testimonial Details has been Updated successfully.");

            Default_Common::jsonSuccess("Testimonial Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $testimonials = new Mod_Testimonials();

      $testimonials->setId($_POST['id']);

      if ($testimonials->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_testimonials", "delete", "Testimonial Deleted successfully.");

            Default_Common::jsonSuccess("Testimonial Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $testimonials = new Mod_Testimonials();
            $testimonials->setSortOrder($position);
            $testimonials->setId($item);
            $testimonials->updateSortOrder();
      }
}

?>