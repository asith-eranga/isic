<?php

$views = new Default_Views();
$views->setModule('travel_with_us');
$views->loadAppLibs('js/tinymce/tinymce.min.js');
$views->loadFile('mod_travel_with_us.js',true);
$views->load('admin/sidenav','',true); ?>

<div id="ajax_module_sub" class="thirteen wide column">
<?php
    Sessions::checkUserPermission("mod_travel_with_us",1);
?>
</div>

<div class="ui small modal delete_view">
  <div class="header">
    Delete Confirmation
  </div>
  <div class="content">
    <div class="left">
      
    </div>
    <div class="right">
      Are you sure you want to delete?
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