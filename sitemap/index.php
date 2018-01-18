<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
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
        $seo->setId(2);
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
                        <h1 class="fnt-40 txt-black">SITEMAP</h1>
                        <ul class="sitemap">
                            <li><a href="<?php echo HTTP_PATH; ?>">Home</a></li>
                            <li><a href="<?php echo HTTP_PATH; ?>about">About</a></li>
                            <li>
                                <a href="<?php echo HTTP_PATH; ?>cards">Cards</a>
                                <ul class="sub-menu">
                                    <?php
                                        $cards = new Mod_Cards();
                                        $data = $cards->selectAll();
                                        for ($i = 0; $i < count($data); $i++) {
                                            $cards->extractor($data, $i);
                                            $card_page_url = strtolower(str_replace(' ', '-', $cards->name()));
                                    ?>
                                        <li><a href="<?php echo HTTP_PATH; ?>cards/<?php echo $card_page_url; ?>"><?php echo $cards->name(); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo HTTP_PATH; ?>discount">Discounts</a></li>
                            <li>
                                <a href="<?php echo HTTP_PATH; ?>partner-with-isic"> Partner with isic </a>
                                <ul class="sub-menu">
                                    <?php
                                        $partner_with_isic = new Mod_PartnerWithIsic();
                                        $partner_with_isic_data = $partner_with_isic->selectAll();
                                        for ($i = 0; $i < count($partner_with_isic_data); $i++) {
                                            $partner_with_isic->extractor($partner_with_isic_data, $i);
                                            $partner_with_isic_page_url = strtolower(str_replace(' ', '-', $partner_with_isic->name()));
                                    ?>
                                        <li><a href="<?php echo HTTP_PATH; ?>partner-with-isic/<?php echo $partner_with_isic_page_url; ?>"><?php echo $partner_with_isic->name(); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo HTTP_PATH; ?>travel-with-us">Travel With us</a>
                                <ul class="sub-menu">
                                    <?php
                                        $travel_with_us = new Mod_TravelWithUs();
                                        $travel_with_us_data = $travel_with_us->selectAll();
                                        for ($i = 0; $i < count($travel_with_us_data); $i++) {
                                            $travel_with_us->extractor($travel_with_us_data, $i);
                                            $travel_with_us_page_url = strtolower(str_replace(' ', '-', $travel_with_us->name()));
                                    ?>
                                        <li><a href="<?php echo HTTP_PATH; ?>travel-with-us/<?php echo $travel_with_us_page_url; ?>"><?php echo $travel_with_us->name(); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo HTTP_PATH; ?>take-a-vacation">Take a va-cay</a>
                                <ul class="sub-menu">
                                    <?php
                                        $take_a_vacation = new Mod_TakeAVacation();
                                        $take_a_vacation_data = $take_a_vacation->selectAll();
                                        for ($i = 0; $i < count($take_a_vacation_data); $i++) {
                                            $take_a_vacation->extractor($take_a_vacation_data, $i);
                                            $take_a_vacation_page_url = strtolower(str_replace(' ', '-', $take_a_vacation->name()));
                                    ?>
                                        <li><a href="<?php echo HTTP_PATH; ?>take-a-vacation/<?php echo $take_a_vacation_page_url; ?>"><?php echo $take_a_vacation->name(); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo HTTP_PATH; ?>fly-now-pay-later">Fly now, pay later</a>
                                <ul class="sub-menu">
                                    <?php
                                        $fly_now_pay_later = new Mod_FlyNowPayLater();
                                        $fly_now_pay_later_data = $fly_now_pay_later->selectAll();
                                        for ($i = 0; $i < count($fly_now_pay_later_data); $i++) {
                                            $fly_now_pay_later->extractor($fly_now_pay_later_data, $i);
                                            $fly_now_pay_later_page_url = strtolower(str_replace(' ', '-', $fly_now_pay_later->name()));
                                    ?>
                                        <li><a href="<?php echo HTTP_PATH; ?>fly-now-pay-later/<?php echo $fly_now_pay_later_page_url; ?>"><?php echo $fly_now_pay_later->name(); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo HTTP_PATH; ?>contact">Contact</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green padd-h-15">
                    <h1></h1>
                    <?php if (!empty($system_settings->telephone1())){ ?>
                        <p class="txt-black text-upper no-marg">
                            Hotline
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->telephone1(); ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->telephone2())){ ?>
                        <p class="txt-black text-upper no-marg">
                            Telephone
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->telephone2(); ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->addressLine1())){ ?>
                        <p class="txt-black text-upper no-marg">Address</p>
                        <p class="txt-white">
                            <?php
                                if (!empty($system_settings->addressLine1())) {
                                    echo $system_settings->addressLine1();
                                }
                                if (!empty($system_settings->addressLine2())) {
                                   echo ', ' . $system_settings->addressLine2();
                                }
                                if (!empty($system_settings->addressLine3())) {
                                    echo ', ' . $system_settings->addressLine3();
                                }
                                if (!empty($system_settings->addressLine4())) {
                                    echo  ', ' . $system_settings->addressLine4();
                                }
                                if (!empty($system_settings->addressLine5())) {
                                    echo ', ' . $system_settings->addressLine5();
                                }
                            ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->email())){ ?>
                        <p class="txt-black text-upper no-marg">
                            General mail
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->email(); ?>
                        </p>
                    <?php } ?>
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