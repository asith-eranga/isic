<?php
define("_MEXEC", "OK");
require_once("../system/load.php");
require_once(DOC_ROOT . 'system/user/modules/mod_discounts/helper.php');
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

    <title>ISIC | Discount</title>
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
                <div class="col-md-9 col-xs-12 layout-1-col layout-no-sidebar layout-bc-before no-padd">
                    <div class="main-section">
                        <div class="content-column">
                            <div class="grid">
                                <div class="grid-item ISIC"><a href="#"><img src="" data-src="<?php echo HTTP_PATH; ?>images/img-1.jpg" class="img-responsive img-cont "/></a></div>
                                <div class="grid-item grid-item--height2 ITIC"><a href="#"><img src="" data-src="<?php echo HTTP_PATH; ?>images/img-2.jpg" class="img-responsive img-cont " /></a></div>
                                <div class="grid-item ISIC"><a href="#"><img src="" data-src="<?php echo HTTP_PATH; ?>images/img-3.jpg" class="img-responsive img-cont "/></a></div>
                                <div class="grid-item grid-item--width2">
                                    <a href="" class="listing-mg-1-item ">
                                        <img src="" data-src="<?php echo HTTP_PATH; ?>images/img-4.jpg" class="img-responsive img-cont "/>
                                        <span class="format-icon format-audio"><i class="fa fa-eye"></i></span>
                                        <div class="content-container pos-abs bottom_0 ">
                                            <img src="<?php echo HTTP_PATH; ?>images/power-world-logo.jpg" class="img-responsive pull-left">
                                            <div class="padd-10 over-hidden">
                                                            <span class="title text-yellow"> <span class="post-url post-title">
RS. 5000/- DISCOUNT</span></span>
                                                <br>
                                                <span class="txt-white">from 5.00am to 5.00 pm - monday to saturday
Providing a quality healthcare service and giving our
members control over their health is paramount ....</span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item grid-item--half"><a href="#"><img src="" data-src="<?php echo HTTP_PATH; ?>images/img-5.jpg" class="img-responsive img-cont "/></a></div>
                                <div class="grid-item grid-item--half"><a href="#"><img src="" data-src="<?php echo HTTP_PATH; ?>images/img-6.jpg" class="img-responsive img-cont "/></a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php include(DOC_ROOT . 'partials/search-discount.php'); ?>
            </main>
            <footer>
                <?php include(DOC_ROOT . 'partials/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>
<script type="text/javascript" src="//unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script type="text/javascript" src="//unpkg.com/isotope-packery@2/packery-mode.pkgd.js"></script>
<script type="text/javascript" src="http://imagesloaded.desandro.com/imagesloaded.pkgd.js"></script>
<script>
    jQuery(document).ready(function() {
        var $grid = jQuery('.grid').isotope({
            layoutMode: 'packery',
            itemSelector: '.grid-item'
        });
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
        jQuery('.filter-button-group').on( 'click', '.button', function() {
            var filterValue = jQuery(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });
    });
</script>
</html>