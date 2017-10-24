<?php
$mod_cards = new Mod_Cards();
$mod_cards->setId($_POST['id']);
$bt_data   = $mod_cards->getById();
$mod_cards->extractor($bt_data);

$data		= $mod_cards->selectAll();
$status     = $mod_cards->getAllStatus();

?>
<script type="text/javascript">
$(document).ready(function(){

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
		  <i class="browser icon"></i>
		  <div class="content">
		    Edit Card
		    <div class="sub header">Edit card detail</div>
		  </div>
		</h2>

	<div class="ui small form segment">

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <input type="hidden" id="id" name="id" value="<?php echo $mod_cards->id(); ?>" />

        <div class="field">
            <label>Name</label>
            <input placeholder="Name" id="name" name="name" type="text" value="<?php echo $mod_cards->name(); ?>">
        </div>

        <div class="field">
            <label>Title 1</label>
            <input placeholder="Title 1" id="title_1" name="title_1" type="text" value="<?php echo $mod_cards->title1(); ?>">
        </div>

        <div class="field">
            <label>Description 1</label>
            <textarea cols="80" rows="5" placeholder="Add Description 1" id="description_1" name="description_1"><?php echo $mod_cards->description1(); ?></textarea>
        </div>

        <div class="field">
            <label>Title 2</label>
            <input placeholder="Title 2" id="title_2" name="title_2" type="text"value="<?php echo $mod_cards->title2(); ?>">
        </div>

        <div class="field">
            <label>Description 2</label>
            <textarea cols="80" rows="5" placeholder="Add Description 2" id="description_2" name="description_2"><?php echo $mod_cards->description2(); ?></textarea>
        </div>

        <div class="field">
            <label>Title 3</label>
            <input placeholder="Title 3" id="title_3" name="title_3" type="text"value="<?php echo $mod_cards->title3(); ?>">
        </div>

        <div class="field">
            <label>Description 3</label>
            <textarea cols="80" rows="3" placeholder="Add Description 3" id="description_3" name="description_3"><?php echo $mod_cards->description3(); ?></textarea>
        </div>

        <div class="field">
            <label>Date of issue</label>
            <input placeholder="Date of issue" id="date_of_issue" name="date_of_issue" type="text" value="<?php echo $mod_cards->dateOfIssue(); ?>">
        </div>

        <div class="field">
            <label>Price</label>
            <input placeholder="Price" id="price" name="price" type="text"value="<?php echo $mod_cards->price(); ?>">
        </div>

        <div class="field">
            <label>Itinerary</label>
            <input placeholder="Itinerary" id="itinerary" name="itinerary" type="text" value="<?php echo $mod_cards->itinerary(); ?>">
        </div>
      
      <div class="fields" id="image_preview_wrapper">
	  	<input type="hidden" id="image" name="image" value="<?php echo $mod_cards->image(); ?>"/>
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
          <input type="hidden" id="status" name="status" value="<?php echo $mod_cards->status(); ?>">
          <div class="default text"><?php echo $status[$mod_cards->status()]; ?></div>
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