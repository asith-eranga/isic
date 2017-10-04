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
      case "doLogin":
            doLogin();
            break;
      case "doLogout":
            doLogout();
            break;
      case "doLoginProperty":
            doLoginProperty();
            break;
}

function load() {

      //unset($_SESSION);
      // create table if not exsists
      require_once(dirname(__FILE__) . '/helper.php');
      $users = new Mod_Users();
      $users->createTable();

      $views = new Default_Views();
      $views->setModule('users');

      //load default view
      if (!Sessions::isAdminLogged()) {
            $views->load('admin/login', '', true);
      } else {
            $views->load('admin/home', '', true);
      }
}

function view() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('users');

      $views->load('admin/view', '', true);
}

function add() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('users');
      $views->load('admin/add', '', true);
}

function addPost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $users = new Mod_Users();

      $users->setValues($_POST);

      if ($users->insert()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_users", "add", "New User has been added succesfully");

            Default_Common::jsonSuccess("New user has been added succesfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function edit() {

      require_once(dirname(__FILE__) . '/helper.php');

      $views = new Default_Views();
      $views->setModule('users');
      $views->load('admin/edit', '', true);
}

function updatePost() {

      require_once(dirname(__FILE__) . '/helper.php');

      $users = new Mod_Users();
      $users->setValues($_POST);

      if ($users->update()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_users", "edit", "User Details has been Updated succesfully.");

            Default_Common::jsonSuccess("User Details has been Updated succesfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doDelete() {

      require_once(dirname(__FILE__) . '/helper.php');

      $users = new Mod_Users();

      $users->setId($_POST['id']);

      if ($users->delete()) {

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_users", "delete", "User Deleted succesfully.");

            Default_Common::jsonSuccess("User Deleted succesfully.");
      } else {
            Default_Common::jsonError("Error");
      }
}

function doLogin() {

      require_once(dirname(__FILE__) . '/helper.php');

      $username = $_POST['username'];
      $password = $_POST['password'];

      $users = new Mod_Users();
      $users->setUsername($username);

      $data = $users->selectByUsername();
      $users->extractor($data);

      Default_ModManager::loadHelper('user_permission');
      $permission = new Mod_UserPermission();
      $permission->setId($users->userPermission());
      $permission_data = $permission->getById();
      $permission->extractor($permission_data);

      if ($users->password() == md5($password)) {

            Sessions::setAdminLoginDetails($users->id(), $users->getFullName());
            Sessions::setUserPermission($permission->permission());
            Sessions::setSystemManagerPermission(unserialize($permission->systemManagerPermission()));
			
            $users->setLastLogin(time());
            $users->updateLastLogin();

            $activity_log = new ActivityLog();
            $activity_log->newLogRecord("mod_users", "Login", "Logged in Succesfully");

            Default_Common::jsonSuccess("Succesfully Logged In. Please Wait...");
      } else {
            Default_Common::jsonError("Wrong Username/Password. Try Again");
      }
}

function doLogout() {

      $activity_log = new ActivityLog();
      $activity_log->newLogRecord("mod_users", "Login", "Logged Out.");

      Sessions::logoutAdmin();
}

function doLoginProperty() {
      require_once(dirname(__FILE__) . '/helper.php');

      $password = $_POST['password'];

      $users = new Mod_Users();
      $users->setId(Sessions::getAdminId());
      $users->extractor($users->getById());

      if ($users->password() == md5($password)) {
            Default_Common::jsonSuccess("Succesfully Redirect. Please Wait..");
      } else {
            Default_Common::jsonError("Wrong Password. Try Again");
      }
}

?>