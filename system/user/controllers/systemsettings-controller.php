<?php
define('_MEXEC','OK');
require_once("../../../system/load.php");

 $action = $_POST['action'];
 
 switch($action){
	case "updatePost":
		updatePost();
		break;
 }

function updatePost(){
	$system_settings = new SystemSettings();
	$system_settings->setValues($_POST);
	$system_settings->setId(2);

	if( $system_settings->update() ){
        Default_Common::jsonSuccess( "System settings has been Updated Successfully." );
	}else{
        Default_Common::jsonError( "Error" );
	}
}

