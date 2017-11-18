<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 2:37 PM
 */

require_once(DOC_ROOT . 'system/user/modules/mod_cards/helper.php');
require_once(DOC_ROOT . 'system/user/modules/mod_discounts/helper.php');
require_once(DOC_ROOT . 'system/user/modules/mod_partner_with_isic/helper.php');
require_once(DOC_ROOT . 'system/user/modules/mod_travel_with_us/helper.php');
require_once(DOC_ROOT . 'system/user/modules/mod_take_a_vacation/helper.php');

$current_path = $_SERVER['REQUEST_URI'];
$current_path = rtrim($current_path, '/');
$current_path = end(explode('/',$current_path));
$current_page_class = 'current-menu-item current_page_item';
?>
	<div class="rh-cover noscroll gr-5">
        <span class="rh-close"></span>
	</div>
    <div class="rh-cover gr-5">
        <span class="rh-close"></span>
        <div class="rh-panel rh-pm">

            <div class="rh-p-b">
                <div class="rh-c-m clearfix">
                    <ul id="resp-navigation" class="menu clearfix resp-menu bsm-initialized">
						<li class="menu-item menu-item-object-page better-anim-fade <?php if ($current_path == 'isic') { echo $current_page_class; } ?>"><a href="<?php  echo HTTP_PATH; ?>">Home</a></li>
                        <li class="menu-item menu-item-object-page <?php if ($current_path == 'about') { echo $current_page_class; } ?>"><a href="<?php echo HTTP_PATH; ?>about">About</a></li>
						<li class="menu-item menu-item-type-taxonomy menu-item-object-category better-anim-slide-bottom-in menu-item-has-children menu-item-has-mega menu-item-mega-tabbed-grid-posts  bsm-leave">
                            <a href="#">Cards</a>
                            <ul class="sub-menu">
                                <?php
                                    $cards = new Mod_Cards();
                                    $data = $cards->selectAll();
                                    for ($i = 0; $i < count($data); $i++) {
                                        $cards->extractor($data, $i);
                                        $card_page_url = strtolower(str_replace(' ', '-', $cards->name()));
                                ?>
                                    <li class="menu-item better-anim-fade <?php if ($current_path == $card_page_url) { echo 'menu-item-object-page current-menu-item current_page_item'; } ?>">
                                        <a href="<?php echo HTTP_PATH; ?>cards/<?php echo $card_page_url; ?>">
                                            <?php echo $cards->name(); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
						 <li class="menu-item menu-item-object-page <?php if ($current_path == 'discount') { echo $current_page_class; } ?>"><a href="<?php echo HTTP_PATH; ?>discount">discounts</a></li>
                       <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children <?php if ($current_path == 'partner-with-isic') { echo $current_page_class; } ?>">
                            <a href="<?php echo HTTP_PATH; ?>partner-with-isic"> Partner with isic </a>
                            <ul class="sub-menu">
                                <?php
                                $partner_with_isic = new Mod_PartnerWithIsic();
                                $partner_with_isic_data = $partner_with_isic->selectAll();
                                for ($i = 0; $i < count($partner_with_isic_data); $i++) {
                                    $partner_with_isic->extractor($partner_with_isic_data, $i);
                                    $partner_with_isic_page_url = strtolower(str_replace(' ', '-', $partner_with_isic->name()));
                                    ?>
                                    <li class="menu-item better-anim-fade"><a href="<?php echo HTTP_PATH; ?>partner-with-isic#<?php echo $partner_with_isic_page_url; ?>"><?php echo $partner_with_isic->name(); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children <?php if ($current_path == 'travel-with-us') { echo $current_page_class; } ?>">
                            <a href="<?php echo HTTP_PATH; ?>travel-with-us">Travel With us</a>
                            <ul class="sub-menu">
                                <?php
                                $travel_with_us = new Mod_TravelWithUs();
                                $travel_with_us_data = $travel_with_us->selectAll();
                                for ($i = 0; $i < count($travel_with_us_data); $i++) {
                                    $travel_with_us->extractor($travel_with_us_data, $i);
                                    $travel_with_us_page_url = strtolower(str_replace(' ', '-', $travel_with_us->name()));
                                    ?>
                                    <li class="menu-item better-anim-fade"><a href="<?php echo HTTP_PATH; ?>travel-with-us#<?php echo $travel_with_us_page_url; ?>"><?php echo $travel_with_us->name(); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children <?php if ($current_path == 'take-a-vacation') { echo $current_page_class; } ?>">
                            <a href="<?php echo HTTP_PATH; ?>take-a-vacation">Take a va-cay</a>
                            <ul class="sub-menu">
                                <?php
                                $take_a_vacation = new Mod_TakeAVacation();
                                $take_a_vacation_data = $take_a_vacation->selectAll();
                                for ($i = 0; $i < count($take_a_vacation_data); $i++) {
                                    $take_a_vacation->extractor($take_a_vacation_data, $i);
                                    $take_a_vacation_page_url = strtolower(str_replace(' ', '-', $take_a_vacation->name()));
                                    ?>
                                    <li class="menu-item better-anim-fade"><a href="<?php echo HTTP_PATH; ?>take-a-vacation#<?php echo $take_a_vacation_page_url; ?>"><?php echo $take_a_vacation->name(); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category  better-anim-fade <?php if ($current_path == 'contact') { echo $current_page_class; } ?>"><a href="<?php echo HTTP_PATH; ?>contact"> contact </a></li>
                    </ul>
                   
                </div>

            </div>
        </div>

    </div>
