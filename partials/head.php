<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 3:11 PM
 */
?>
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/boostrap-libs.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' type='text/css' media='all' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.css' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/style.css' type='text/css' media='all' />

<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/blazy.js'></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js'></script>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/element-query.min.js'></script>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/theme-libs.js'></script>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/get-a-quote.js'></script>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/newsletter.js'></script>

<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/theme.js'></script>
<!--[if lt IE 9]>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/html5shiv.min.js?ver=3.3.0'></script>
<![endif]-->
<!--[if lt IE 9]>
<script type='text/javascript' src='<?php echo HTTP_PATH; ?>js/respond.min.js?ver=3.3.0'></script>
<![endif]-->
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/common.css' type='text/css' media='all' />

<!-- Google Code for Remarketing Tag --> <!-------------------------------------------------- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup ---------------------------------------------------> <script type="text/javascript"> /* <![CDATA[ */ var google_conversion_id = 821105373; var google_custom_params = window.google_tag_params; var google_remarketing_only = true; /* ]]> */ </script> <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"> </script> <noscript> <div style="display:inline;"> <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/821105373/?guid=ON&amp;script=0"/> </div> </noscript>

<?php
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link = rtrim(strtolower($actual_link), '/');
?>
<link rel="canonical" href="<?php echo $actual_link; ?>" />