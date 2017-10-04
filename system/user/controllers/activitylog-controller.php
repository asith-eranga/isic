<?php
define('_MEXEC','OK');
require_once("../../../system/load.php");

 $action = $_POST['action'];
 
 switch($action){
	case "doDelete":
		doDelete();
		break;
	
 }

function doDelete(){

	$activity_log = new ActivityLog();
	$activity_log->deleteTable();
	$activity_log->createTable();

	$activity_log->newLogRecord("Activity Log","delete","------ Activity Log Cleared --------");

}