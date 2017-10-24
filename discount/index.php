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
                            <div class="slider-container clearfix slider-type-custom-blocks  slider-style-2-container slider-overlay-simple">
                                <div class="listing listing-modern-grid listing-modern-grid-1 clearfix slider-overlay-simple">

                                    <div class="mg-col mg-col-2">
                                        <div class="mg-row mg-row-1">
                                            <div class="item-3-cont">
                                                <article class="type-post format-standard has-post-thumbnail  listing-item-3 listing-item listing-mg-item listing-mg-type-1 listing-mg-1-item main-term-2">
                                                    <div class="item-content">
                                                        <a title="See how the fashion world was influenced by Prince’s Legendary" data-src="<?php echo HTTP_PATH; ?>images/img-1.jpg" class="img-cont" href="#"></a>

                                                    </div>
                                                </article>
                                            </div>
                                            <div class="item-4-cont">
                                                <article class="type-post format-standard has-post-thumbnail  listing-item-4 listing-item listing-mg-item listing-mg-type-1 listing-mg-1-item main-term-3">
                                                    <div class="item-content">
                                                        <a title="..." data-src="<?php echo HTTP_PATH; ?>images/img-2.jpg" class="img-cont" href="#"></a>

                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="mg-row mg-row-2">
                                            <article class="type-post format-standard has-post-thumbnail  listing-item-2 listing-item listing-mg-item listing-mg-type-1 listing-mg-1-item main-term-2">
                                                <div class="item-content">
                                                    <a title="..." data-src="<?php echo HTTP_PATH; ?>images/img-4.jpg" class="img-cont" href="#"></a>
                                                    <span class="format-icon format-audio"><i class="fa fa-eye"></i></span>

                                                    <div class="content-container">
                                                        <img src="<?php echo HTTP_PATH; ?>images/power-world-logo.jpg" class="img-responsive pull-left">
                                                        <div class="padd-10 over-hidden">
                                                            <span class="title text-yellow"> <a href="#" class="post-url post-title">
RS. 5000/- DISCOUNT</a></span>
                                                            <br>
                                                            <span class="txt-white">from 5.00am to 5.00 pm - monday to saturday
Providing a quality healthcare service and giving our
members control over their health is paramount ....</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                    </div>
                                    <div class="mg-col mg-col-1">
                                        <article class="type-post format-standard has-post-thumbnail  listing-item-1 listing-item listing-mg-item listing-mg-type-1 listing-mg-1-item main-term-4">
                                            <div class="item-content">
                                                <a title="..." data-src="<?php echo HTTP_PATH; ?>images/img-3.jpg" class="img-cont " href="#"></a>

                                            </div>
                                        </article>
                                    </div>
                                    <div class="">
                                        <div class="item-3-cont">
                                            <article class="type-post format-standard has-post-thumbnail  listing-item-5 listing-item listing-mg-item listing-mg-type-1 listing-mg-1-item main-term-2">
                                                <div class="item-content">
                                                    <a title="See how the fashion world was influenced by Prince’s Legendary" data-src="<?php echo HTTP_PATH; ?>images/img-5.jpg" class="img-cont " href="#"></a>

                                                </div>
                                            </article>
                                        </div>
                                        <div class="item-4-cont">
                                            <article class="type-post format-standard has-post-thumbnail listing-item-6 listing-item listing-mg-item listing-mg-type-1 listing-mg-1-item main-term-3">
                                                <div class="item-content">
                                                    <a title="..." data-src="<?php echo HTTP_PATH; ?>images/img-6.jpg" class="img-cont" href="#"></a>

                                                </div>
                                            </article>
                                        </div>

                                    </div>
                                </div>
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

</html>