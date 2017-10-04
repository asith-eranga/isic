<?php 
$special_tours	= new Mod_SpecialTours();
$status 		= $special_tours->getAllStatus();
?>
<script type="text/javascript">
	$(document).ready(function () {

		try {
			tinyMCE.remove()
		} catch (e) { }

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
			
		$('.ui.form').form({
				name: {
					identifier: 'name',
					rules: [
						{
							type: 'empty',
							prompt: 'Please enter room type name'
						}
					]
				},				
				description: {
					identifier: 'description',
					rules: [
						{
							type: 'empty',
							prompt: 'Please enter room type content'
						}
					]
				},
				
			},
				{
					onSuccess: function () {
						addPost();
					}
				}
	
			);

	});
</script>

<div class="thirteen wide column">
  <h2 class="ui header"> <i class="certificate icon"></i>
    <div class="content"> Add Special Tour
      <div class="sub header">Add new special tour</div>
    </div>
  </h2>
  <div class="ui small form segment">
    <form id="data_form">
    
      <div class="ui error message"></div>
      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>
      
      <div class="field">
        <label>Title</label>
        <input placeholder="Name" id="name" name="name" type="text">
      </div>
      
      <div class="field">
        <label>Description</label>
        <textarea cols="80" rows="5" placeholder="Add Description" id="description" name="description"></textarea>
      </div>
      
      <div class="fields" id="image_preview_wrapper">
 		<input type="hidden" id="image" name="image" />
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
  
      <div class="field">
        <label>Status</label>
        <div class="ui selection dropdown">
          <input type="hidden" id="status" name="status" value="1">
          <div class="default text">Visible</div>
          <i class="dropdown icon"></i>
          <div class="menu ui transition hidden">
            <?php foreach ($status as $k => $v) { ?>
            <div class="item" data-value="<?php echo $k; ?>"><?php echo $v; ?></div>
            <?php } ?>
          </div>
        </div>
      </div>
      
      <div class="small ui submit button floated right green" onclick="tinyMCE.triggerSave()">Save</div>
      
    </form>
  </div>
</div>
