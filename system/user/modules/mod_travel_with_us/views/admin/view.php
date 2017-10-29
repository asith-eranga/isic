<?php
$travel_with_us = new Mod_TravelWithUs();

if (isset($_POST['search_text'])) {
      $data = $travel_with_us->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $travel_with_us->searchCount($_POST['search_text']);
} else {
      $data = $travel_with_us->selectAllPaginated($_POST['page']);
      $count = $travel_with_us->selectAllCount();
}

$status = $travel_with_us->getAllStatus();

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
										url: "../system/user/modules/mod_travel_with_us/controller.php",
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
            <i class="map signs icon"></i>
            <div class="content">
                  View Travel With Us
                  <div class="sub header">Manage travel with us</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <?php if (Sessions::checkUserPermission("mod_travel_with_us", 2)) { ?>
            <a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add Travel With Us</a>
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
                        $travel_with_us->extractor($data, $i);
                        ?>
                        <tr id="row_<?php echo $travel_with_us->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $travel_with_us->name(); ?></td>
                              <td><?php echo $travel_with_us->sortOrder(); ?></td>
                              <td><?php echo $status[$travel_with_us->status()]; ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_travel_with_us", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $travel_with_us->id(); ?>)"><i class="teal edit icon"></i></div>
                         		<?php } if (Sessions::checkUserPermission("mod_travel_with_us", 4)) { ?>
                               		<div class="mini ui button" onclick="confirmDelete(<?php echo $travel_with_us->id(); ?>)"><i class="red remove icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>