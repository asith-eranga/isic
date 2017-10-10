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

	$email_settings = new EmailSettings();
	$email_settings->setValues($_POST);

	$email_settings->setId(2);
	$user_group = implode(',',$_POST['user_group']);
	$email_settings->setUserGroup($user_group);
	
	if( $email_settings->update() ){
		
			Default_Common::jsonSuccess( "Email Settings has been Updated Successfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}

}

