<?php
defined("_MEXEC") or die('No Direct Access');
require_once(dirname(__FILE__).'/helper.php');


// loading a view inside a module

$views = new Default_Views();

$views->setModule('user_permission');

$views->load('admin/home','','true');



?>