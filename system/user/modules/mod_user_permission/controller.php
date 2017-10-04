<?php
define('_MEXEC','OK');
require_once("../../../../system/load.php");

 $action = $_POST['action'];

 $module_name = "test";
 
 switch($action){
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
	
 }

function load(){

	//unset($_SESSION);

	// create table if not exsists
	require_once(dirname(__FILE__).'/helper.php');
	$permission = new Mod_UserPermission();
	$permission->createTable();


	$views = new Default_Views();
	$views->setModule('user_permission');

	//load default view
	if(!Sessions::isAdminLogged()){
		$views->load('admin/login','',true);
	}else{
		$views->load('admin/home','',true);
	}
	

}

function view(){

	require_once(dirname(__FILE__).'/helper.php');
	
	$views = new Default_Views();
	$views->setModule('user_permission');
	$views->load('admin/view','',true);
}

function add(){
	
	require_once(dirname(__FILE__).'/helper.php');

	$views = new Default_Views();
	$views->setModule('user_permission');
	$views->load('admin/add','',true);
}

function addPost(){

	require_once(dirname(__FILE__).'/helper.php');

	$permission = new Mod_UserPermission();
	//print_r($_POST['system_manager_permission']);

	$permission->setValues($_POST);
	$permission->setSystemManagerPermission(serialize($_POST['system_manager_permission']));
	
	if( $permission->insert() ){
		
		$activity_log = new ActivityLog();
		$activity_log->newLogRecord("mod_user_permission","add","User Permission has been added succesfully");

			Default_Common::jsonSuccess( "User Permission has been added succesfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}
	
}

function edit(){

	require_once(dirname(__FILE__).'/helper.php');
	
	$views = new Default_Views();
	$views->setModule('user_permission');
	$views->load('admin/edit','',true);

}

function updatePost(){

	require_once(dirname(__FILE__).'/helper.php');

	$permission = new Mod_UserPermission();

	$permission->setValues($_POST);
	$permission->setSystemManagerPermission(serialize($_POST['system_manager_permission']));

	if( $permission->update() ){
		
		$activity_log = new ActivityLog();
		$activity_log->newLogRecord("mod_user_permission","edit","User Permission has been updated succesfully");

			Default_Common::jsonSuccess( "User Permission has been Updated succesfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}

}

function doDelete(){

	require_once(dirname(__FILE__).'/helper.php');

	$permission = new Mod_UserPermission();

	$permission->setId($_POST['id']);

	if( $permission->delete() ){
		
		$activity_log = new ActivityLog();
		$activity_log->newLogRecord("mod_user_permission","delete","User Permission has been deleted succesfully");

			Default_Common::jsonSuccess( "User Permission Deleted succesfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}

}


?>