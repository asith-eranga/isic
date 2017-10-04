<?php
define("_MEXEC","OK");
require_once("../../system/load.php");

$email_settings = new EmailSettings();

$email_settings->createTable();
$count = $email_settings->selectAllCount();
if($count == 0){
	$email_settings->insert();
}
  $data_email = $email_settings->selectAll();
  $email_settings->extractor($data_email); 

$types = $email_settings->getSmtpType();

?>

<script src="../system/user/js/emailsettings.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.ui.radio.checkbox').checkbox();
  $('.ui.checkbox').checkbox();
  $('.ui.dropdown').dropdown();
  
  $('.ui.form').form({

	     smtp_status  : {
	      identifier  : 'smtp_status',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please select SMTP status'
	        }
	      ]
	    },
		   smtp_host  : {
	      identifier  : 'smtp_host',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter SMTP Host'
	        }
	      ]
	    },
	       smtp_port  : {
	      identifier  : 'smtp_port',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter SMTP Port'
	        }
	      ]
	    },
	   smtp_mailport  : {
	      identifier  : 'smtp_mailport',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter SMTP mail server port'
	        }
	      ]
	    },
 smtp_authentication  : {
	      identifier  : 'smtp_authentication',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please select SMTP authentication'
	        }
	      ]
	    },
	   smtp_username  : {
	      identifier  : 'smtp_username',
	      rules: [
	        {
	          type   : 'email',
	          prompt : 'Please enter SMTP username'
	        }
	      ]
	    },
	   /*smtp_password  : {
	      identifier  : 'smtp_password',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter SMTP password'
	        }
	      ]
	    },*/
		   smtp_type  : {
	      identifier  : 'smtp_type',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please select SMTP Type'
	        }
	      ]
	    },
			    
	    
	},
	
	  	{
			onSuccess:function(){ updatePost(); }
	  	}

	 );
});
</script>
<div class="one wide column"></div>
<div class="thirteen wide column">

<div class="ui small form segment">
	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

	  <div class="two fields">
       <div class="field">
        <label>Enable SMTP</label>
       </div>
       <div class="field">
         <div class="ui radio checkbox">
        	<input type="radio" name="smtp_status" class="smtp_status" value="1" <?php if($email_settings->smtpStatus() == 1){echo "checked=\"\""; }?>>
        	<label>Yes</label>
      	 </div>
         <div class="ui radio checkbox">
        	<input type="radio" name="smtp_status" class="smtp_status" value="0" <?php if($email_settings->smtpStatus() == 0){echo "checked=\"\""; }?>>
        	<label>No</label>
      	 </div>
       </div>
     </div>
     
     <div class="two fields">
      <div class="field">
        <label>SMTP Host</label>
      </div>
      <div class="field">
        <input placeholder="SMTP Host" id="smtp_host" name="smtp_host" type="text" value="<?php echo $email_settings->smtpHost(); ?>">
      </div>
     </div>
      
     <div class="two fields">
      <div class="field">
        <label>SMTP Port</label>
      </div>
      <div class="field">
        <input placeholder="SMTP Port" id="smtp_port" name="smtp_port" type="text" value="<?php echo $email_settings->smtpPort(); ?>">
      </div>
     </div>
     
      <div class="two fields">
      <div class="field">
        <label>SMTP Port(TLS/SSL)</label>
      </div>
      <div class="field">
        <input placeholder="SMTP Mail Server Port" id="smtp_mailport" name="smtp_mailport" type="text" value="<?php echo $email_settings->smtpMailPort(); ?>">
      </div>
     </div>
      
     <div class="two fields">
       <div class="field">
        <label>SMTP Authentication</label>
       </div>
       <div class="field">
         <div class="ui radio checkbox">
        	<input type="radio" name="smtp_authentication" class="smtp_authentication" value="1" <?php if($email_settings->smtpAuthentication() == 1){echo "checked=\"\""; }?>>
        	<label>Yes</label>
      	 </div>
         <div class="ui radio checkbox">
        	<input type="radio" name="smtp_authentication" class="smtp_authentication" value="0" <?php if($email_settings->smtpAuthentication() == 0){echo "checked=\"\""; }?>>
        	<label>No</label>
      	 </div>
       </div>
     </div>

     <div class="two fields">
      <div class="field">
        <label>SMTP Username</label>
      </div>
      <div class="field">
        <input placeholder="SMTP Username" id="smtp_username" name="smtp_username" type="text" value="<?php echo $email_settings->smtpUsername(); ?>">
      </div>
     </div>

     <div class="two fields">
      <div class="field">
        <label>SMTP Password (leave blank to keep the exsisting password)</label>
      </div>
      <div class="field">
        <input placeholder="SMTP Password" id="smtp_password" name="smtp_password" type="password" value="">
      </div>
     </div>

     <div class="two fields">
      <div class="field">
        <label>SMTP Type</label>
      </div>
      <div class="field">
        <div class="ui selection dropdown">
          <input type="hidden" name="smtp_type" id="smtp_type" value="<?php echo $types[$email_settings->smtpType()]; ?>">
          <div class="default text">Select Type</div>
          <i class="dropdown icon"></i>
          <div class="menu ui transition hidden">
            <?php foreach($types as $k => $v){?>
          	 <div class="item" data-value="<?php echo $k; ?>"><?php echo $v; ?></div>
            <?php } ?>
          </div>
        </div>
      </div>
     </div>
     
     <h4 class="ui dividing header"> User Groups</h4>
     <br>
     <div class="two fields">
      <div class="field">
        <label>User Groups<small> (Please select who will received system emails)</small></label>
      </div>
      <div class="field">
        <?php
        Default_ModManager::loadHelper('user_permission');
   		$permission = new Mod_UserPermission();
		$data		= $permission->selectAll();
		
		$user_group = explode(',',$email_settings->userGroup());
		
		for($i=0; $i<count($data); $i++){
			$permission->extractor($data, $i); 
		?>
			<div class="ui checkbox" style="margin-bottom:5px">
              <input type="checkbox" name="user_group[]" <?php echo (in_array($permission->id(),$user_group))? 'checked' : ''; ?> value="<?php echo $permission->id(); ?>">
              <label><?php echo $permission->permissionName(); ?></label>
            </div><br>
		<?php }	?>
      </div>
     </div>
    
     <div class="small ui submit button floated right green">Save</div>
	</form>
</div>
</div>


