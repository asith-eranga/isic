<?php
    define("_MEXEC", "OK");
    require_once("system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_home_page/helper.php');
    require_once(DOC_ROOT . 'system/user/modules/mod_events/helper.php');
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

    <title>ISIC</title>

    <?php include_once(DOC_ROOT . 'partials/head.php'); ?>
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
                                $discounts_data = $discounts->selectAll();
                                for ($i = 0; $i < count($discounts_data); $i++) {
                                    if($i==6){
                                        break;
                                    }
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
                                        <div class="type-post format-standard grid-item <?php echo $width . ' ' . $height . ' card-' . $discounts->cardType() . ' category-' . $discounts->category(); ?>">
                                    <?php } else { ?>
                                        <div class="type-post format-standard grid-item grid-item--width2 <?php echo 'card-' . $discounts->cardType() . ' category-' . $discounts->category(); ?>">
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

                <div class="col-md-3 col-xs-12 no-padd">
                    <h3 class="padd-h-60 text-upper txt-green">
                        FEATURED<br>
                        offers<br>
                        <span class="fnt-18">for</span>
                    </h3>
                    <h3 class="padd-h-60 text-upper txt-yellow">
                        Students<br>
                        teachers<br>
                        youth
                    </h3>
                    <br>
                    <div class="pos-rela text-center">
                        <div class="center-yellow-line">
                            <div class="mg-col mg-col-1 ">
                                <article class="type-post format-standard has-post-thumbnail  listing-item-1 listing-item listing-mg-item listing-mg-type-2 listing-mg-1-item ">
                                    <div class="item-content">
                                        <a title="..." data-src="<?php echo HTTP_PATH; ?>images/img-7.jpg" href="#" class="img-cont"></a>
                                    </div>
                                </article>
                            </div>
                            <div class="mg-col mg-col-1">
                                <article class="type-post format-standard listing-item-1 listing-item listing-mg-item listing-mg-type-2 listing-mg-2-item">
                                    <div class="item-content">
                                        <a title="#" data-src="<?php echo HTTP_PATH; ?>images/img-8.jpg" class="img-cont" href="#" style=""></a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    $home_1 = new Mod_HomePage();
                    $home_1->setId(1);
                    $home_data_1 = $home_1->getById();
                    $home_1->extractor($home_data_1);
                ?>
                <div class="col-md-9 col-xs-12 bg-green txt-white dis-flex">
                    <div class="col-md-7 col-xs-12 padd-10">
                        <h1 class="fnt-50 txt-black"><?php echo $home_1->title(); ?></h1>
                        <p class="text-upper txt-white">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $home_1->description()); ?>
                        </p>
                    </div>
                    <div class="col-md-5 col-xs-12 ">
                        <div class="dis-tbl full-height full-width">
                            <div class="dis-tbl-cell full-height full-width tbl-con-algn-center">
                                <img src="<?php echo $home_1->image(); ?>" alt="...." data-src="<?php echo $home_1->image(); ?>" class="img-responsive img-cont center-block"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 no-padd text-center center-yellow-line">
                    <div class=" bg-white ">
                        <h2 class="fnt-80 l-hght-80 txt-black dis-in-blk text-left no-marg marg-tp-10 take-top100 pos-rela">FOR<br>WHO<br>IS<br></h2>
                    </div>
                    <div class=" bg-black ">
                        <h2 class="fnt-80 l-hght-80 txt-white dis-in-blk text-left no-marg take-top100 pos-rela">IT?</h2>
                    </div>
                </div>

                    <div class="col-md-12 col-xs-12 bg-black padd-v-20 txt-white">
                        <div class="dis-flex full-height">
                            <div class="col-md-8 col-xs-12 no-padd">
                                <div class="owl-carousel owl-theme green-border-right">
                                    <?php
                                        $events = new Mod_Events();;
                                        $events_data = $events->selectAll();
                                        for ($i = 0; $i < count($events_data); $i++) {
                                            $events->extractor($events_data, $i);
                                    ?>
                                    <div class="item">
                                        <div class="col-md-6 col-xs-12 ">
                                            <span class="bder-L-shape ">
		                                        <img src="" alt="...." data-src="<?php echo $events->image(); ?>" class="img-responsive img-cont " >
		                                    </span>
                                        </div>
                                        <div class="col-md-6 col-xs-12 no-padd ">
                                            <h2 class="padd-h-30 txt-white">EVENTS</h2>
                                            <div class="bdr-5-yellow bg-black pos-rela take-top100">
                                                <div class="padd-h-30">
                                                    <h4 class="txt-green"><?php echo $events->name(); ?></h4>
                                                    <p class="text-upper">
                                                        <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $events->description()); ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <!--<a class="text-upper padd-h-30 txt-green padd-v-15 show" href="#">view all...</a>-->
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php
                        $home_2 = new Mod_HomePage();
                        $home_2->setId(2);
                        $home_data_2 = $home_2->getById();
                        $home_2->extractor($home_data_2);
                        ?>
                        <div class="col-md-4 col-xs-12 bg-green padd-40 ">
                            <h2 class="h1 txt-black"><?php echo $home_2->title(); ?></h2>
                            <?php echo str_replace(['<pre>', '</pre>'], '', $home_2->description()); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 bg-green padd-v-15 txt-white ">
                </div>
            </main>
            <footer>
                <?php include(DOC_ROOT . 'partials/footer.php'); ?>
            </footer>
        </div>
    </div>
<?php include(DOC_ROOT . 'partials/mobile-menu.php'); ?>
</body>
<script type="text/javascript" src="//unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script type="text/javascript" src="//unpkg.com/isotope-packery@2/packery-mode.pkgd.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.min.js"></script>
<script>
    jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText : ["<i class='fa fa-chevron-left fnt-20 padd-5'></i>","<i class='fa fa-chevron-right fnt-20 padd-5'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
jQuery(window).load(function () {
       var $grid = jQuery('.grid').isotope({
            layoutMode: 'packery',
            itemSelector: '.grid-item'
        });

        $grid.imagesLoaded().progress( function() {

            $grid.isotope('layout');
        });
    });
</script>
</html>