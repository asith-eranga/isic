<?php

define('_MEXEC', 'OK');
require_once("../../../../system/load.php");

$action = $_POST['action'];

$module_name = "partner_with_isic";

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
      $partner_with_isic = new Mod_PartnerWithIsic();
      $partner_with_isic->createTable();

      $views = new Default_Views();
      $views->setModule('partner_with_isic');

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
      $views->setModule('partner_with_isic');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('partner_with_isic');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $partner_with_isic = new Mod_PartnerWithIsic();

      $partner_with_isic->setValues($_POST);
	  $partner_with_isic->setSortOrder($partner_with_isic->nextOrderValue());
      $partner_with_isic->setCreatedBy(Sessions::getAdminId());
      $partner_with_isic->setCreatedDate(time());

      if ($partner_with_isic->insert()) {
            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_partner_with_isic", "add", "New detail has been added successfully");

            Default_Common::jsonSuccess("New detail has been added successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('partner_with_isic');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $partner_with_isic = new Mod_PartnerWithIsic();

      $partner_with_isic->setValues($_POST);

      $partner_with_isic->setModifiedBy(Sessions::getAdminId());
      $partner_with_isic->setModifiedDate(time());

      if ($partner_with_isic->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_partner_with_isic", "edit", "Details has been Updated successfully.");

            Default_Common::jsonSuccess("Details has been Updated successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $partner_with_isic = new Mod_PartnerWithIsic();

      $partner_with_isic->setId($_POST['id']);

      if ($partner_with_isic->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_partner_with_isic", "delete", "Detail Deleted successfully.");

            Default_Common::jsonSuccess("Detail Deleted successfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function sortTable() {
      require_once(dirname(__FILE__) . '/helper.php');
      foreach ($_POST['row'] as $position => $item) {

            $partner_with_isic = new Mod_PartnerWithIsic();
            $partner_with_isic->setSortOrder($position);
            $partner_with_isic->setId($item);
            $partner_with_isic->updateSortOrder();
      }
}

?>