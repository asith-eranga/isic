<?php
$card_page = new Mod_CardPage();
$card_page -> setId($_POST['id']);
$bt_data = $card_page->getById();
$card_page -> extractor($bt_data);

$data = $card_page->selectAll();
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
        <i class="address book outline icon"></i>
        <div class="content">
            Edit Card Page Content
		    <div class="sub header">Edit card content</div>
        </div>
    </h2>

	<div class="ui small form segment">
	    <form id="data_form">
            <input type="hidden" id="id" name="id" value="<?php echo $card_page->id(); ?>" />
            <div class="field">
                <label>Title</label>
                <input placeholder="Name" id="title" name="title" type="text" value="<?php echo $card_page->title(); ?>">
            </div>
      
            <div class="field">
                <label>Description</label>
                <textarea cols="80" rows="5" placeholder="Add Description" id="description" name="description"><?php echo $card_page->description(); ?></textarea>
            </div>
      
            <div class="fields" id="image_preview_wrapper">
	  	        <input type="hidden" id="image" name="image" value="<?php echo $card_page->image(); ?>"/>
	            <div class="six wide field">
	     	        <label>Image</label>
	    	        <input placeholder="Select Image" name="selected_file" id="selected_file" type="text" readonly>
	            </div>
	            <div class="four wide field">
	     	        <label>&nbsp;</label>
	     	        <div class="small ui button teal select_image">Select Image</div>
	     	        <div class="small ui icon button teal add_to_preview"><i class="add icon"></i></div>
	            </div>
	            <div class="sixteen wide field ui small images image_list"></div>
	        </div>

            <div class="ui error message"></div>
            <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

	        <div class="small ui submit button floated right green" onclick="tinyMCE.triggerSave()">Save</div>
	    </form>
	</div>
</div>