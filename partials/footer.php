<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 5:49 PM
 */
?>

<div class="col-md-12 col-xs-12 bg-white txt-black ">
    <div class="row dis-flex">
        <div class="col-md-9 col-sm-12 col-xs-12 padd-h-5 padd-v-40">
            <div class="col-sm-4 col-xs-12 bg-white padd-v-15 ">
                <ul>
                    <li><a href="<?php echo HTTP_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>about">About</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>discount">Discounts</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>partner-with-isic">Partner With ISIC</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>travel-with-us">Travel With Us</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>take-a-vacation">Take a Vacation</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>contact">Contacts</a></li>
                    <li><a href="<?php echo HTTP_PATH; ?>get-your-card">Get Your Card</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-xs-12 bg-white padd-v-15 ">
                <?php if (!empty($system_settings->telephone1())){ ?>
                    <span>HOTLINES</span><br>
                    <span><?php echo $system_settings->telephone1(); ?></span>
                    <br><br>
                <?php } ?>
                <?php if (!empty($system_settings->addressLine1())){ ?>
                    <span>ADDRESS</span>
                    <br>
                    <span>
                        <?php if (!empty($system_settings->addressLine1())){ ?>
                            <?php echo $system_settings->addressLine1(); ?>
                        <?php } ?>
                        <?php if (!empty($system_settings->addressLine2())){ ?>
                            , <?php echo $system_settings->addressLine2(); ?>
                        <?php } ?>
                        <?php if (!empty($system_settings->addressLine3())){ ?>
                            , <?php echo $system_settings->addressLine3(); ?>
                        <?php } ?>
                        <?php if (!empty($system_settings->addressLine4())){ ?>
                            , <?php echo $system_settings->addressLine4(); ?>
                        <?php } ?>
                        <?php if (!empty($system_settings->addressLine5())){ ?>
                            , <?php echo $system_settings->addressLine5(); ?>
                        <?php } ?>
                    </span>
                <?php } ?>
            </div>
            <div class="col-sm-4 col-xs-12 bg-white padd-v-15 ">
                <?php if (!empty($system_settings->email())){ ?>
                    <span>GENERAL MAIL</span>
                    <br>
                    <span><?php echo $system_settings->email(); ?></span>
                    <br>
                    <br>
                <?php } ?>
                <?php if (!empty($system_settings->telephone2())){ ?>
                    <span>TELEPHONE</span>
                    <br>
                    <span><?php echo $system_settings->telephone2(); ?></span>
                    <br>
                    <br>
                <?php } ?>
                <a href="https://play.google.com/store/apps/details?id=nl.jool.isic&hl=en" target="_blank">
                    <img src="" alt="isic-google-play-icon" data-src="<?php echo HTTP_PATH; ?>images/google-play-icon.png" class="img-responsive img-cont pull-left">
                </a>
                <a href="https://itunes.apple.com/nl/app/isic/id886109982?mt=8" target="_blank">
                    <img src="" alt="isic-apple-app-store-icon" data-src="<?php echo HTTP_PATH; ?>images/apple-app-store.png" class="img-responsive img-cont pull-left">
                </a>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 bg-white no-padd-h">
            <div class="dis-tbl full-height full-width">
                <div class="dis-tbl-row full-height full-width tbl-con-algn-center">
                    <div class="dis-tbl full-height full-width">
                        <div class="dis-tbl-cell full-height full-width tbl-con-algn-center">
                            <img id="logo" src="<?php echo $system_settings->siteLogo(); ?>" alt="<?php echo $path_info_main_logo['filename']; ?>" class="img-responsive padd-v-15 center-block" />
                        </div>
                    </div>
                </div>
                <div class="dis-tbl-row full-height full-width tbl-con-algn-center">
                    <div class="bg-black padd-15">
                        <span class="txt-white">Join Our Mailing List</span>
                        <form class="newsletter" action="" id="newsletter">
                            <div class="padd-v-15">
                                <div class="input-group pos-rela">
                                    <input type="email" name="newsletter_email" id="newsletter_email" class="form-control" id="newsletterform" placeholder="Email" required>
                                    <div class="input-group-addon pos-abs top_0 right_0" id="newsletter-button-div" style="padding: 1px;">
                                        <button type="submit" class="newsletter-button">
                                            <i class="fa fa-paper-plane txt-white" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div id="wait" style="display: none; position: absolute; top: 0; left: 80%;">
                                        <img src='https://www.w3schools.com/jquery/demo_wait.gif' width="64" height="64" />
                                    </div>
                                    <center>
                                        <span class="txt-white padd-v-5 bg-green" id="newsletter_success" style="display: none">
                                            Thank you for subscribe
                                        </span>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <span class="txt-white text-upper">Follow Us
                            <?php if (!empty($system_settings->facebook())){ ?>
                                <a href="<?php echo $system_settings->facebook(); ?>" class="topbar-sign-in social-icons icon-circle">
                                    <i class="fa fa-facebook fnt-20 padd-h-5" aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                            <?php if (!empty($system_settings->instagram())){ ?>
                                <a href="<?php echo $system_settings->instagram(); ?>" class="topbar-sign-in social-icons icon-circle">
                                    <i class="fa fa-instagram fnt-20 padd-h-5" aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                            <?php if (!empty($system_settings->twitter())){ ?>
                                <a href="<?php echo $system_settings->twitter(); ?>" class="topbar-sign-in social-icons icon-circle">
                                    <i class="fa fa-twitter fnt-20 padd-h-5" aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                            <?php if (!empty($system_settings->pinterest())){ ?>
                                <a href="<?php echo $system_settings->pinterest(); ?>" class="topbar-sign-in social-icons icon-circle">
                                    <i class="fa fa-pinterest-p fnt-20 padd-h-5" aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<div class="col-md-12 col-xs-12 bg-black txt-white padd-v-10 text-center text-upper no-padd-h">
    <span>© 2017. <a href="https://www.unitedventuressl.com/" target="_blank">United Ventures Pvt Ltd</a>. All Rights Reserved.</span>
</div>

<span class="back-top"><i class="fa fa-arrow-up"></i></span>

<script>
    var dateSelect     = jQuery('#flight-datepicker');
    var dateDepart     = jQuery('#start-date');
    var dateReturn     = jQuery('#end-date');
    var spanDepart     = jQuery('.date-depart');
    var spanReturn     = jQuery('.date-return');
    var spanDateFormat = 'ddd, MMMM D yyyy';

    dateSelect.datepicker({
        autoclose: true,
        format: "mm/dd/yy",
        maxViewMode: 0,
        startDate: "now"
    }).on('change', function() {
        var start = $.format.date(dateDepart.datepicker('getDate'), spanDateFormat);
        var end = $.format.date(dateReturn.datepicker('getDate'), spanDateFormat);
        spanDepart.text(start);
        spanReturn.text(end);
    });

    $(function() {
        //autocomplete
        $("#start-date-location, #end-date-location").autocomplete({
            source: "https://www.unitedventuressl.com/isiclk/system/user/modules/mod_cards/controller.php",
            minLength: 3
        });
    });
</script>

<!-- Google Code for Remarketing Tag
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup -->
<script>
    /* <![CDATA[ */
    var google_conversion_id = 821105373;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script src="//www.googleadservices.com/pagead/conversion.js"> </script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/821105373/?guid=ON&amp;script=0"/>
    </div>
</noscript>

<!-- Google Code for Website Quote submissions Conversion Page In your html page, add the snippet and call goog_report_conversion when someone clicks on the chosen link or button. -->
<script>
    /* <![CDATA[ */
    goog_snippet_vars = function() {
        var w = window;
        w.google_conversion_id = 821105373;
        w.google_conversion_label = "IdNrCIPrsnsQ3aXEhwM";
        w.google_remarketing_only = false;
    }
    // DO NOT CHANGE THE CODE BELOW.
    goog_report_conversion = function(url) {
        goog_snippet_vars();
        window.google_conversion_format = "3";
        var opt = new Object();
        opt.onload_callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        }
        var conv_handler = window['google_trackConversion'];
        if (typeof(conv_handler) == 'function') {
            conv_handler(opt);
        }
    } /* ]]> */
</script>
<script src="//www.googleadservices.com/pagead/conversion_async.js"> </script>
