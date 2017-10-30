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

    <title>ISIC | Contact</title>
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

                        <h1 class="fnt-40 text-upper txt-black">
			Team Lk

			</h1>
                        <p class="txt-white">
                            Our Team is standing by to assist you with any questions or clarifications you might have about the International Student Identity Card (ISIC). Please get in touch with one of our executives today to embark on your ISIC experience opening doors to limiteless possibilities and offers.

                        </p>
                        <p>Equipped with just 2 staff members and minimal marketing budgets, ISIC Sri Lanka started with the humblest of beginning to say the least! </p>
                        <p>Innovative marketing ideas and the company's ability to gain the credibility of benefit merchants WrIffr, JUDEOUNITEDYENTURESSL.COM have turned ISIC from a travel card to a lifestyle card, essential to any students wallet! </p>
                        <p>Today, we are proud to comprise of a team of 8, 56 benefit providers, 1 financial co-brand, 1 aca-demic co-brand and a profitable business unit within the company. </p>

                    </div>

                </div>
                <div class="col-md-3 col-xs-12 no-padd text-left bg-green padd-h-15">
                    <h1 class="fnt-40 text-upper txt-black">
			Contacts

			</h1>
                    <?php if (!empty($system_settings->telephone1())){ ?>
                        <p class="txt-black text-upper no-marg">
                            Hotlines
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->telephone1(); ?>
                            <?php
                                if (!empty($system_settings->telephone2())) {
                                    echo ' | ' . $system_settings->telephone2();
                                }
                            ?>
                        </p>
                    <?php } ?>
                    <?php if (!empty($system_settings->addressLine1())){ ?>
                        <p class="txt-black text-upper no-marg">
                            <?php echo $system_settings->addressLine1(); ?>
                        </p>
                        <p class="txt-white">
                            <?php
                                if (!empty($system_settings->addressLine2())) {
                                   echo $system_settings->addressLine2();
                                }
                                if (!empty($system_settings->addressLine3())) {
                                    echo ', ' . $system_settings->addressLine3();
                                }
                                if (!empty($system_settings->addressLine4())) {
                                    echo ', ' . $system_settings->addressLine4();
                                }
                                if (!empty($system_settings->addressLine5())) {
                                    echo ', ' . $system_settings->addressLine5() . '.';
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
                    <?php if (!empty($system_settings->fax())){ ?>
                        <p class="txt-black text-upper no-marg">
                            General fax
                        </p>
                        <p class="txt-white">
                            <?php echo $system_settings->fax(); ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="col-md-12 col-xs-12 bg-black txt-white padd-v-40 marg-v-20">
                    <form class="form-horizontal">

                        <div class="col-sm-10 col-xs-12 float-n center-block dis-flex" style="float:none">
                            <div class="col-sm-4 padd-v-10">
                                <div class="input-container">
                                    <label for="firstname" class="text-upper">Name</label>
                                    <input class="material" type="text" id="firstname">
                                </div>
                                <div class="input-container">
                                    <label for="lastname" class="text-upper">E-mail</label>
                                    <input class="material" type="text" id="lastname">
                                </div>
                                <div class="input-container">
                                    <label for="company" class="text-upper">Phone</label>
                                    <input class="material" type="text" id="company">
                                </div>

                            </div>
                            <div class="col-sm-6 padd-v-10">
                                <div class="input-group">
                                    <textarea id="appendedcheckbox" name="appendedcheckbox" class="form-control bg-black border-2-white" type="text" placeholder="MESSAGE" rows="8"></textarea>

                                </div>

                            </div>
                            <div class="col-sm-2 padd-v-10">
                                <div class="dis-tbl full-height full-width">
                                    <div class="dis-tbl-cell full-height full-width tbl-con-algn-btm">
                                        <button class="btn btn-submit marg-v-10 text-upper"><strong>Submit</strong></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-12 col-xs-12 bg-green txt-white ">
                    <div class="row">

                        <div id="map_container"></div>
                        <div id="map"></div>
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
</body>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtr3FT0uDFpjx-VisBICLWclTjETC6UTc">
</script>
<script>
    jQuery(function() {
        jQuery("input, textarea").on("focusin", function() {
            jQuery(this).parent().addClass("active");
        });
        jQuery("input").on("focusout", function() {
            jQuery(this).val() === "" ? jQuery(this).parent().removeClass("active") : false;
        })
    });
    jQuery(document).ready(function() {

        function initialize() {
            var myLatlng = new google.maps.LatLng(<?php echo $system_settings->mapCoordinates(); ?>);
            var imagePath = 'images/Pin-location.png'
            var mapOptions = {
                zoom: 17,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            //Callout Content
            var contentString = 'Some address here..';
            //Set window width + content
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 500
            });

            //Add Marker
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                icon: imagePath,
                title: 'image title'
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });

            //Resize Function
            google.maps.event.addDomListener(window, "resize", function() {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                map.setCenter(center);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    });
</script>

</html>