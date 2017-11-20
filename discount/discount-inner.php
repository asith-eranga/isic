<?php
    define("_MEXEC", "OK");
    require_once("../system/load.php");
    require_once(DOC_ROOT . 'system/user/modules/mod_discounts/helper.php');

    $id = $_GET['id'];
    $discounts_inner = new Mod_Discounts();
    $discounts_inner->setId($id);
    $discounts_inner_data = $discounts_inner->getById();
    $discounts_inner->extractor($discounts_inner_data);
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

    <meta property="og:url" content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $discounts_inner->name(); ?>" />
    <meta property="og:image" content="<?php echo $discounts_inner->image(); ?>" />

    <title>ISIC | Discount</title>
    <?php include(DOC_ROOT . 'partials/head.php'); ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
                <div class="col-md-9 col-xs-12 padd-v-10 padd-h-25 marg-tp-5 layout-bc-before  bg-green">
                    <div class="main-section padd-v-25 ">
                        <div class="col-xs-12">
                            <img src="<?php echo HTTP_PATH; ?>images/power-world-logo2.jpg" class="img-responsive pull-left">
                            <h3 class="dis-in-blk text-upper padd-h-15 txt-black">
                                <?php echo $discounts_inner->name(); ?>
                            </h3>
                        </div>
                        <div class="col-xs-12">
                            <h3 class="btn btn-primary txt-black pull-left">Rs 5,000.00 Discount</h3>
                            <h4 class="txt-yellow text-upper dis-in-blk padd-15">offer valid for</h4>
                            <img src="<?php echo HTTP_PATH; ?>images/icons/cat-<?php echo $discounts_inner->cardType()+1; ?>.png">
                            <div class="fb-share-button" data-href="https://www.facebook.com/ISICsrilanka/" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FISICsrilanka%2F&amp;src=sdkpreparse">Share</a></div>
                        </div>
                        <div class="col-xs-12">
                            <?php echo str_replace(['<pre>', '</pre>'], '', $discounts_inner->description()); ?>
                        </div>
                        <div class="col-xs-12">
                            <span class="bder-L-shape right">
                                <div id="map_container"></div>
                                <div id="map"></div>
                            </span>
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
<script>
jQuery('button').on('click', function() {
  jQuery(this).parent().toggleClass('start-animation');
});
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtr3FT0uDFpjx-VisBICLWclTjETC6UTc">
</script>
<script>
 
    jQuery(document).ready(function() {

        function initialize() {
            var myLatlng = new google.maps.LatLng(6.904856, 79.853174);
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
               // icon: imagePath,
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