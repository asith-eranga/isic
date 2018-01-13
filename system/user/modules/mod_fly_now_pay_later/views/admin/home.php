<?php

$views = new Default_Views();
$views->setModule('fly_now_pay_later');
$views->loadAppLibs('js/tinymce/tinymce.min.js');
$views->loadFile('mod_fly_now_pay_later.js',true);
$views->load('admin/sidenav','',true); ?>

<div id="ajax_module_sub" class="thirteen wide column">
<?php
    Sessions::checkUserPermission("mod_fly_now_pay_later",1);
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