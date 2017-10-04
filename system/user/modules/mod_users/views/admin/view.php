<?php
$users = new Mod_Users();

if (isset($_POST['search_text'])) {
      $data = $users->searchPaginated($_POST['search_text'], $_POST['page']);
      $count = $users->searchCount($_POST['search_text']);
} else {
      $data = $users->selectAllPaginated($_POST['page']);
      $count = $users->selectAllCount();
}

$pagination = new Default_Pagination();
$pagination->setLimit(10);
$pagination->setPage($_POST['page']);
$pagination->setJSCallback("view");
$pagination->setTotalPages($count);
$pagination->makePagination();
?>

<div class="thirteen wide column">

      <h2 class="ui header">
            <i class="users icon"></i>
            <div class="content">
                  View Users
                  <div class="sub header">Manage your users</div>
            </div>
      </h2>

      <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

      <div class="ui divider"></div>

      <?php if (Sessions::checkUserPermission("mod_users", 2)) { ?>
            <a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add User</a>
      <?php } ?>

      <table id="ajax_module_sub" class="ui small table segment">
            <thead>
                  <tr><th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th><?php //echo Sessions::getPropertiesId();  ?></th>
                  </tr></thead>
            <tbody>
                  <?php
                  for ($i = 0; $i < count($data); $i++) {
                        $users->extractor($data, $i);
                        ?>
                        <tr id="row_<?php echo $users->id(); ?>">
                              <td><?php echo $users->firstname() . " " . $users->lastname(); ?></td>
                              <td><?php echo $users->username(); ?></td>
                              <td><?php echo $users->email(); ?></td>
                              <td><?php echo date("Y-M-d : H:i:s", $users->lastLogin()); ?></td>
                              <td>
                                    <div class="ui icon buttons">
                                          <?php if (Sessions::checkUserPermission("mod_users", 3)) { ?>
                                                <div class="mini ui button" onclick="edit(<?php echo $users->id(); ?>)">
                                                      <i class="teal edit icon"></i>
                                                </div>
                                          <?php } if (Sessions::checkUserPermission("mod_users", 4)) { ?>
                                                <div class="mini ui button" onclick="confirmDelete(<?php echo $users->id(); ?>)">
                                                      <i class="red remove icon"></i>
                                                </div>
                                          <?php } ?>
                                    </div>
                              </td>
                        </tr>
                  <?php } ?>
            </tbody>
      </table>

      <?php $pagination->drawPagination(); ?>

</div>