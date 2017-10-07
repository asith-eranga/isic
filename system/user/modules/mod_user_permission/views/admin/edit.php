
<?php

  $permission 			= new Mod_UserPermission();
  $permission->setId($_POST['id']);
  $permission_details 	= $permission->getById();
  $permission->extractor($permission_details);
  
  $count 				= $permission->selectAll();
  $system_categories 	= $permission->getSystemManagerCategories();
  $system_permission	= unserialize($permission->systemManagerPermission());
?>

<script type="text/javascript">
$(document).ready(function(){
	
	$('.ui.checkbox').checkbox();
	
	var permission_array = $('input[name=permission]').val();
	var object_permission = JSON.parse(permission_array);
	console.log(object_permission);
	
	$.each(object_permission, function(key, val) {
		
			$.each(val[0], function(key1, val1){
				//console.log(key1+' '+val1.length);
				if(val1 == 1){
					//console.log(key1 + '=' + val1); // result: view = [1], add = [1] , delete = [0] ,..
					$('#'+key1+'_'+key).prop('checked', true);
				}
			});
    });
	if($('.view').length == $('.view:checked').length){
		$('#view_all').prop('checked',true);
	}
	if($('.add').length == $('.add:checked').length){
		$('#add_all').prop('checked',true);
	}
	if($('.edit').length == $('.edit:checked').length){
		$('#edit_all').prop('checked',true);
	}
	if($('.delete').length == $('.delete:checked').length){
		$('#delete_all').prop('checked',true);
	}
	if($('.other').length == $('.other:checked').length){
		$('#other_all').prop('checked',true);
	}
	$('#system_check_all').change(function() { 
	  $('.system_manager').prop('checked', $(this).prop('checked'));
    });

	$('.ui.form').form({

	       title: {
	      identifier  : 'title',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter permission title'
	        }
	      ]
	    },
	    

	},
	
	  	{
	  		//onSuccess:function(){ updatePost(); }
			onSuccess:function(){ editPermission(); }
	  	}

	 );
	 
	//check all
	$('#checkAll').change(function() {  
		$('.check_all').prop('checked', $(this).prop('checked'));
		$('.view').prop('checked', $(this).prop('checked'));
		$('.add').prop('checked', $(this).prop('checked'));
		$('.edit').prop('checked', $(this).prop('checked'));
		$('.delete').prop('checked', $(this).prop('checked'));
		$('.other').prop('checked', $(this).prop('checked'));
    });
   
  	$('#view_all').change(function() { 
		$('.view').prop('checked', $(this).prop('checked'));
    });
	
  	$('#add_all').change(function() { 
	 	$('.add').prop('checked', $(this).prop('checked'));
    });
	
  	$('#edit_all').change(function() { 
	  $('.edit').prop('checked', $(this).prop('checked'));
    });
	
  	$('#delete_all').change(function() { 
	  $('.delete').prop('checked', $(this).prop('checked'));
    });
	
  	$('#other_all').change(function() { 
	  $('.other').prop('checked', $(this).prop('checked'));
    });

	 
	 function editPermission(){

		var permission_array = {};
		
		$('.module_name').each(function(){
			 
		  	var values = {};
		  
		  	$("input[type=checkbox]",this).each(function(){
			  
			  	var key = $(this).val();
			  
			  	if($(this).is(':checked')){
				  	var value = 1;
				  
			 	 }else{
				 	var value = 0;
			  	 }
			  	values[key] = values[key] || []
			  	values[key].push(value)

		  	 });
		   	var key = $(this).attr('id');
			
			if(typeof(values) !== 'undefined'){
			  permission_array[key] = permission_array[key] || []
			  permission_array[key].push(values);
			}
		 });
		 
		 var string = JSON.stringify(permission_array);
		 
		 $('input[name=permission]').val(string);
		 updatePost();
	} 

});
</script>

<div class="thirteen wide column">

		<h2 class="ui header">
		  <i class="lock icon"></i>
		  <div class="content">
		    Edit User Permission Group
		    <div class="sub header">Edit User permissions group</div>
		  </div>
		</h2>

	<div class="ui small form segment">

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i>New permission has been added Successfully.</div>

	<input type="hidden" id="id" name="id" value="<?php echo $permission->id(); ?>" />
	 
      <div class="field">
        <label>Permission Group Name</label>
        <input placeholder="User Permission Name" id="permission_name" name="permission_name" type="text" value="<?php echo $permission->permissionName(); ?>">
      </div>
      <div class="field">
        <label>Module Permissions</label>
        <input type="hidden" name="permission" id="permission" value='<?php echo $permission->permission(); ?>' />
        
        <div class="ui checkbox" style="float:right">
            <input type="checkbox" class="checkAll" id="checkAll">
               <label>Check All</label>
        </div><br />
        
        <table class="ui table segment">
          <thead>
            <tr><th>Module Name</th>
            <th style="text-align:left">
            <div class="ui checkbox">
                  <input type="checkbox" name="view_all" class="check_all" id="view_all">
                    <label>View</label>
            </div>
            </th>
            <th style="text-align:left">
            <div class="ui checkbox">
                  <input type="checkbox" name="add_all" class="check_all" id="add_all">
                    <label>Add</label>
            </div>
            </th>
            <th style="text-align:left">
            <div class="ui checkbox">
                  <input type="checkbox" name="edit_all" class="check_all" id="edit_all">
                    <label>Edit</label>
            </div>
            </th>
            <th style="text-align:left">
            <div class="ui checkbox">
                  <input type="checkbox" name="delete_all" class="check_all" id="delete_all">
                    <label>Delete</label>
            </div>
            </th>
            <th style="text-align:left">
            <div class="ui checkbox">
                  <input type="checkbox" name="other_all" class="check_all" id="other_all">
                    <label>Other</label>
            </div>
            </th>
          </tr>
          </thead>
          <tbody>
          <?php foreach(Default_ModManager::listAllModules() as $mod_name){ ?>

            <tr align="left" id="<?php echo $mod_name; ?>" class="module_name">
              <td align="left">
      			<?php echo Default_ModManager::niceName($mod_name); ?>
      		  
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="view" id="view_<?php echo $mod_name; ?>" value="view" class="view">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="add" id="add_<?php echo $mod_name; ?>" value="add" class="add">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="edit" id="edit_<?php echo $mod_name; ?>" value="edit" class="edit">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="delete" id="delete_<?php echo $mod_name; ?>" value="delete" class="delete">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="other" id="other_<?php echo $mod_name; ?>" value="other" class="other">
                    <label></label>
                </div>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      
      <div class="two fields">
        <div class="field">
          <label>System Manager Permissions</label>
          <table class="ui table segment">
            <thead>
              <tr>
              	<th>System Manager</th>
                <th style="text-align:left">
                  <div class="ui checkbox">
                        <input type="checkbox" id="system_check_all">
                          <label>Access Permission</label>
                  </div>
            </th>
              </tr>
            </thead>
            <tbody>
            <?php 
			foreach($system_categories as $k => $v){
			?>
            	<tr>
                	<td><?php echo $v; ?></td>
                    <td>
                    	<div class="ui checkbox">
                          <input type="checkbox" class="system_manager" name="system_manager_permission[]" <?php if(in_array($k, $system_permission)){ echo " checked "; } ?> value="<?php echo $k; ?>">
                            <label></label>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
          </table>
         </div>
       </div>
       
	  <div class="small ui submit button floated right green" style="margin-top:1%;">Save</div>
	</form>

	</div>


</div>