<?php 
define('_MEXEC','OK');
require_once("../../system/load.php");

$system_manager_permission = Sessions::getSystemManagerPermission();
?>

<div class="six column doubling ui grid">

  <?php if(in_array('activity-log',$system_manager_permission)){ ?>
  <div class="three wide column">
    <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('activity-log')">
        <i class="huge checked calendar icon"></i>
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
        <i class="huge browser icon"></i>
        <div class="ui basic segmant">Variable Manager</div>
    </div>
  </div>
  <?php }
    if(in_array('system-settings',$system_manager_permission)){
  ?>
    <div class="three wide column">
        <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('system-settings')">
            <i class="huge settings icon"></i>
            <div class="ui basic segmant">System Settings</div>
        </div>
    </div>
  <?php } ?>
  <!--<div class="three wide column">
    <div class="ui center aligned segment settings_nav_block" onclick="adminLoadNav('template-manager')">
        <i class="huge paint brush icon"></i>
        <div class="ui basic segmant">Template Manager</div>
    </div>
  </div>-->

</div>