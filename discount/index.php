<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_discounts/helper.php');
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
        $seo->setId(4);
        $seo_data = $seo->getById();
        $seo->extractor($seo_data);

        $title = $seo->pageTitle();
        if (isset($_GET['card'])) {
            $title .= ' | ' . strtoupper($_GET['card']);
        }
        if (isset($_GET['category'])) {
            $title .= ' | ' . strtoupper($_GET['category']);
        }
    ?>
    <title><?php echo $title; ?></title>
    <meta name="title" content="<?php echo $seo->metaTitle(); ?>">
    <meta name="description" content="<?php echo $seo->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $seo->metaKeywords(); ?>">

    <?php include(DOC_ROOT . 'partials/head.php'); ?>
    <style>
        .grid .grid-item {overflow:hidden;}
        .grid .grid-item .back-img{
           -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s;
        }
        .grid .grid-item:hover .back-img{
            transform: scale3d(1.1, 1.1, 1);
            -webkit-transform: scale3d(1.1, 1.1, 1);
            -moz-transform: scale3d(1.1, 1.1, 1)
        }
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

                                    $page = 1;
                                    if (isset($_GET['page']) && !empty($_GET['page'])) {
                                        $page = $_GET['page'];
                                    }
                                    if (isset($_GET['card']) || isset($_GET['category'])) {
                                        $page = null;
                                    }

                                    if (!empty($_POST['keyword'])) {
                                        $discounts->setName($_POST['keyword']);
                                        $discounts_data = $discounts->getByName();
                                        $total_discounts = count($discounts->getByName());
                                    } else {
                                        $discounts_data = $discounts->selectAllNormal($page);
                                        $total_discounts = count($discounts->selectAllNormal(null));
                                    }
                                    for ($i = 0; $i < count($discounts_data); $i++) {
                                        $discounts->extractor($discounts_data, $i);

                                        $saved_card_types = unserialize($discounts->cardType());
                                        $saved_categories = unserialize($discounts->category());

                                        if (isset($_GET['card'])) {
                                            $card_types = $discounts->getAllCardTypes();
                                            foreach ($card_types as $k => $v) {
                                                if($_GET['card'] == str_replace(' ', '-', strtolower($v)) ){
                                                    $card_type = $k;
                                                    break;
                                                }
                                            }
                                            if (!in_array($card_type, $saved_card_types)) {
                                                continue;
                                            }
                                        }

                                        if (isset($_GET['category'])) {
                                            $categories = $discounts->getAllCategories();
                                            foreach ($categories as $k => $v) {
                                                if($_GET['category'] == str_replace(' ', '-', strtolower($v)) ){
                                                    $category = $k;
                                                    break;
                                                }
                                            }
                                            if (!in_array($category, $saved_categories)) {
                                                continue;
                                            }
                                        }

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

                                        if ($image_properties[1] > 340) {
                                            $height = 'grid-item--height2';
                                        }

                                        $path_info_discounts = pathinfo($discounts->image());
                                    ?>
                                        <div class="grid-item <?php echo $width . ' ' . $height;
                                                foreach ($saved_card_types as $saved_card_type) {
                                                    echo ' card-' . $saved_card_type;
                                                }
                                                foreach ($saved_categories as $saved_category) {
                                                    echo ' category-' . $saved_category;
                                                }
                                            ?>">
                                            <a href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts->pageUrl(); ?>" class="listing-mg-1-item">
                                                <img src="<?php echo $discounts->image(); ?>" class="img-responsive" alt="<?php echo $path_info_discounts['filename']; ?>"/>
                                                <div class="back-img" style="background:url(<?php echo $discounts->image(); ?>)center / cover;position:absolute;width:100%;height:100%;top: 0;"></div>
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
<script type="text/javascript" src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/isotope-packery@2/packery-mode.pkgd.min.js"></script>
<script type="text/javascript" src="https://imagesloaded.desandro.com/imagesloaded.pkgd.min.js"></script>
<script>
    jQuery(window).load(function () {
        var $grid = jQuery('.grid').isotope({
            layoutMode: 'packery',
            itemSelector: '.grid-item'
        });
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('packery');
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