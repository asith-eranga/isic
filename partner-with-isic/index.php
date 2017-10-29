<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
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

    <title>ISIC | Partner With ISIC</title>
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
                    $partner_with_isic = new Mod_PartnerWithIsic();
                    $partner_with_isic_data = $partner_with_isic->selectAll();
                    for ($i = 0; $i < count($partner_with_isic_data); $i++) {
                        $partner_with_isic->extractor($partner_with_isic_data, $i);
                        $partner_with_isic_target = strtolower(str_replace(' ', '-', $partner_with_isic->name()));
                        if (!$i%2){
                ?>
                <div class="bg-green padd-v-30" id="<?php echo $partner_with_isic_target; ?>">
                    <div class="col-md-6 col-xs-12 text-left bg-green col-md-push-6 no-padd-rght">
                        <span class="bder-L-shape">
		                    <img src="" alt="...." data-src="<?php echo $partner_with_isic->image(); ?>" class="img-responsive img-cont full-width " >
		                </span>
                    </div>
                    <div class="col-md-6 col-xs-12 txt-white bg-green col-md-pull-6 ">
                        <h1 class="fnt-40 text-upper txt-black text-right"><?php echo $partner_with_isic->name(); ?></h1>
                        <p class="txt-white text-right">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $partner_with_isic->description()); ?>
                        </p>
                    </div>
                </div>
                <?php } else { ?>
                <div class="bg-green padd-v-30" id="<?php echo $partner_with_isic_target; ?>">
                    <div class="col-md-6 col-xs-12 text-left bg-green no-padd-left">
                        <span class="bder-L-shape right">
		                    <img src="" alt="...." data-src="<?php echo $partner_with_isic->image(); ?>" class="img-responsive img-cont full-width " >
		                </span>
                    </div>
                    <div class="col-md-6 col-xs-12 txt-white bg-green ">
                        <h1 class="fnt-40 text-upper txt-black text-left"><?php echo $partner_with_isic->name(); ?></h1>
                        <p class="txt-white text-left">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $partner_with_isic->description()); ?>
                        </p>
                    </div>
                </div>
                <?php } } ?>
            </main>
            <footer>
                <?php include(DOC_ROOT . 'partials/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>