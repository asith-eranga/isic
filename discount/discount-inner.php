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
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.css' type='text/css' media='all' />
 <style>
	 .owl-theme .owl-dots .owl-dot span {
    background: #9e9c79;
	}
	.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
    background: #fff333;
}
	 </style>
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
                            <img src="<?php echo $discounts_inner->logo(); ?>" class="img-responsive pull-left">
                            <h3 class="dis-in-blk text-upper padd-h-15 txt-black">
                                <?php echo $discounts_inner->name(); ?>
                            </h3>
                        </div>
                        <div class="col-xs-12">
                            <h3 class="btn btn-primary txt-black pull-left">Rs <?php echo $discounts_inner->discount(); ?> Discount</h3>
                            <h4 class="txt-yellow text-upper dis-in-blk padd-15">offer valid for</h4>
                            <img src="<?php echo HTTP_PATH; ?>images/icons/cat-<?php echo $discounts_inner->cardType()+1; ?>.png">
                            <div class="fb-share-button" data-href="https://www.facebook.com/ISICsrilanka/" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FISICsrilanka%2F&amp;src=sdkpreparse">Share</a></div>
                        </div>
                        <div class="col-xs-12">
                            <?php echo str_replace(['<pre>', '</pre>'], '', $discounts_inner->description()); ?>
                        </div>

                        <?php if (!empty($discounts_inner->mapCoordinates())) { ?>
                            <div class="col-xs-12">
                                <span class="bder-L-shape right">
                                    <div id="map_container"></div>
                                    <div id="map"></div>
                                </span>
                            </div>
                        <?php } ?>

                        <?php
                            $discounts_inner_related = new Mod_Discounts();
                            $discounts_related_data = $discounts_inner_related->getRelatedDiscounts($discounts_inner->cardType(), $discounts_inner->category());
                            if (count($discounts_related_data) > 1) {
                        ?>
                        <br><br>
					    <div class="col-xs-12 padd-v-25">
                            <h3 class="dis-in-blk text-upper padd-h-15 txt-black">Related Discounts</h3>
                            <div id="RelatedProducts" class="owl-carousel owl-theme">
                            <?php
                                for ($i = 0; $i < count($discounts_related_data); $i++) {
                                    $discounts_inner_related->extractor($discounts_related_data, $i);
                                    if ($discounts_inner_related->id() != $id) {
                            ?>
                                <div class="item">
                                    <div class="padd-10">
                                        <article class="type-post format-standard has-post-thumbnail  listing-item-1 listing-item listing-mg-item listing-mg-type-2 listing-mg-1-item ">
                                            <div class="item-content">
                                                <a title="..." href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts_inner_related->id(); ?>" class="img-cont b-loaded" style="background-image: url(<?php echo $discounts_inner_related->image(); ?>);"></a>
                                            </div>
                                        </article>
                                        <h5 class="txt-white"><?php echo $discounts_inner_related->name(); ?></h5>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
					    </div>
                        <?php } ?>
                    </div>
                </div>
                <?php include(DOC_ROOT . 'partials/search-discount-inner.php'); ?>
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
            var myLatlng = new google.maps.LatLng(<?php echo $discounts_inner->mapCoordinates(); ?>);
            var imagePath = '../images/Pin-location.png'
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

        jQuery('.filter-button-group').on( 'click', '.expand', function() {
            if(jQuery(this).hasClass('active'))
            {
                jQuery(this).removeClass('active');
                jQuery(this).html("<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>");
                jQuery(this).parent().next().stop().slideUp(300);
            } else {
                jQuery(this).addClass('active');
                jQuery(this).html("<i class=\"fa fa-minus\" aria-hidden=\"true\"></i>");
                jQuery(this).parent().next().stop().slideDown(300);
            }
        });

        jQuery('#RelatedProducts').owlCarousel({
            loop:false,
            margin:5,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:3
                }
            }
        })

    });
</script>
</html>