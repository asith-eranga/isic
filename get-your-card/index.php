<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_seo/helper.php');
?>

<!DOCTYPE html>
<!--[if IE 8]>
	<html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if IE 9]>
	<html class="ie ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        $seo = new Mod_SEO();
        $seo->setId(10);
        $seo_data = $seo->getById();
        $seo->extractor($seo_data);
    ?>
    <title><?php echo $seo->pageTitle(); ?></title>
    <meta name="title" content="<?php echo $seo->metaTitle(); ?>">
    <meta name="description" content="<?php echo $seo->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $seo->metaKeywords(); ?>">

    <?php include(DOC_ROOT . 'partials/head.php'); ?>
	<style>
	    .input-container + .input-container {
            margin-top: 1.5em;
        }
        .float-n{float:none}
        #file-upload {
          position: absolute;
          left: -9999px;
        }
        #filename {
             padding: 0.5em;
            display: block;
            width: 100%;
            overflow: hidden;
            border: 2px solid white;
            font-size: 1em;
             padding: 7px;
            cursor: text;
            transition: all .35s;
            color: #999;
            text-transform: uppercase;
            font-weight: 700;
        }
        .file-holder{display:none;}
	</style>
</head>

<body class="main-menu-sticky-smart">

    <div class="main-wrap content-main-wrap">
        <header id="header" class="site-header header-style-1 boxed">
            <?php include_once(DOC_ROOT . 'partials/header.php'); ?>
            <?php include_once(DOC_ROOT . 'partials/card.php'); ?>
            <?php include(DOC_ROOT . 'partials/main-menu.php'); ?>
        </header>
        <?php include(DOC_ROOT . 'partials/mobile-logo.php'); ?>

        <div class="content-wrap">
            <main id="content" class="content-container dis-flex">

                <div class="col-md-9 col-xs-12 bg-green txt-white dis-flex">
                    <div class="col-md-12 col-xs-12 padd-10">
                        <h1 class="fnt-40 text-upper txt-black">
                            get your card
                        </h1>
                        <p class="txt-white">
                            Our Team is standing by to assist you with any questions or clarifications you might have about the International Student Identity Card (ISIC). Please get in touch with one of our executives today to embark on your ISIC experience opening doors to limiteless possibilities and offers.
                        </p>
                        <p>Equipped with just 2 staff members and minimal marketing budgets, ISIC Sri Lanka started with the humblest of beginning to say the least! </p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green padd-h-15">
                    <h1 class="fnt-40 text-upper txt-black">
                        Contacts
                    </h1>
                    <?php if (!empty($system_settings->telephone1())){ ?>
                        <p class="txt-black text-upper no-marg">
                            Hotlines
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->telephone1(); ?>
                            <?php
                            if (!empty($system_settings->telephone2())) {
                                echo ' | ' . $system_settings->telephone2();
                            }
                            ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->addressLine1())){ ?>
                        <p class="txt-black text-upper no-marg">
                            <?php echo $system_settings->addressLine1(); ?>
                        </p>
                        <p class="txt-white">
                            <?php
                            if (!empty($system_settings->addressLine2())) {
                                echo $system_settings->addressLine2();
                            }
                            if (!empty($system_settings->addressLine3())) {
                                echo ', ' . $system_settings->addressLine3();
                            }
                            if (!empty($system_settings->addressLine4())) {
                                echo ', ' . $system_settings->addressLine4();
                            }
                            if (!empty($system_settings->addressLine5())) {
                                echo ', ' . $system_settings->addressLine5() . '.';
                            }
                            ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->email())){ ?>
                        <p class="txt-black text-upper no-marg">
                            General mail
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->email(); ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->fax())){ ?>
                        <p class="txt-black text-upper no-marg">
                            General fax
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->fax(); ?>
                        </p>
                    <?php } ?>

                </div>
                <div class="col-md-12 col-xs-12 bg-black txt-white padd-v-40 marg-v-20">
                    <h2 class="fnt-30 text-upper txt-white text-center">
                        Application Form
                    </h2>
                    <h5 class="txt-white text-center">ISIC | IYTC | ITIC</h5>
                    <form class="form-horizontal" id="get-your-card" action="../system/user/modules/mod_cards/controller.php" method="post" enctype="multipart/form-data">

                        <div class="col-sm-10 col-xs-12 float-n center-block dis-flex" style="float:none">
                            <div class="col-sm-8 padd-v-10">
                                <div class="input-container">
                                    <label for="get-your-card-university" class="text-upper">University / College</label>
                                    <input class="material" type="text" id="get-your-card-university" name="get-your-card-university" required>
                                </div>
                                <div class="input-container">
                                    <label for="get-your-card-fullname" class="text-upper">Full Name</label>
                                    <input class="material" type="text" id="get-your-card-fullname" name="get-your-card-fullname" required>
                                </div>
                                <div class="input-container">
                                    <label for="get-your-card-birthday" class="text-upper">Date of Birth</label>
                                    <input class="material" type="text" id="get-your-card-birthday" name="get-your-card-birthday" required>
                                </div>
                                <div class="input-container col-sm-5 no-padd float-n dis-in-blk">
                                    <label for="get-your-card-email" class="text-upper">E-mail</label>
                                    <input class="material" type="email" id="get-your-card-email" name="get-your-card-email" required>
                                </div>
                                <div class="input-container col-sm-5 no-padd float-n dis-in-blk pull-right">
                                    <label for="get-your-card-telephone" class="text-upper">Telephone</label>
                                    <input class="material" type="text" id="get-your-card-telephone" name="get-your-card-telephone" required>
                                </div>
                                <div class="input-container clearfix"></div>
                                <div class="input-container">
                                    <label for="get-your-card-hear" class="text-upper">How did you hear about us?</label>
                                    <input class="material" type="text" id="get-your-card-hear" name="get-your-card-hear" required>
                                </div>
                                <div class="input-group marg-tp-30">
                                    <textarea id="get-your-card-address" name="get-your-card-address" class="form-control bg-black border-2-white" type="text" placeholder="ADDRESS" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 padd-v-10">
                                <div class="input-container">
                                    <div class="left">
                                        <img id="img-uploaded" src="https://placehold.it/350x450" alt="your image">
                                    </div>
                                    <div class="right text-center">
                                        <div class="input-container">
                                            <input class="material" type="hidden" id="img-path" name="img-path" disabled>
                                        </div>
                                        <span class="file-wrapper marg-v-10">
                                            <input type="file" name="photo" id="photo" class="uploader">
                                            <span class="btn btn-large btn-alpha">Upload Image</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="input-container left">
		                            <span id="filename">Select your files</span>
		                            <label for="file-upload" class="file-wrapper marg-v-10 full-width text-center">
                                        <input type="file" id="file-upload" name="file-upload[]" multiple>
<ul id="output" class="no-padd"></ul>
                                        <span class="btn btn-large btn-alpha">Upload Documents</span>
                                    </label>

                                </div>
                            </div>
                            <div class="col-sm-2 padd-v-10">
                                <div class="dis-tbl full-height full-width">
                                    <div class="dis-tbl-cell full-height full-width tbl-con-algn-btm">
                                        <button class="btn btn-submit marg-v-10 text-upper get-your-card-button" type="submit"><strong>Apply Card</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display: none" id="get-your-card-success-message">
                                <h5 class="txt-green-light">
                                    Thank You! Your application submitted. We'll contact you soon.
                                </h5>
                            </div>
                            <div class="col-sm-12" style="display: none" id="get-your-card-error-message">
                                <h5 class="txt-yellow">
                                    Oops! Something went wrong and we couldn't submit your application. Please try again later.
                                </h5>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-12 col-xs-12 text-left bg-green padd-v-10 ">
                </div>
            </main>

            <footer>
                <?php include(DOC_ROOT . 'partials/footer.php'); ?>
            </footer>
        </div>
    </div>
<?php include(DOC_ROOT . 'partials/mobile-menu.php'); ?>
</body>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/get-your-card.js'></script>
<script>
    jQuery(function() {
        jQuery("input, textarea").on("focusin", function() {
            jQuery(this).parent().addClass("active");
        });
        jQuery("input").on("focusout", function() {
            jQuery(this).val() === "" ? jQuery(this).parent().removeClass("active") : false;
        })
    });

    /*----------------------------------------
    Upload btn
    ------------------------------------------*/
    var SITE = SITE || {};
 
    SITE.fileInputs = function() {
      var $this = jQuery(this),
          $val = $this.val(),
          valArray = $val.split('\\'),
          newVal = valArray[valArray.length-1],
          $button = $this.siblings('.btn'),
          $fakeFile = $this.siblings('.file-holder');
      if(newVal !== '') {
        $button.text('File Chosen');
        if($fakeFile.length === 0) {
          $button.after('<span class="file-holder">' + newVal + '</span>');
        } else {
          $fakeFile.text(newVal);
        }
      }
    };

    jQuery('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        var tmppath = URL.createObjectURL(event.target.files[0]);

        reader.onload = function (e) {
          jQuery('#img-uploaded').attr('src', e.target.result);
          jQuery('input.img-path').val(tmppath);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    jQuery(".uploader").change(function(){
      readURL(this);
    });
jQuery('#file-upload').change(function() {
    var ele = document.getElementById($(this).attr('id'));
    var result = ele.files;
    for(var x = 0;x< result.length;x++){
     var fle = result[x];
        $("#output").append("<li>" + fle.name +"</li>");        
    }

});
</script>
</html>