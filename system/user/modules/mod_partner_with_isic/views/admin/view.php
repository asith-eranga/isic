<?php
$partner_with_isic = new Mod_PartnerWithIsic();

if (isset($_POST['search_text'])) {
      $data = $partner_with_isic->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $partner_with_isic->searchCount($_POST['search_text']);
} else {
      $data = $partner_with_isic->selectAllPaginated($_POST['page']);
      $count = count($partner_with_isic->selectAllCount());
}

$status = $partner_with_isic->getAllStatus();

$pagination = new Default_Pagination();
$pagination->setLimit(10);
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
										url: "../system/user/modules/mod_partner_with_isic/controller.php",
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
            <i class="child icon"></i>
            <div class="content">
                  View Partner With ISIC
                  <div class="sub header">Manage partner with isic</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <?php if (Sessions::checkUserPermission("mod_partner_with_isic", 2)) { ?>
            <a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add Partner With ISIC</a>
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
                        $partner_with_isic->extractor($data, $i);						
                        ?>
                        <tr id="row_<?php echo $partner_with_isic->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $partner_with_isic->name(); ?></td>
                              <td><?php echo $partner_with_isic->sortOrder(); ?></td>                             
                              <td><?php echo $status[$partner_with_isic->status()]; ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_partner_with_isic", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $partner_with_isic->id(); ?>)"><i class="teal edit icon"></i></div>
                         		<?php } if (Sessions::checkUserPermission("mod_partner_with_isic", 4)) { ?>
                               		<div class="mini ui button" onclick="confirmDelete(<?php echo $partner_with_isic->id(); ?>)"><i class="red remove icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>