<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_card_page/helper.php');
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
        $seo->setId(3);
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
                <div class="col-md-9 col-xs-12 bg-green txt-white dis-flex">
                    <div class="col-md-12 col-xs-12 padd-10">
                        <?php
                            $card_1 = new Mod_CardPage();
                            $card_1->setId(1);
                            $card_data_1 = $card_1->getById();
                            $card_1->extractor($card_data_1);
                        ?>
                        <h1 class="fnt-40 txt-black"><?php echo $card_1->title(); ?></h1>
                        <p class="txt-white">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $card_1->description()); ?>
                        </p>
                    </div>

                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green padd-h-15">
                    <?php
                        $card_2 = new Mod_CardPage();
                        $card_2->setId(2);
                        $card_data_2 = $card_2->getById();
                        $card_2->extractor($card_data_2);
                    ?>
                    <h1 class="fnt-40 txt-black"><?php echo $card_2->title(); ?></h1>
                    <p class="txt-white">
                        <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $card_2->description()); ?>
                    </p>

                    <?php
                        $card_3 = new Mod_CardPage();
                        $card_3->setId(3);
                        $card_data_3 = $card_3->getById();
                        $card_3->extractor($card_data_3);
                    ?>
                    <h1 class="fnt-40 txt-black"><?php echo $card_3->title(); ?></h1>
                    <p class="txt-white">
                        <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $card_3->description()); ?>
                    </p>
                </div>
            </main>
            <footer>
                <?php include(DOC_ROOT . 'partials/footer.php'); ?>
            </footer>
        </div>
    </div>
<?php include(DOC_ROOT . 'partials/mobile-menu.php'); ?>
</body>

</html>