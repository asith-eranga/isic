<?php

/**
 * 
 * PHP related configurations
 *
 */

# config.php - Site wide configuration info.

@ini_set('zlib.output_compression', 1);
ob_implicit_flush(true);
error_reporting(0);
session_start();
//error_reporting(0);
defined( '_MEXEC' ) or die( 'Restricted access' );

$protocol_url = explode("/",$_SERVER["SERVER_PROTOCOL"]);
$ori_uri = explode("/",$_SERVER["REQUEST_URI"]);

$GLOBAL_SETTINGS = [
	'HTTP_PATH' => 'http://localhost/isic/',
	'DOC_ROOT' => 'C:/wamp64/www/isic/',
	'DB_HOST' => 'localhost',
	'DB_USER' => 'root',
	'DB_PASSWORD' => '',
	'DB_NAME' => 'isic',
];

$ADMIN_SETTINGS = [
    'NAV_SHORTCUTS' => 'mod_users',
    'FILEMANAGER_CURRENT_PATH' => '../../../../../../../uploads/'
];

#-- Set time zone --
date_default_timezone_set('Asia/Colombo');
