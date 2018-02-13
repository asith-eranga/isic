<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_contact/helper.php');
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
        $seo->setId(9);
        $seo_data = $seo->getById();
        $seo->extractor($seo_data);
    ?>
    <title><?php echo $seo->pageTitle(); ?></title>
    <meta name="title" content="<?php echo $seo->metaTitle(); ?>">
    <meta name="description" content="<?php echo $seo->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $seo->metaKeywords(); ?>">

    <?php include(DOC_ROOT . 'partials/head.php'); ?>
</head>

<body class="main-menu-sticky-smart ">

    <div class="main-wrap content-main-wrap">
        <header id="header" class="site-header header-style-1 boxed">
            <?php include_once(DOC_ROOT . 'partials/header.php'); ?>
            <?php include_once(DOC_ROOT . 'partials/card.php'); ?>
            <?php include(DOC_ROOT . 'partials/main-menu.php'); ?>
        </header>
        <?php include(DOC_ROOT . 'partials/mobile-logo.php'); ?>
        <div class="content-wrap">
            <main id="content" class="content-container dis-flex">
                <?php
                    $contact = new Mod_Contact();
                    $contact->setId(1);
                    $contact_data = $contact->getById();
                    $contact->extractor($contact_data);
                ?>
                <div class="col-md-9 col-xs-12 bg-green txt-white dis-flex">
                    <div class="col-md-12 col-xs-12 padd-10">
                        <h1 class="fnt-40 text-upper txt-black">
                            <?php echo $contact->title(); ?>
			            </h1>
                        <p>
                            <?php echo $contact->description(); ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green padd-h-15">
                    <h1></h1>
                    <?php if (!empty($system_settings->telephone1())){ ?>
                        <p class="txt-black text-upper no-marg">
                            Hotline
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->telephone1(); ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->telephone2())){ ?>
                        <p class="txt-black text-upper no-marg">
                            Telephone
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->telephone2(); ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->addressLine1())){ ?>
                        <p class="txt-black text-upper no-marg">Address</p>
                        <p class="txt-white">
                            <?php
                                if (!empty($system_settings->addressLine1())) {
                                    echo $system_settings->addressLine1();
                                }
                                if (!empty($system_settings->addressLine2())) {
                                   echo ', ' . $system_settings->addressLine2();
                                }
                                if (!empty($system_settings->addressLine3())) {
                                    echo ', ' . $system_settings->addressLine3();
                                }
                                if (!empty($system_settings->addressLine4())) {
                                    echo  ', ' . $system_settings->addressLine4();
                                }
                                if (!empty($system_settings->addressLine5())) {
                                    echo ', ' . $system_settings->addressLine5();
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
                </div>
                <div class="col-md-12 col-xs-12 bg-black txt-white padd-v-40 marg-v-20">
                    <form class="form-horizontal" id="contact-form" action="">

                        <div class="col-sm-10 col-xs-12 float-n center-block dis-flex" style="float:none">
                            <div class="col-sm-4 padd-v-10">
                                <div class="input-container">
                                    <label for="firstname" class="text-upper">Name</label>
                                    <input class="material" type="text" id="contact_name" name="contact_name" required>
                                </div>
                                <div class="input-container">
                                    <label for="lastname" class="text-upper">E-mail</label>
                                    <input class="material" type="text" id="contact_email" name="contact_email" required>
                                </div>
                                <div class="input-container">
                                    <label for="contact_phone" class="text-upper">Phone</label>
                                    <input class="material" type="text" id="contact_phone" name="contact_phone">
                                </div>

                            </div>
                            <div class="col-sm-6 padd-v-10">
                                <div class="input-group">
                                    <textarea id="contact_message" name="contact_message" class="form-control bg-black border-2-white" placeholder="MESSAGE" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-2 padd-v-10">
                                <div class="dis-tbl full-height full-width">
                                    <div class="dis-tbl-cell full-height full-width tbl-con-algn-btm">
                                        <button class="btn btn-submit marg-v-10 text-upper contact-button"><strong>Submit</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10" style="display: none" id="contact-success-message">
                                <h5 class="txt-green-light pull-right">
                                    Thank You! Your message has been sent
                                </h5>
                            </div>
                            <div class="col-sm-10" style="display: none" id="contact-error-message">
                                <h5 class="txt-yellow pull-right">
                                    Oops! Something went wrong and we couldn't send your message
                                </h5>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-12 col-xs-12 bg-green txt-white ">
                    <div class="row">
                        <iframe src="<?php echo $system_settings->mapEmbedCodeSRC(); ?>" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
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
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/contact.js'></script>
<script>
    jQuery(function() {
        jQuery("input, textarea").on("focusin", function() {
            jQuery(this).parent().addClass("active");
        });
        jQuery("input").on("focusout", function() {
            jQuery(this).val() === "" ? jQuery(this).parent().removeClass("active") : false;
        })
    });
</script>

</html>