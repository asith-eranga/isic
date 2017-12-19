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
<style>

	</style>
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
                                <?php
                                    $discounts = new Mod_Discounts();
                                    if (!empty($_POST['keyword'])) {
                                        $discounts->setName($_POST['keyword']);
                                        $discounts_data = $discounts->getByName();
                                    } else if ($_GET['card'] != null) {
                                        $discounts->setCardType($_GET['card']);
                                        $discounts_data = $discounts->getByCardType();
                                    } else if ($_GET['category'] != null) {
                                        $discounts->setCategory($_GET['category']);
                                        $discounts_data = $discounts->getByCategoryType();
                                    } else {
                                        $discounts_data = $discounts->selectAll();
                                    }
                                    for ($i = 0; $i < count($discounts_data); $i++) {
                                        $discounts->extractor($discounts_data, $i);

                                        // generate the image size classes
                                        $image_properties = getimagesize($discounts->image());
                                        if ($image_properties[0] <= 340) {
                                            $width = null;
                                        } elseif ($image_properties[0] < 506) {
                                            $width = 'grid-item--half';
                                        } elseif ($image_properties[0] < 676) {
                                            $width = 'grid-item--width2';
                                        } else {
                                            $width = 'grid-item--full';
                                        }

                                        if ($image_properties[1] <= 340) {
                                            $height = null;
                                        } else {
                                            $height = 'grid-item--height2';
                                        }

                                        if ($discounts->displayType() == 0) { ?>
                                        <div class="grid-item <?php echo $width . ' ' . $height . ' card-' . $discounts->cardType() . ' category-' . $discounts->category(); ?>">
                                            <?php } else { ?>
                                            <div class="grid-item grid-item--width2 <?php echo 'card-' . $discounts->cardType() . ' category-' . $discounts->category(); ?>">
                                                <?php } ?>
                                                <a href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts->id(); ?>" class="listing-mg-1-item">
                                                    <img src="<?php echo $discounts->image(); ?>" class="img-responsive"/>
                                                    <!--<span class="format-icon format-audio"><i class="fa fa-eye"></i></span>
                                                    <div class="content-container pos-abs bottom_0 ">
                                                        <img src="<?php echo $discounts->logo(); ?>" class="img-responsive pull-left">
                                                        <div class="padd-10 over-hidden">
                                                                <span class="title text-yellow">
                                                                    <span class="post-url post-title">
                                                                        <?php echo $discounts->name(); ?>
                                                                    </span>
                                                                </span>
                                                            <br>
                                                            <span class="txt-white">
                                                                    <?php echo substr(str_replace(['<pre>', '</pre>'], '', $discounts->description()), 0, 150) . '...'; ?>
                                                                </span>
                                                        </div>
                                                    </div>-->
                                                </a>
                                            </div>
                                    <?php } ?>
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
<?php include(DOC_ROOT . 'partials/mobile-menu.php'); ?>
</body>
<script type="text/javascript" src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script type="text/javascript" src="https://unpkg.com/isotope-packery@2/packery-mode.pkgd.js"></script>
<script type="text/javascript" src="https://imagesloaded.desandro.com/imagesloaded.pkgd.js"></script>
<script>
    jQuery(window).load(function () {
        var $grid = jQuery('.grid').isotope({
            layoutMode: 'packery',
            itemSelector: '.grid-item'
        });
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
        jQuery('.filter-button-group').on( 'click', '.flt-button', function() {

            var filterValue = jQuery(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });
    });

    jQuery(document).ready(function(){
        jQuery('.filter-button-group').on( 'click', '.expand', function() {
            if(jQuery(this).hasClass('active'))
            {
                jQuery(this).removeClass('active');
                jQuery(this).html("<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>");
                jQuery(this).parent().next().stop().slideUp(300);
            } else {
                jQuery(this).addClass('active');
                jQuery(this).html("<i class=\"fa fa-minus\" aria-hidden=\"true\"></i>");
                jQuery(this).parent().next().stop().slideDown(300);
            }
        });
    });
</script>
</html>