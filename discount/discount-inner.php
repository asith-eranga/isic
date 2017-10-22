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

    <title>ISIC | Discount inner</title>
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
                <div class="col-md-9 col-xs-12 padd-v-10 padd-h-25 marg-tp-5 layout-bc-before  bg-green">
                    <div class="main-section padd-v-25 ">
					<div class="col-xs-12">
                        <img src="<?php echo HTTP_PATH; ?>images/power-world-logo2.jpg" class="img-responsive pull-left">
						<h3 class="dis-in-blk text-upper padd-h-15 txt-black">Power World- Colombo/Kandy/jaffna</h3>
                    </div>
					<div class="col-xs-12">
						<h3 class="btn btn-primary txt-black pull-left">Rs 5,000.00 Discount</h3>
						<h4 class="txt-yellow text-upper dis-in-blk padd-15">offer valid for</h4>
						<img src="<?php echo HTTP_PATH; ?>images/offer-labels.jpg">
						<span class="share-handler padd-h-15">
							<i class="bf-icon  fa fa-share-alt txt-yellow fnt-20"></i> 
						</span>
					</div>
					<div class="col-xs-12">
						<p class="txt-white">Excellent choice for busy corporate executives to walk in any time for the work out, for those who are unable to exercise during the morning and daytime and for those who prefer to end the day with an energising work out. </p>
						
						<p class="txt-white">Ideal for those wanting to stay active throughout the day with an early work out, for those who work late hours and are too tired to work out in the evening. for those who are early birds and for those who work flexi hours. </p>
						<p class="txt-white">All ISIC cardholdaers receive a <span class="txt-yellow">Rs.5,000 discount</span> for their caffeine quota for the day I So grab yours now I </p>
						<br>
					</div>
					<div class="col-xs-12">
						<span class="bder-L-shape ">
		<img src="<?php echo HTTP_PATH; ?>images/gym-image.jpg" alt="...." class="img-responsive img-cont ">
		</span>
		
					</div>
					<br>
					<div class="col-xs-12 padd-v-25">
					<p class="txt-white">Excellent choice for busy corporate executives to walk in any time for the work out, for those who are unable to exercise during the morning and daytime and for those who prefer to end the day with an energising work out. </p>
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