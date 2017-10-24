<?php
$discounts = new Mod_Discounts();

if (isset($_POST['search_text'])) {
      $data = $discounts->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $discounts->searchCount($_POST['search_text']);
} else {
      $data = $discounts->selectAllPaginated($_POST['page']);
      $count = $discounts->selectAllCount();
}

$status = $discounts->getAllStatus();

$pagination = new Default_Pagination();
$pagination->setLimit(30);
$pagination->setPage($_POST['page']);
$pagination->setJSCallback("view");
$pagination->setTotalPages($count);
$pagination->makePagination();

?>
<?php if ($_POST['page'] == 1) { ?>
      <script>
            function fixWidthHelper(e, ui) {
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
										url: "../system/user/modules/mod_discounts/controller.php",
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
            <i class="dollar icon"></i>
            <div class="content">
                  View Discounts
                  <div class="sub header">Manage discounts</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <?php if (Sessions::checkUserPermission("mod_discounts", 2)) { ?>
            <a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add Discount</a>
      <?php } ?>

      <table id="ajax_module_sub" class="ui small table segment">
            <thead>
                  <tr>
                        <th width="2px"></th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th></th>
                  </tr>
            </thead>
            <tbody id="sortTable">
                  <?php
                  for ($i = 0; $i < count($data); $i++) {
                        $discounts->extractor($data, $i);						
                        ?>
                        <tr id="row_<?php echo $discounts->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $discounts->name(); ?></td>
                              <td><?php echo $discounts->sortOrder(); ?></td>                             
                              <td><?php echo $status[$discounts->status()]; ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_discounts", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $discounts->id(); ?>)"><i class="teal edit icon"></i></div>
                         		<?php } if (Sessions::checkUserPermission("mod_discounts", 4)) { ?>
                               		<div class="mini ui button" onclick="confirmDelete(<?php echo $discounts->id(); ?>)"><i class="red remove icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>