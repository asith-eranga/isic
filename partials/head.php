<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 3:11 PM
 */
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script  async  src="https://www.googletagmanager.com/gtag/js?id=UA-112601179-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-112601179-1');
</script>

<link rel="shortcut icon" type="image/png" href="<?php echo HTTP_PATH; ?>/images/icons/cat-1.png"/>

<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/boostrap-libs.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/style.css' type='text/css' media='all' />

<script src='<?php echo HTTP_PATH; ?>js/blazy.js'></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src='<?php echo HTTP_PATH; ?>js/jquery-migrate.min.js'></script>
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js'></script>
<script src='<?php echo HTTP_PATH; ?>js/element-query.min.js'></script>
<script src='<?php echo HTTP_PATH; ?>js/theme-libs.js'></script>
<script src='<?php echo HTTP_PATH; ?>js/get-a-quote.js'></script>
<script src='<?php echo HTTP_PATH; ?>js/newsletter.js'></script>

<script src='<?php echo HTTP_PATH; ?>js/theme.js'></script>
<!--[if lt IE 9]>
<script src='<?php echo HTTP_PATH; ?>js/html5shiv.min.js?ver=3.3.0'></script>
<![endif]-->
<!--[if lt IE 9]>
<script src='<?php echo HTTP_PATH; ?>js/respond.min.js?ver=3.3.0'></script>
<![endif]-->
<link rel='stylesheet' href='<?php echo HTTP_PATH; ?>css/common.css' type='text/css' media='all' />

<?php
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link = rtrim(strtolower($actual_link), '/');
?>

<link rel="canonical" href="<?php echo $actual_link; ?>" />

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '178624349407928');  fbq('track', 'PageView'); fbq('track', 'ViewContent');
</script>
<noscript>
    <img height="1" width="1"  src="https://www.facebook.com/tr?id=178624349407928&ev=PageView &noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
