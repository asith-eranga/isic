<?php

/**
 * 
 * include this file to any file that needs to use the framework
 * handles all the loading and initial startup functions of the framework.
 *
 */

define( 'ABSPATH', dirname(__FILE__) . '/' );

define( 'INC' , "includes" . '/' );

define( 'CLS' , "classes" . '/' );

define( 'CFG' , "config" . '/' );

define( 'APPLICATION_FOLDER' , "application" . '/' );
define( 'USER_FOLDER' , "user" . '/' );
define( 'TEMPLATES_FOLDER' , "templates" . '/' );

# Load Config file
require_once( ABSPATH . APPLICATION_FOLDER . CFG . 'php-config.php' );

# get http protocol
$protocol_url = explode("/",$_SERVER["SERVER_PROTOCOL"]);


# automatic or manual defining of HTTP_PATH and DOC_ROOT
if($GLOBAL_SETTINGS['HTTP_PATH']==''){
    define('HTTP_PATH',strtolower($protocol_url[0])."://".$_SERVER["SERVER_NAME"]."/");
}else{
    define('HTTP_PATH',$GLOBAL_SETTINGS['HTTP_PATH']);
}

if($GLOBAL_SETTINGS['DOC_ROOT']==''){
    define('DOC_ROOT',str_replace("system".'/', "", ABSPATH));
}else{
    define('DOC_ROOT',$GLOBAL_SETTINGS['DOC_ROOT']);
}

    define('DB_HOST',$GLOBAL_SETTINGS['DB_HOST']);
    define('DB_USER',$GLOBAL_SETTINGS['DB_USER']);
    define('DB_PASSWORD',$GLOBAL_SETTINGS['DB_PASSWORD']);
    define('DB_NAME',$GLOBAL_SETTINGS['DB_NAME']);


# auto load of application and user classes
function appAutoLoader($className){

    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', '/', $namespace) . '/';
    }
    $fileName .= str_replace('_', '/', $className) . '.php';

    $fileName = strtolower($fileName);

    $class_path_application = APPLICATION_FOLDER . CLS . $fileName;
    $class_path_user = USER_FOLDER . CLS . $fileName; 

    if(file_exists(ABSPATH.$class_path_user)){
        require $class_path_user;
    }else if(file_exists(ABSPATH.$class_path_application)){
        require $class_path_application;
    }
     

}

# register custom autoloader
spl_autoload_register('appAutoLoader');


?>