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
                    <span>HOTLINES</span>
                    <br>
                    <span><?php echo $system_settings->telephone1(); ?></span>
                    <br>
                    <?php if (!empty($system_settings->telephone2())){ ?>
                        <span><?php echo $system_settings->telephone2(); ?></span>
                        <br>
                    <?php } ?>
                    <br>
                <?php } ?>
                <?php if (!empty($system_settings->addressLine1())){ ?>
                    <span><?php echo $system_settings->addressLine1(); ?></span>
                    <br>
                    <?php if (!empty($system_settings->addressLine2()) && !empty($system_settings->addressLine3())){ ?>
                        <span><?php echo $system_settings->addressLine2(); ?>, <?php echo $system_settings->addressLine3(); ?>,</span>
                        <br>
                    <?php } ?>
                    <?php if (!empty($system_settings->addressLine4())){ ?>
                        <span><?php echo $system_settings->addressLine4(); ?>,</span>
                        <br>
                    <?php } ?>
                    <?php if (!empty($system_settings->addressLine5())){ ?>
                        <span><?php echo $system_settings->addressLine5(); ?>.</span>
                    <?php } ?>
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
                <?php if (!empty($system_settings->fax())){ ?>
                    <span>GENERAL FAX</span>
                    <br>
                    <span><?php echo $system_settings->fax(); ?></span>
                    <br>
                    <br>
                <?php } ?>
                <img src="" alt="...." data-src="<?php echo HTTP_PATH; ?>images/google-play-icon.png" class="img-responsive img-cont pull-left">
                <img src="" alt="...." data-src="<?php echo HTTP_PATH; ?>images/apple-app-store.png" class="img-responsive img-cont pull-left">

            </div>
        </div>
        <div class="col-md-3 col-xs-12 bg-white no-padd-h">
            <div class="dis-tbl full-height full-width">
                <div class="dis-tbl-row full-height full-width tbl-con-algn-center">
                    <div class="dis-tbl full-height full-width">
                        <div class="dis-tbl-cell full-height full-width tbl-con-algn-center">
                            <img id="logo" src="<?php echo $system_settings->siteLogo(); ?>" alt="isic logo" class="img-responsive padd-v-15 center-block" />

                        </div>
                    </div>
                </div>
                <div class="dis-tbl-row full-height full-width tbl-con-algn-center">
                    <div class="bg-black padd-15">
                        <span class="txt-white">Newsletter</span>
                        <form class="newsletter">
                            <div class="padd-v-15">
                                <div class="input-group pos-rela">
                                    <input type="text" class="form-control" id="newsletterform" placeholder="Email">
                                    <div class="input-group-addon pos-abs top_0 right_0 padd-10 "><i class="fa fa-paper-plane txt-white" aria-hidden="true"></i></div>
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
    <span>© 2017 ISIC. All rights reserved </span>
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

    jQuery(function(){
        var location = ["Katunayake", "Maththala", "Delhi", "Malaysia", "USA", "Africa", "Russia"];
        jQuery("#start-date-location, #end-date-location").autocomplete({
            source: location
        });
    });
</script>
