<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 5:27 PM
 */
?>
<div class="bg-black padd-v-25">
    <div class="dis-flex pos-rela over-hidden">
        <div class="col-md-9 col-xs-12 text-upper padd-h-25">
            <div class="card-messages" id="default-message">
                <h2 class="txt-green-light">Stay connected with us!</h2>
                <h3 class="txt-green-light"><span class="txt-yellow">The ISIC card,</span><br>the only internationally accepted student identity card <br>which can provide proof, various benefits and more!</h3>
            </div>
            <div class="card-messages" id="success-message" style="display: none;">
                <h2 class="txt-green-light">Thank you for requesting</h2>
                <h3 class="txt-green-light">
                    <span class="txt-yellow">Flight ticket request submitted successfully...</span><br/>
                    We are processing your request. We'll respond as soon as possible.
                </h3>
            </div>
            <div class="card-messages" id="error-message" style="display: none;">
                <h2 class="txt-green-light"><span class="txt-yellow">Please try again later...</span></h2>
                <h3 class="txt-green-light">
                    Oops! Something went wrong and we are unable to send your ticket request at this time.
                </h3>
            </div>
            <div class="bg-green off-canvas-container right skin-white">
                <div class="off-canvas-inner dis-tbl full-width">
                    <span class="canvas-close dis-tbl-cell tbl-con-algn-center">
                        <img src="<?php echo HTTP_PATH; ?>images/airplane.png" class="flipH marg-n-left-25">
                        <br>
                        <span class="dis-in-blk padd-10">C<br />l<br />o<br />s<br />e</span>
                    </span>
                    <div class="dis-tbl-cell full-width tbl-con-algn-center">

                        <form class="form-horizontal" id="get-a-quote" action="">
                            <div class="">
                                <div class="col-sm-5 no-padd">
                                    <h4 class="txt-white text-upper padd-h-5">where do you want to go</h4>
                                    <div class="col-sm-8 padd-h-5 ">
                                        <div class="input-group form-item">
                                            <input id="start-date-location" name="start-loc" class="form-control" type="text" placeholder="FROM (enter city or airport) " data-date-format="DD, MM d">
                                        </div>
                                        <div class="input-group form-item">
                                            <input id="end-date-location" name="end-loc" class="form-control" type="text" placeholder="To (exit city or airport)" data-date-format="DD, MM d">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 padd-h-5">
                                        <div class="col-md-12 no-padd form-inline">
                                            <div class="input-daterange " id="flight-datepicker">
                                                <div class="input-group form-item">
                                                    <input id="start-date" name="start" class="form-control text-upper" type="text" placeholder="Departure" data-date-format="DD, MM d">
                                                    <div class="input-group-addon bg-white"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                                </div>
                                                <div class="input-group form-item">
                                                    <input id="end-date" name="end" class="form-control text-upper" type="text" placeholder="return" data-date-format="DD, MM d">
                                                    <div class="input-group-addon bg-white"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 no-padd">
                                    <div class="col-sm-6 padd-h-5 form-inline">
                                        <div class="form-row">
                                            <div class="radio">
                                                <label>
                                                    <span>STUDENTS</span>
                                                    <input type="radio" name="user_type" id="user_type" value="students" checked>
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <span>Youth</span>
                                                    <input type="radio" name="user_type" id="user_type" value="youth">
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <span>Teacher</span>
                                                    <input type="radio" name="user_type" id="user_type" value="teacher">
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <span>Other</span>
                                                    <input type="radio" name="user_type" id="user_type" value="other">
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 padd-h-5 form-inline">
                                        <h4 class="txt-white text-upper padd-h-5">&nbsp;</h4>
                                        <div class="form-row">
                                            <div class="radio">
                                                <label>
                                                    <span>one way</span>
                                                    <input type="radio" name="ticket_type" id="ticket_type" value="one way" checked>
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <span>return</span>
                                                    <input type="radio" name="ticket_type" id="ticket_type" value="return">
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <span>multiple</span>
                                                    <input type="radio" name="ticket_type" id="ticket_type" value="multiple">
                                                    <span class="input-group-addon"><span class="custom-radio"></span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 no-padd">
                                    <div class="col-sm-12 no-padd">
                                        <div class="col-sm-4 padd-h-5">
                                            <div class="input-group">
                                                <input id="mobile" name="mobile" class="form-control text-upper" type="text" placeholder="mobile">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 padd-h-5">
                                            <div class="input-group">
                                                <input id="email" name="email" class="form-control text-upper" type="email" placeholder="e-mail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padd-h-5">
                                        <div class="input-group">
                                            <textarea id="message" cols="5" rows="3" name="message" class="form-control text-upper" placeholder="message"></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" id="submit_btn" value="get a quote" class="btn btn-primary pull-right button">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 pos-rela take-top1k" style="background:url(<?php echo HTTP_PATH . 'images/header-back.jpg'; ?>) right bottom / cover">
            <h3 class="txt-green-light text-upper"><span class="txt-yellow">click here to <br>enjoy your journey</h3>
            <img src="<?php echo HTTP_PATH; ?>images/airplane.png" class="off-canvas-menu-icon marg-n-left-25">
        </div>
    </div>
</div>
