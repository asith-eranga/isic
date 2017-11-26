<?php
$partner_with_isic = new Mod_PartnerWithIsic();
$partner_with_isic->setId($_POST['id']);
$bt_data   = $partner_with_isic->getById();
$partner_with_isic->extractor($bt_data);

$data		= $partner_with_isic->selectAll();
$status     = $partner_with_isic->getAllStatus();

?>
<script type="text/javascript">
$(document).ready(function(){

	$('.ui.form').form({

	    name: {
			identifier: 'name',
			rules: [
				{
					type: 'empty',
					prompt: 'Please enter name'
				}
			]
		},				
		description: {
			identifier: 'description',
			rules: [
				{
					type: 'empty',
					prompt: 'Please enter content'
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
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            'https://www.tinymce.com/css/codepen.min.css'
        ]
	});
	
	$("#image").imagemanager({image_plugin_wrapper: "#image_preview_wrapper", image_select: "#selected_file"});
	$('.ui.checkbox').checkbox();

});
</script>

<div class="thirteen wide column">

		<h2 class="ui header">
		  <i class="child icon"></i>
		  <div class="content">
		    Edit Partner With ISIC
		    <div class="sub header">Edit partner with isic</div>
		  </div>
		</h2>

	<div class="ui small form segment">

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <input type="hidden" id="id" name="id" value="<?php echo $partner_with_isic->id(); ?>" />
      
      <div class="field">
        <label>Name</label>
        <input placeholder="Name" id="name" name="name" type="text" value="<?php echo $partner_with_isic->name(); ?>">
      </div>
      
      <div class="field">
        <label>Description</label>
        <textarea cols="80" rows="5" placeholder="Add Description" id="description" name="description"><?php echo $partner_with_isic->description(); ?></textarea>
      </div>
      
      <div class="fields" id="image_preview_wrapper">
	  	<input type="hidden" id="image" name="image" value="<?php echo $partner_with_isic->image(); ?>"/>
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
          <input type="hidden" id="status" name="status" value="<?php echo $partner_with_isic->status(); ?>">
          <div class="default text"><?php echo $status[$partner_with_isic->status()]; ?></div>
          <i class="dropdown icon"></i>
          <div class="menu ui transition hidden">
          <?php 
          foreach($status as $k => $v){?>
            <div class="item" data-value="<?php  echo $k; ?>"><?php echo $v; ?></div>
		  <?php 
           } ?>
          </div>
        </div>
	  </div>
	    
	  <div class="small ui submit button floated right green" onclick="tinyMCE.triggerSave()">Save</div>
	</form>
	</div>

</div>