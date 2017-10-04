<?php

$permission = new Mod_UserPermission();

if(isset($_POST['search_text'])){
  $data = $permission->searchPaginated($_POST['search_text'],$_POST['page']);
  $count = $permission->searchCount($_POST['search_text']);
}else{
  $data = $permission->selectAllPaginated($_POST['page']);
  $count = $permission->selectAllCount();
}
$permission_array = $permission->permission();

$pagination = new Default_Pagination();
$pagination->setLimit(10);
$pagination->setPage($_POST['page']);
$pagination->setJSCallback("view");
$pagination->setTotalPages($count);
$pagination->makePagination();  

?>


<div class="thirteen wide column">

<h2 class="ui header">
  <i class="lock icon"></i>
  <div class="content">
    View User Permission
    <div class="sub header">Manage User Permission</div>
  </div>
</h2>

<div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

<div class="ui divider"></div>

<?php //if(Sessions::checkUserPermission("mod_user_permission",2)){ ?>
<a class="ui small black labeled icon button" onclick="add()"><i class="add icon"></i>Add User Permission</a>
<?php //} ?>

<table id="ajax_module_sub" class="ui small table segment">
  <thead>
    <tr><th>Permission Name</th>
    <th></th>
  </tr></thead>
  <tbody>
<?php for($i=0;$i<count($data); $i++){ $permission->extractor($data,$i); ?>
    <tr id="row_<?php echo $permission->id(); ?>">
      <td><?php echo $permission->permissionName(); ?></td>
      <td>
          <div class="ui icon buttons">
          	<?php if(Sessions::checkUserPermission("mod_user_permission",3)){ ?>
            <div class="mini ui button" onclick="edit(<?php echo $permission->id(); ?>)"><i class="teal edit icon"></i></div>
            <?php } if(Sessions::checkUserPermission("mod_user_permission",4)){ ?>
            <div class="mini ui button" onclick="confirmDelete(<?php echo $permission->id(); ?>)"><i class="red remove icon"></i></div>
            <?php } ?>
          </div>
      </td>
    </tr>
<?php } ?>
  </tbody>
</table>

<?php $pagination->drawPagination(); ?>

</div>