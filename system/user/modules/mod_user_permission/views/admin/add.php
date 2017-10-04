 <?php 
  $permission 			= new Mod_UserPermission();
  $count 				= $permission->selectAll();
  $permission->extractor($count);
  $system_categories 	= $permission->getSystemManagerCategories();
?>
<script type="text/javascript">
$(document).ready(function(){

	$('.ui.form').form({

	        permission_name: {
	      identifier  : 'permission_name',
	      rules: [
	        {
	          type   : 'empty',
	          prompt : 'Please enter permission name'
	        }
	      ]
	    },
	},
	
	  	{
			onSuccess:function(){ addPermission(); }
			//onSuccess:function(){ addPost(); }
	  	}

	 );
	 
	$('.ui.checkbox').checkbox();
	
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
	
	$('#system_check_all').change(function() { 
	  $('.system_manager').prop('checked', $(this).prop('checked'));
    });

	function addPermission(){
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
		 addPost();
	} 

});
</script>
<script type="text/javascript">

</script>

<div class="thirteen wide column">

		<h2 class="ui header">
		  <i class="lock icon"></i>
		  <div class="content">
		    Add Permission Group
		    <div class="sub header">Add a new user permission group</div>
		  </div>
		</h2>

	<div class="ui small form segment">

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="field">
        <label>Permission Group Name</label>
        <input placeholder="User Permission Name" id="permission_name" name="permission_name" type="text">
      </div>
      <div class="field">
        <label>Module Permissions</label>
        <input type="hidden" id="permission" name="permission" />

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
                  <input type="checkbox" name="view" value="view" class="view">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="add" value="add" class="add">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="edit"  value="edit" class="edit">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="delete" value="delete" class="delete">
                    <label></label>
                </div>
              </td>
              <td>
                <div class="ui checkbox">
                  <input type="checkbox" name="other" value="other" class="other">
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
                          <input type="checkbox" class="system_manager" name="system_manager_permission[]" value="<?php echo $k; ?>">
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