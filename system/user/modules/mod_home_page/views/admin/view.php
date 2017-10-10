<?php
$home_page = new Mod_HomePage();

if (isset($_POST['search_text'])) {
      $data = $home_page->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $home_page->searchCount($_POST['search_text']);
} else {
      $data = $home_page->selectAllPaginated($_POST['page']);
      $count = $home_page->selectAllCount();
}

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
										url: "../system/user/modules/mod_home_page/controller.php",
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
            <i class="certificate icon"></i>
            <div class="content">
                  Home Page Content
                  <div class="sub header">Manage home page content</div>
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
                        $home_page->extractor($data, $i);						
                        ?>
                        <tr id="row_<?php echo $home_page->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $home_page->title(); ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_home_page", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $home_page->id(); ?>)"><i class="teal edit icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>