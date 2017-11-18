<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_about_page/helper.php');
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

    <title>ISIC | About</title>
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
                            $about_1 = new Mod_AboutPage();
                            $about_1->setId(1);
                            $about_data_1 = $about_1->getById();
                            $about_1->extractor($about_data_1);
                        ?>
                        <h1 class="fnt-40 txt-black"><?php echo $about_1->title(); ?></h1>
                        <p class="txt-white">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $about_1->description()); ?>
                        </p>
                    </div>

                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green padd-h-15">
                    <?php
                        $about_2 = new Mod_AboutPage();
                        $about_2->setId(2);
                        $about_data_2 = $about_2->getById();
                        $about_2->extractor($about_data_2);
                    ?>
                    <h1 class="fnt-40 text-upper txt-black"><?php echo $about_2->title(); ?></h1>
                    <p class="txt-white">
                        <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $about_2->description()); ?>
                    </p>

                    <?php
                        $about_3 = new Mod_AboutPage();
                        $about_3->setId(3);
                        $about_data_3 = $about_3->getById();
                        $about_3->extractor($about_data_3);
                    ?>
                    <h1 class="fnt-40 text-upper txt-black"><?php echo $about_3->title(); ?></h1>
                    <p class="txt-white">
                        <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $about_3->description()); ?>
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