<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 2:37 PM
 */

require_once(DOC_ROOT . 'system/user/modules/mod_cards/helper.php');
require_once(DOC_ROOT . 'system/user/modules/mod_discounts/helper.php');

$current_path = $_SERVER['REQUEST_URI'];
$current_path = rtrim($current_path, '/');
$current_path = end(explode('/',$current_path));
$current_page_class = 'current-menu-item current_page_item';
?>

<div id="menu-main" class="menu main-menu-wrapper show-search-item show-off-canvas menu-actions-btn-width-2" role="navigation">
    <div class="main-menu-inner">
        <div class="content-wrap">
            <div class="">
                <nav class="main-menu-container">
                    <ul id="main-navigation" class="main-menu menu bsm-pure clearfix">
                        <li class="menu-item menu-item-object-page better-anim-fade <?php if ($current_path == 'isic') { echo $current_page_class; } ?>"><a href="<?php  echo HTTP_PATH; ?>">Home</a></li>
                        <li class="menu-item menu-item-object-page <?php if ($current_path == 'about') { echo $current_page_class; } ?>"><a href="<?php echo HTTP_PATH; ?>about">About</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
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
                        <li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children <?php if ($current_path == 'discount') { echo $current_page_class; } ?>">
                            <a href="<?php echo HTTP_PATH; ?>discount">Discounts</a>
                            <ul class="sub-menu">
                                <?php
                                    $discounts = new Mod_Discounts();
                                    $discount_categories = $discounts->getAllCategories();
                                    foreach ($discount_categories as $k => $v) {
                                        $discount_page_url = strtolower(str_replace(' ', '-', $v));
                                ?>
                                    <li class="menu-item better-anim-fade <?php if ($current_path == $discount_page_url) { echo 'menu-item-object-page current-menu-item current_page_item'; } ?>"><a href="<?php echo $discount_page_url; ?>"><?php echo $v; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category  better-anim-fade "><a href="#"> Partner with isic </a></li>
                        <li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children <?php if ($current_path == 'travel-with-us') { echo $current_page_class; } ?>">
                            <a href="<?php echo HTTP_PATH; ?>travel-with-us">Travel With us</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-object-page better-anim-fade "><a href="#">Flights</a></li>
                                <li class="menu-item better-anim-fade "><a href="#">Hotels</a></li>
                                <li class="menu-item  better-anim-fade "><a href="#">Visas</a></li>
                                <li class="menu-item  better-anim-fade "><a href="#">Rail</a></li>
                                <li class="menu-item  better-anim-fade "><a href="#">Transfers</a></li>
                                <li class="menu-item  better-anim-fade "><a href="#">Insurance</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category  better-anim-fade "><a href="#">Take a va-cay</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category  better-anim-fade <?php if ($current_path == 'contact') { echo $current_page_class; } ?>"><a href="<?php echo HTTP_PATH; ?>contact"> contact </a></li>
                    </ul>
                    <div class="menu-action-buttons bg-green col-md-3">
                        <div class="off-canvas-menu-icon-container off-icon-right">
                            <a href="#"><h5 class="txt-yellow" >GET YOUR CARD</h5></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>