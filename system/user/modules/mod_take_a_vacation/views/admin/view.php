<?php
$take_a_vacation = new Mod_TakeAVacation();

if (isset($_POST['search_text'])) {
      $data = $take_a_vacation->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $take_a_vacation->searchCount($_POST['search_text']);
} else {
      $data = $take_a_vacation->selectAllPaginated($_POST['page']);
      $count = count($take_a_vacation->selectAllCount());
}

$status = $take_a_vacation->getAllStatus();

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
										url: "../system/user/modules/mod_take_a_vacation/controller.php",
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
            <i class="travel icon"></i>
            <div class="content">
                  View Take A Vacation
                  <div class="sub header">Manage take a vacation</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <?php if (Sessions::checkUserPermission("mod_take_a_vacation", 2)) { ?>
            <a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add Take A Vacation</a>
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
                        $take_a_vacation->extractor($data, $i);
                        ?>
                        <tr id="row_<?php echo $take_a_vacation->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $take_a_vacation->name(); ?></td>
                              <td><?php echo $take_a_vacation->sortOrder(); ?></td>
                              <td><?php echo $status[$take_a_vacation->status()]; ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_take_a_vacation", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $take_a_vacation->id(); ?>)"><i class="teal edit icon"></i></div>
                         		<?php } if (Sessions::checkUserPermission("mod_take_a_vacation", 4)) { ?>
                               		<div class="mini ui button" onclick="confirmDelete(<?php echo $take_a_vacation->id(); ?>)"><i class="red remove icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>