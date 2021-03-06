<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 6:51 PM
 */

$discounts = new Mod_Discounts();

$discount_cards = $discounts->getAllCardTypes();
$discount_categories = $discounts->getAllCategories();
?>

<div class="col-md-3 col-xs-12 no-padd">
    <div class="dis-tbl full-height full-width">
        <form class="form-inline" action="<?php echo HTTP_PATH; ?>discount/index.php" method="post">
            <div class="padd-v-15 col-sm-10 center-block" style="float:none">
                <div class="input-group  input-container">
                    <div class="input-group-addon  padd-h-5 fnt-20 txt-green"><i class="fa fa-search" aria-hidden="true"></i></div>
                    <input id="keyword" name="keyword" class="material form-control" type="text" placeholder="SEARCH DISCOUNTS">
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
                        <a class="txt-white" href="<?php echo HTTP_PATH; ?>discount/card/<?php echo str_replace(' ', '-', strtolower($discount_card)); ?>">
                            <span><?php echo $discount_card; ?> </span><img src="<?php echo HTTP_PATH; ?>images/icons/cat-<?php echo $k+1; ?>.png">
                        </a>
                    </div>
                    <?php
                        $discount_cards_types = $discounts->selectAll();
                        for ($i = 0; $i < count($discount_cards_types); $i++) {
                            $discounts->extractor($discount_cards_types, $i);
                            if ( in_array($k, unserialize($discounts->cardType())) ) {
                    ?>
                        <div class="expand fnt-12 txt-white pos-abs padd-h-5" style="top: 8px; right: 20px; cursor: pointer;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                    <?php break; } } ?>
                </div>
                <div class="panel pos-rela">
                    <?php
                        for ($i = 0; $i < count($discount_cards_types); $i++) {
                            $discounts->extractor($discount_cards_types, $i);
                            if ( in_array($k, unserialize($discounts->cardType())) ) {
                    ?>
                    <!-- sub types - start -->
                    <div class="flt-button padd-v-5 pos-rela bg-lite-green">
                        <a class="txt-white" href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts->pageUrl(); ?>">
                          <?php echo $discounts->name(); ?>
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
                        <a class="txt-white text-upper" href="<?php echo HTTP_PATH; ?>discount/category/<?php echo str_replace(' ', '-', strtolower($discount_category)); ?>">
                            <?php echo $discount_category; ?>
                        </a>
                    </div>
                    <?php
                        $discount_category_types = $discounts->selectAll();
                        for ($i = 0; $i < count($discount_category_types); $i++) {
                            $discounts->extractor($discount_category_types, $i);
                            if ( in_array($k, unserialize($discounts->category())) ) {
                    ?>
                    <div class="expand fnt-12 txt-white pos-abs padd-h-5" style="top: 8px; right: 20px; cursor: pointer;">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                    <?php break; } } ?>
                </div>
                <div class="panel pos-rela">
                    <?php
                        for ($i = 0; $i < count($discount_category_types); $i++) {
                            $discounts->extractor($discount_category_types, $i);
                            if ( in_array($k, unserialize($discounts->category())) ) {
                        ?>
                            <!-- sub categories - start -->
                            <div class="flt-button padd-v-5 pos-rela bg-lite-green">
                                <a class="txt-white" href="<?php echo HTTP_PATH; ?>discount/<?php echo $discounts->pageUrl(); ?>">
                                  <?php echo $discounts->name(); ?>
                                </a>
                            </div>
                            <!-- sub categories - end -->
                    <?php } } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<div class="col-md-12 col-xs-12 bg-green padd-v-15 txt-white ">
</div>
