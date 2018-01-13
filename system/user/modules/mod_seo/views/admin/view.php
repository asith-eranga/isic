<?php
$seo = new Mod_SEO();

if (isset($_POST['search_text'])) {
      $data = $seo->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $seo->searchCount($_POST['search_text']);
} else {
      $data = $seo->selectAllPaginated($_POST['page']);
      $count = $seo->selectAllCount();
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
										url: "../system/user/modules/mod_seo/controller.php",
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
            <i class="line chart icon"></i>
            <div class="content">
                  SEO
                  <div class="sub header">Manage SEO tags</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <table id="ajax_module_sub" class="ui small table segment">
            <thead>
                  <tr>
                        <th width="2px"></th>
                        <th>Page name</th>
                        <th></th>
                  </tr>
            </thead>
            <tbody id="sortTable">
                  <?php
                  for ($i = 0; $i < count($data); $i++) {
                        $seo->extractor($data, $i);						
                        ?>
                        <tr id="row_<?php echo $seo->id(); ?>">
                              <td><i class="sort icon"></i></td>
                              <td><?php echo $seo->pageName(); ?></td>
                              <td>
                              	<div class="ui icon buttons">
								<?php if (Sessions::checkUserPermission("mod_seo", 3)) { ?>
                             		<div class="mini ui button" onclick="edit(<?php echo $seo->id(); ?>)"><i class="teal edit icon"></i></div>
                            	<?php } ?>
                         		</div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>