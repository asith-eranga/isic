<?php 
define('_MEXEC','OK');
require_once("../../system/load.php");

$system_manager_permission = Sessions::getSystemManagerPermission();
?>

<div class="six column doubling ui grid">

  <?php if(in_array('activity-log',$system_manager_permission)){ ?>
  <div class="three wide column">
    <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('activity-log')">
        <i class="huge book icon"></i>
        <div class="ui basic segmant">Activity Log</div>
    </div>
  </div>
  <?php } 
  if(in_array('email-settings',$system_manager_permission)){ 
  ?>
  <div class="three wide column">
    <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('email-settings')">
        <i class="huge mail icon"></i>
        <div class="ui basic segmant">Email Settings</div>
    </div>
  </div>
   <?php } 
  if(in_array('variable-manager',$system_manager_permission)){ 
  ?>
  <div class="three wide column">
    <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('variable-manager')">
        <i class="huge book icon"></i>
        <div class="ui basic segmant">Variable Manager</div>
    </div>
  </div>
  <?php } ?>
  <div class="three wide column">
    <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('template-manager')">
        <i class="huge book icon"></i>
        <div class="ui basic segmant">Template Manager</div>
    </div>
  </div>

</div>