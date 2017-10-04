<?php
define("_MEXEC","OK");
require_once("../../system/load.php");

$variable_manager = new VariableManager();
$variable_manager->createTable();


?>

<script src="../system/user/js/variablemanager.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.ui.radio.checkbox').checkbox();
  $('.ui.dropdown').dropdown();
  
  $('.ui.form').form({

	     name  : {
	      identifier  : 'name',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter Variable Name'
	        }
	      ]
	    },
      value  : {
        identifier  : 'value',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter Variable Value'
          }
        ]
      },


	},
	
	  	{
			onSuccess:function(){ create(); }
	  	}

	 );

  view(1);

});
</script>
<div class="one wide column"></div>
<div class="thirteen wide column">

<div class="ui small form segment">
  
<div class="ui dividing header">
  <i class="settings icon"></i>
  <div class="content">
    Create Variables
  </div>
</div>

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

     <div class="two fields">
      <div class="field">
        <label>Name</label>
      </div>
      <div class="field">
        <input placeholder="Variable Name" id="name" name="name" type="text" value="">
      </div>
     </div>

     <div class="two fields">
      <div class="field">
        <label>Value</label>
      </div>
      <div class="field">
        <input placeholder="Variable Value" id="value" name="value" type="text" value="">
      </div>
     </div>

     <div class="small ui submit button floated right green">Create</div>

	</form>
</div>


<div class="ui small form segment">

<div class="ui dividing header">
  <i class="settings icon"></i>
  <div class="content">
    Variables
  </div>
</div>

<div id="ajax_module_sub">


</div>

</div>



</div>



<div class="ui small modal delete_view">
  <div class="header">
    Delete Confirmation
  </div>
  <div class="content">
    <div class="left">
      
    </div>
    <div class="right">
      Are you sure you want to delete the Variable?
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