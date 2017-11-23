<?php
$events = new Mod_Events();

if (isset($_POST['search_text'])) {
      $data = $events->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $events->searchCount($_POST['search_text']);
} else {
      $data = $events->selectAllPaginated($_POST['page']);
      $count = $events->selectAllCount();
}

$status = $events->getAllStatus();

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
										url: "../system/user/modules/mod_events/controller.php",
										type: "post",
										data: serial,
										error: function () {
											  alert("theres an error with AJAX");
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
            <i class="ticket icon"></i>
            <div class="content">
                  View Events
                  <div class="sub header">Manage events</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <?php if (Sessions::checkUserPermission("mod_events", 2)) { ?>
            <a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add Testimonial</a>
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
                        $events->extractor($data, $i);						
                        ?>
                        <tr id="row_<?php echo $events->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $events->name(); ?></td>
                              <td><?php echo $events->sortOrder(); ?></td>                             
                              <td><?php echo $status[$events->status()]; ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_events", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $events->id(); ?>)"><i class="teal edit icon"></i></div>
                         		<?php } if (Sessions::checkUserPermission("mod_events", 4)) { ?>
                               		<div class="mini ui button" onclick="confirmDelete(<?php echo $events->id(); ?>)"><i class="red remove icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>