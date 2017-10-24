<?php
$discounts = new Mod_Discounts();
$discounts->setId($_POST['id']);
$bt_data   = $discounts->getById();
$discounts->extractor($bt_data);

$data		= $discounts->selectAll();

$status     = $discounts->getAllStatus();
$display_types = $discounts->getAllDisplayTypes();
$card_types = $discounts->getAllCardTypes();
$categories = $discounts->getAllCategories();

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
		  <i class="dollar icon"></i>
		  <div class="content">
		    Edit Discount
		    <div class="sub header">Edit discount detail</div>
		  </div>
		</h2>

	<div class="ui small form segment">

	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <input type="hidden" id="id" name="id" value="<?php echo $discounts->id(); ?>" />

        <div class="field">
            <label>Name</label>
            <input placeholder="Name" id="name" name="name" type="text" value="<?php echo $discounts->name(); ?>">
        </div>

        <div class="field">
            <label>Description</label>
            <textarea cols="80" rows="5" placeholder="Add Description" id="description" name="description"><?php echo $discounts->description(); ?></textarea>
        </div>
      
      <div class="fields" id="image_preview_wrapper">
	  	<input type="hidden" id="image" name="image" value="<?php echo $discounts->image(); ?>"/>
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
            <div class="four fields">
                <div class="field">
                    <label>Display Type</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" id="display_type" name="display_type" value="<?php echo $discounts->displayType(); ?>">
                        <div class="default text"><?php echo $display_types[$discounts->displayType()]; ?></div>
                        <i class="dropdown icon"></i>
                        <div class="menu ui transition hidden">
                            <?php foreach ($display_types as $k => $v) { ?>
                                <div class="item" data-value="<?php echo $k; ?>"><?php echo $v; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Card Type</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" id="card_type" name="card_type" value="<?php echo $discounts->cardType(); ?>">
                        <div class="default text"><?php echo $card_types[$discounts->cardType()]; ?></div>
                        <i class="dropdown icon"></i>
                        <div class="menu ui transition hidden">
                            <?php foreach ($card_types as $k => $v) { ?>
                                <div class="item" data-value="<?php echo $k; ?>"><?php echo $v; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Category</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" id="category" name="category" value="<?php echo $discounts->category(); ?>">
                        <div class="default text"><?php echo $categories[$discounts->category()]; ?></div>
                        <i class="dropdown icon"></i>
                        <div class="menu ui transition hidden">
                            <?php foreach ($categories as $k => $v) { ?>
                                <div class="item" data-value="<?php echo $k; ?>"><?php echo $v; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Status</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" id="status" name="status" value="<?php echo $discounts->status(); ?>">
                        <div class="default text"><?php echo $status[$discounts->status()]; ?></div>
                        <i class="dropdown icon"></i>
                        <div class="menu ui transition hidden">
                            <?php foreach ($status as $k => $v) { ?>
                                <div class="item" data-value="<?php echo $k; ?>"><?php echo $v; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	    
	  <div class="small ui submit button floated right green" onclick="tinyMCE.triggerSave()">Save</div>
	</form>
	</div>

</div>