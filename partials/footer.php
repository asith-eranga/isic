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
                    <li>About</li>
                    <li>Cards</li>
                    <li>Discounts</li>
                    <li>Star Travel</li>
                    <li>events</li>
                    <li>community</li>
                    <li>contact us</li>
                    <li>GET YOUR CARD</li>
                </ul>
            </div>
            <div class="col-sm-4 col-xs-12 bg-white padd-v-15 ">
                <span>HOTLINES</span>
                <br>
                <span>+94 115 47 47 47</span>
                <br>
                <span>+94 115 22 00 85</span>
                <br>
                <br>
                <span>ISIC / STA Travel</span>
                <br>
                <span>3rd Floor, No. 54 Walukarama Road.</span>
                <br>
                <span>Colombo 3.</span>
                <br>
                <span>Sri Lanka</span>

            </div>
            <div class="col-sm-4 col-xs-12 bg-white padd-v-15 ">
                <span>GENERAL MAIL</span>
                <br>
                <span>jude@unitedventuressl.com </span>
                <br>
                <br>
                <span>GENERAL FAX</span>
                <br>
                <span>+94 115 22 00 66</span>
                <br>
                <br>

                <img src="" alt="...." data-src="<?php echo HTTP_PATH; ?>images/google-play-icon.png" class="img-responsive img-cont pull-left">
                <img src="" alt="...." data-src="<?php echo HTTP_PATH; ?>images/apple-app-store.png" class="img-responsive img-cont pull-left">

            </div>
        </div>
        <div class="col-md-3 col-xs-12 bg-white no-padd-h">
            <div class="dis-tbl full-height full-width">
                <div class="dis-tbl-row full-height full-width tbl-con-algn-center">
                    <div class="dis-tbl full-height full-width">
                        <div class="dis-tbl-cell full-height full-width tbl-con-algn-center">
                            <img id="logo" src="<?php echo HTTP_PATH; ?>images/isic2_logo.png" alt="isic logo" class="img-responsive padd-v-15 center-block" />

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
                            <i class="fa fa-facebook fnt-20 padd-h-5" aria-hidden="true"></i>
                            <i class="fa fa-twitter fnt-20 padd-h-5" aria-hidden="true"></i>
                            <i class="fa fa-instagram fnt-20 padd-h-5" aria-hidden="true"></i>
                            <i class="fa fa-pinterest-p fnt-20 padd-h-5" aria-hidden="true"></i>
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
</script>
