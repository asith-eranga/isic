<?php
$card_page = new Mod_CardPage();

if (isset($_POST['search_text'])) {
      $data = $card_page->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $card_page->searchCount($_POST['search_text']);
} else {
      $data = $card_page->selectAllPaginated($_POST['page']);
      $count = $card_page->selectAllCount();
}

$pagination = new Default_Pagination();
$pagination->setLimit(10);
$pagination->setPage($_POST['page']);
$pagination->setJSCallback("view");
$pagination->setTotalPages($count);
$pagination->makePagination();

?>
<?php if ($_POST['page'] == 1) { ?>
<script>
    function fixWidthHelper(ui) {
        ui.children().each(function () {
            $(this).width($(this).width());
        });
        return ui;
    }

    $(document).ready(
        function () {
	        $("#sortTable").attr("style", "cursor:move");
		    $("#sortTable").sortable({
			    helper: fixWidthHelper,
			    update: function () {
				    serial = $('#sortTable').sortable('serialize');
				    serial += '&action=sortTable';
				    serial += '&thisid=' + $(this);

				    $.ajax({
				        url: "../system/user/modules/mod_card_page/controller.php",
					    type: "post",
					    data: serial,
					    error: function () {
					        alert("there's an error with AJAX");
					    }
				    });
			    }
		    }).disableSelection();
	    }
    );
</script>
<?php } ?>
<div class="thirteen wide column">
    <h2 class="ui header">
        <i class="address book outline icon"></i>
        <div class="content">
            Card Page Content
            <div class="sub header">Manage about page content</div>
        </div>
    </h2>

    <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>
    <div class="ui divider"></div>

    <table id="ajax_module_sub" class="ui small table segment">
        <thead>
            <tr>
                <th width="2px"></th>
                <th>Content</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="sortTable">
        <?php
            for ($i = 0; $i < count($data); $i++) {
                $card_page->extractor($data, $i);
        ?>
            <tr id="row_<?php echo $card_page->id(); ?>">
                <td><i class="sort icon"></i></td>
                <td><?php echo $card_page->title(); ?></td>
                <td>
                    <div class="ui icon buttons">
				    <?php if (Sessions::checkUserPermission("mod_card_page", 3)) { ?>
                        <div class="mini ui button" onclick="edit(<?php echo $card_page->id(); ?>)"><i class="teal edit icon"></i></div>
                    <?php } ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php $pagination->drawPagination(); ?>
</div>
