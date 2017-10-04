<?php
define("_MEXEC","OK");
require_once("../../system/load.php");

$activity_log = new ActivityLog();

$activity_log->createTable();

$data = $activity_log->getLatest();

/*
$activity_log = new ActivityLog();
$activity_log->newLogRecord("user","module","type","message");
*/

?>

<script src="../system/user/js/activitylog.js"></script>

<div class="sixteen wide column">

<div class="ui basic segment right aligned">
  <a class="ui small red button" onclick="confirmDelete()">Clear Log</a>
  <a class="ui small button" style="display:none"><i class="download disk icon"></i>Download</a>
  <a class="ui small button" onclick="adminLoadNav('activity-log')"><i class="download refresh icon"></i></a>
</div>

<table class="ui small table segment">
  <thead>
    <tr>
    <th class="two wide">Date</th>
    <th class="one wide">Time</th>
    <th class="two wide">User</th>
    <th class="two wide">Module</th>
    <th class="one wide">Type</th>
    <th class="six wide">Message</th>
    <th class="two wide">IP</th>
  </tr></thead>
  <tbody>
<?php for($i=0; $i<count($data); $i++){ $activity_log->extractor($data,$i); ?>
    <tr>
      <td><?php echo date("j M, Y",$activity_log->createdDate()); ?></td>
      <td><?php echo date("h:i a",$activity_log->createdDate()); ?></td>
      <td><?php echo $activity_log->user(); ?></td>
      <td><?php echo $activity_log->module(); ?></td>
      <td><?php echo $activity_log->type(); ?></td>
      <td><?php echo $activity_log->message(); ?></td>
      <td><?php echo $activity_log->ip(); ?></td>
    </tr>
<?php } ?>
  </tbody>
</table>

</div>


<div class="ui small modal delete_view">
  <div class="header">
    Delete Confirmation
  </div>
  <div class="content">
    <div class="left">
      
    </div>
    <div class="right">
      Are you sure you want to clear the Log? <br /> <span style="font-size:12px;"> ( This cannot be undone ) </span>
    </div>
  </div>
  <div class="actions">
    <div class="ui small button">
      Cancel
    </div>
    <div class="ui small positive button">
      Okay
    </div>
  </div>
</div>