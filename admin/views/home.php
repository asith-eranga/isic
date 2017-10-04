<?php
define("_MEXEC", "OK");
require_once("../../system/load.php");

$views = new Default_Views();
$views->setModule('users');

//load default view
if (!Sessions::isAdminLogged()) {
      $views->load('admin/login', '', true);
      die();
}
?>

