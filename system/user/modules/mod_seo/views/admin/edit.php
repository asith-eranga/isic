<?php
    $seo = new Mod_SEO();
    $seo->setId($_POST['id']);
    $bt_data = $seo->getById();
    $seo->extractor($bt_data);
    $data = $seo->selectAll();
?>
<script type="text/javascript">
    $(document).ready(function(){
	    $('.ui.form').form({
	        title: {
			    identifier: 'page_title',
			    rules: [
				    {
					    type: 'empty',
					    prompt: 'Please enter page title'
				    }
			    ]
		    },
		    description: {
			    identifier: 'meta_description',
			    rules: [
				    {
					    type: 'empty',
					    prompt: 'Please enter meta description'
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
            height: 200,
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
	    $('.ui.checkbox').checkbox();
    });
</script>

<div class="thirteen wide column">
    <h2 class="ui header">
        <i class="line chart icon"></i>
        <div class="content">
            Edit SEO tags
	        <div class="sub header">Edit seo tags</div>
	    </div>
    </h2>
	<div class="ui small form segment">
        <form id="data_form">
            <input type="hidden" id="id" name="id" value="<?php echo $seo->id(); ?>" />

            <div class="field">
                <label>Page name</label>
                <input id="page_title" name="page_title" type="text" value="<?php echo $seo->pageName(); ?>" disabled="disabled">
            </div>

            <div class="field">
                <label>Page title</label>
                <input placeholder="Page title" id="page_title" name="page_title" type="text" value="<?php echo $seo->pageTitle(); ?>">
            </div>

            <div class="field">
                <label>Meta title</label>
                <input placeholder="Meta title" id="meta_title" name="meta_title" type="text" value="<?php echo $seo->metaTitle(); ?>">
            </div>

            <div class="field">
                <label>Meta description</label>
                <input placeholder="Meta description" id="meta_description" name="meta_description" type="text" value="<?php echo $seo->metaDescription(); ?>">
            </div>

            <div class="field">
                <label>Meta keywords</label>
                <textarea cols="10" rows="5" placeholder="Meta keywords" id="meta_keywords" name="meta_keywords"><?php echo $seo->metaKeywords(); ?></textarea>
            </div>

            <div class="ui error message"></div>
            <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

            <div class="small ui submit button floated right green" onclick="tinyMCE.triggerSave()">Save</div>
        </form>
	</div>
</div>