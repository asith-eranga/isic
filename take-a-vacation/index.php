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

    <title>ISIC | Take A Vacation</title>
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
                    $take_a_vacation = new Mod_TakeAVacation();
                    $take_a_vacation_data = $take_a_vacation->selectAll();
                    for ($i = 0; $i < count($take_a_vacation_data); $i++) {
                        $take_a_vacation->extractor($take_a_vacation_data, $i);
                        $take_a_vacation_target = strtolower(str_replace(' ', '-', $take_a_vacation->name()));
                        if (!$i%2){
                ?>
                <div class="bg-green padd-v-30" id="<?php echo $take_a_vacation_target; ?>">
                    <div class="col-md-6 col-xs-12 text-left bg-green col-md-push-6 no-padd-rght">
                        <span class="bder-L-shape">
		                    <img src="" alt="...." data-src="<?php echo $take_a_vacation->image(); ?>" class="img-responsive img-cont full-width " >
		                </span>
                    </div>
                    <div class="col-md-6 col-xs-12 txt-white bg-green col-md-pull-6 ">
                        <h1 class="fnt-40 text-upper txt-black text-right"><?php echo $take_a_vacation->name(); ?></h1>
                        <p class="txt-white text-right">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $take_a_vacation->description()); ?>
                        </p>
                    </div>
                </div>
                <?php } else { ?>
                <div class="bg-green padd-v-30" id="<?php echo $take_a_vacation_target; ?>">
                    <div class="col-md-6 col-xs-12 text-left bg-green no-padd-left">
                        <span class="bder-L-shape right">
		                    <img src="" alt="...." data-src="<?php echo $take_a_vacation->image(); ?>" class="img-responsive img-cont full-width " >
		                </span>
                    </div>
                    <div class="col-md-6 col-xs-12 txt-white bg-green ">
                        <h1 class="fnt-40 text-upper txt-black text-left"><?php echo $take_a_vacation->name(); ?></h1>
                        <p class="txt-white text-left">
                            <?php echo str_replace(['<p>', '</p>', '<pre>', '</pre>'], '', $take_a_vacation->description()); ?>
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
<?php include(DOC_ROOT . 'partials/mobile-menu.php'); ?>
</body>

</html>