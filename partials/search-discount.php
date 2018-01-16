<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 6:51 PM
 */

$discounts_card_search = new Mod_Discounts();

$discount_cards = $discounts_card_search->getAllCardTypes();
$discount_categories = $discounts_card_search->getAllCategories();
?>

<div class="col-md-3 col-xs-12 no-padd">
    <div class="dis-tbl full-height full-width">
        <form class="form-inline" action="<?php echo HTTP_PATH; ?>discount" method="post">
            <div class="padd-v-15 col-sm-10 center-block" style="float:none">
                <div class="input-group input-container">
                    <div class="input-group-addon  padd-h-5 fnt-20 txt-green"><i class="fa fa-search" aria-hidden="true"></i></div>
                    <input id="keyword" name="keyword" class="material form-control text-upper" type="text" placeholder="SEARCH DISCOUNTS">
                    <!--<div class="input-group-addon  padd-h-5 fnt-20 txt-green" style="border: 1px solid #026868;">
                        <a href="<?php echo HTTP_PATH; ?>discount/" ><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>-->
                </div>
            </div>

        </form>
        <div class="col-sm-10 col-xs-12 center-block" style="float:none">
            <h3 class="txt-green text-upper">Cards</h3>
        </div>
        <div class="bg-green">
            <div class="border-bottom filter-button-group">
                <div class="flt-button padd-v-5 pos-rela" data-filter=".grid-item">
                    <a class="txt-white text-upper" href="<?php echo HTTP_PATH; ?>discount">all </a>
                </div>
                <?php
                    foreach ($discount_cards as $k => $discount_card) {
                ?>
                <div class="pos-rela">
                    <div class="flt-button padd-v-5 pos-rela" data-filter=".card-<?php echo $k; ?>">
                        <a class="txt-white" href="javascript:void(0);">
                            <?php echo $discount_card; ?> <img src="<?php echo HTTP_PATH; ?>images/icons/cat-<?php echo $k+1; ?>.png">
                        </a>
                    </div>
                    <?php
                        $discounts_card_search_data = $discounts_card_search->selectAll();
                        for ($i = 0; $i < count($discounts_card_search_data); $i++) {
                            $discounts_card_search->extractor($discounts_card_search_data, $i);
                            if ( in_array($k, unserialize($discounts_card_search->cardType())) ) {
                    ?>
                        <div class="expand fnt-12 txt-white pos-abs padd-h-5" style=" top: 8px; right: 20px; cursor: pointer;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                    <?php break; } } ?>
                </div>
                <div class="panel pos-rela">
                    <?php
                    for ($i = 0; $i < count($discounts_card_search_data); $i++) {
                        $discounts_card_search->extractor($discounts_card_search_data, $i);
                        if ( in_array($k, unserialize($discounts_card_search->cardType())) ) {
                    ?>
                        <!-- sub types - start -->
                        <div class="flt-button padd-v-5 pos-rela bg-lite-green">
                            <a class="txt-white" href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts_card_search->id(); ?>">
                              <?php echo $discounts_card_search->name(); ?>
                            </a>
                        </div>
                        <!-- sub types - end -->
                    <?php } } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <br>
        <div class="col-sm-10 col-xs-12 center-block" style="float:none">
            <h3 class="txt-green text-upper">Categories</h3>
        </div>
        <div class="bg-green" >
            <div class="border-bottom filter-button-group">
                <div class="flt-button padd-v-5 pos-rela" data-filter=".grid-item">
                    <a class="txt-white text-upper" href="<?php echo HTTP_PATH; ?>discount">all </a>
                </div>
                <?php
                    foreach ($discount_categories as $k => $discount_category) {
                ?>
                <div class="pos-rela">
                    <div class="flt-button padd-v-5 pos-rela" data-filter=".category-<?php echo $k; ?>">
                        <a class="txt-white text-upper" href="javascript:void(0);">
                            <?php echo $discount_category; ?>
                        </a>
                    </div>
                    <?php
                        $discount_category_types = $discounts_card_search->selectAll();
                        for ($i = 0; $i < count($discount_category_types); $i++) {
                            $discounts_card_search->extractor($discount_category_types, $i);
                                if ( in_array($k, unserialize($discounts_card_search->category())) ) {
                    ?>
                        <div class="expand fnt-12 txt-white pos-abs padd-h-5" style=" top: 8px; right: 20px; cursor: pointer;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                    <?php break; } } ?>
                </div>
                <div class="panel pos-rela">
                    <?php
                    for ($i = 0; $i < count($discount_category_types); $i++) {
                        $discounts_card_search->extractor($discount_category_types, $i);
                        if ( in_array($k, unserialize($discounts_card_search->category())) ) {
                    ?>
                        <!-- sub categories - start -->
                            <div class="flt-button padd-v-5 pos-rela bg-lite-green">
                                <a class="txt-white" href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts_card_search->id(); ?>">
                                  <?php echo $discounts_card_search->name(); ?>
                                </a>
                            </div>
                        <!-- sub categories - end -->
                    <?php } } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="dis-tbl-ftr-grp">
            <ul class="text-center bg-green no-marg text-white">
                <li class="dis-in-blk"><a href="#" class="txt-white">PRE</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">1</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">2</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">3</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">4</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">5</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">....</a></li>
                <li class="dis-in-blk"><a href="#" class="txt-white">LAST</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-12 col-xs-12 bg-green padd-v-15 txt-white ">
</div>
