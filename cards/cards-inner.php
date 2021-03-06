<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_cards/helper.php');
    require_once(DOC_ROOT . 'system/user/modules/mod_testimonials/helper.php');

    $card_name = $_GET['card_name'];
    //$card_name = rtrim($current_path, '/');
    $card_name = strtolower(str_replace('-', ' ', $card_name));

    $card_inner = new Mod_Cards();
    $card_inner->setName($card_name);
    $card_inner_data = $card_inner->getByName();
    $card_inner->extractor($card_inner_data);
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

    <title><?php echo $card_inner->pageTitle(); ?></title>
    <meta name="title" content="<?php echo $card_inner->metaTitle(); ?>">
    <meta name="description" content="<?php echo $card_inner->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $card_inner->metaKeywords(); ?>">

    <?php include(DOC_ROOT . 'partials/head.php'); ?>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.css' type='text/css' media='all' />
</head>

<body class="main-menu-sticky-smart ">

    <div class="main-wrap content-main-wrap">
        <header id="header" class="site-header header-style-1 boxed">
            <?php include_once(DOC_ROOT . 'partials/header.php'); ?>
            <?php include_once(DOC_ROOT . 'partials/card.php'); ?>
            <?php include(DOC_ROOT . 'partials/main-menu.php'); ?>
        </header>
        <?php
            include(DOC_ROOT . 'partials/mobile-logo.php');
        ?>
        <div class="content-wrap">
            <main id="content" class="content-container dis-flex">
                <div class="col-md-9 col-xs-12 bg-green txt-white dis-flex">
                    <div class="col-md-12 col-xs-12 padd-10">
                        <h1 class="fnt-40 text-upper txt-black">
                            <?php echo $card_inner->title1(); ?>
                        </h1>
                        <?php echo $card_inner->description1(); ?>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green no-padd">
                    <h2 class="text-upper txt-black padd-v-10">
                        <?php echo $card_inner->title2(); ?>
			        </h2>
                    <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $card_inner->description2()); ?>
                    <br>
                    <div class="bdr-5-yellow bg-black pos-rela take-top100 marg-btm-15">
                        <div class="testimonial owl-carousel owl-theme">
                            <?php
                                $testimonials = new Mod_Testimonials();
                                $data = $testimonials->selectAll();
                                for ($i = 0; $i < count($data); $i++) {
                                    $testimonials->extractor($data, $i);
                                    $path_info_testimonials = pathinfo($testimonials->image());
                            ?>
                            <div class="item">
                                <div class="padd-20 dis-in-blk">
                                    <p class="txt-white padd-h-15">
                                        <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $testimonials->description()); ?>
                                    </p>
                                    <img src="<?php echo $testimonials->image(); ?>" alt="<?php echo $path_info_testimonials['filename']; ?>" class="img-responsive pull-right" style="width:auto;"/>
                                    <h4 class="txt-green"><?php echo $testimonials->name(); ?></h4>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 text-left bg-black ">
                    <div class="col-md-8 col-xs-12 text-left marg-btm-20">
                        <h2 class="text-upper txt-yellow padd-v-10">
                            <?php echo $card_inner->title3(); ?>
                        </h2>
                        <p class="txt-white ">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $card_inner->description3()); ?>
                        </p>
                        <h3 class="text-upper pull-right marg-v-10">
                            <a href="<?php echo HTTP_PATH; ?>get-your-card">
                                <span class="txt-yellow">apply now >></span>
                            </a>
			            </h3>
                    </div>
                    <div class="col-md-4 col-xs-12 text-left marg-btm-20 padd-v-30">
                        <div class="padd-v-10 col-xs-12 ">
                            <img src="<?php echo HTTP_PATH; ?>images/card_icon_1.jpg" alt="isic_card_warranty_icon" class="pull-right" />
                            <h4 class="txt-yellow text-right fnt-18"><?php echo $card_inner->dateOfIssue(); ?> <br>from the <br>date of issue</h4>
                        </div>
                        <div class="padd-v-10 col-xs-12 ">
                            <img src="<?php echo HTTP_PATH; ?>images/card_icon_2.jpg" alt="isic_card_price_icon" class="pull-right" />
                            <h4 class="txt-yellow text-right fnt-18 padd-v-20"><?php echo $card_inner->price(); ?></h4>
                        </div>
                        <div class="padd-v-10 col-xs-12 ">
                            <img src="<?php echo HTTP_PATH; ?>images/card_icon_3.jpg" alt="isic_card_refundable_icon" class="pull-right" />
                            <h4 class="txt-yellow text-right fnt-18">ISIC / IYTC / ITIC <br>cards are<br>non-refundable</h4>
                        </div>
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
<script>
    jQuery('.testimonial').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: true,
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
    })
</script>
</html>