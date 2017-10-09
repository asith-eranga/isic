<?php
$home_page = new Mod_HomePage();
$home_page->setId($_POST['id']);
$bt_data   = $home_page->getById();
$home_page->extractor($bt_data);

$data		= $home_page->selectAll();
?>
<script type="text/javascript">
$(document).ready(function(){

	$('.ui.form').form({

	    title: {
			identifier: 'title',
			rules: [
				{
					type: 'empty',
					prompt: 'Please enter content title'
				}
			]
		},				
		description: {
			identifier: 'description',
			rules: [
				{
					type: 'empty',
					prompt: 'Please enter content description'
				}
			]
		},

	},
	
	  	{
	  		onSuccess:function(){ updatePost(); }
	  	}

	 );
	 
	 try{ tinyMCE.remove() }catch(e){}

	tinymce.init({
	    selector: "textarea",
	    plugins: [
	        "advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste filemanager"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		relative_urls: false,
	    remove_script_host: false
	});
	
	$("#image").imagemanager({image_plugin_wrapper: "#image_preview_wrapper", image_select: "#selected_file"});
	$('.ui.checkbox').checkbox();

});
</script>

<div class="thirteen wide column">

		<h2 class="ui header">
		  <i class="certificate icon"></i>
		  <div class="content">
		    Edit Special Tour
		    <div class="sub header">Edit home content</div>
		  </div>
		</h2>

	<div class="ui small form segment">

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <input type="hidden" id="id" name="id" value="<?php echo $home_page->id(); ?>" />
      
      <div class="field">
        <label>Title</label>
        <input placeholder="Name" id="title" name="title" type="text" value="<?php echo $home_page->title(); ?>">
      </div>
      
      <div class="field">
        <label>Description</label>
        <textarea cols="80" rows="5" placeholder="Add Description" id="description" name="description"><?php echo $home_page->description(); ?></textarea>
      </div>
      
      <div class="fields" id="image_preview_wrapper">
	  	<input type="hidden" id="image" name="image" value="<?php echo $home_page->image(); ?>"/>
	     <div class="six wide field">
	     	<label>Image</label>
	    	<input placeholder="Select Image" name="selected_file" id="selected_file" type="text" readonly>
	     </div>
	     <div class="four wide field">
	     	<label>&nbsp;</label>
	     	<div class="small ui button teal select_image">Select Image</div>
	     	<div class="small ui icon button teal add_to_preview"><i class="add icon"></i></div>
	     </div>
	     <div class="sixteen wide field ui small images image_list">

	     </div>

	  </div>
	    
	  <div class="small ui submit button floated right green" onclick="tinyMCE.triggerSave()">Save</div>
	</form>
	</div>

</div>