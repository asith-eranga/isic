<?php
Default_ModManager::loadHelper('user_permission');

$permission = new Mod_UserPermission();
$permission_data = $permission->selectAll();

$users = new Mod_Users();
$users->setId($_POST['id']);
$user_details = $users->getById();
$users->extractor($user_details);
?>
<script type="text/javascript">
      $(document).ready(function () {

            $('.ui.form').form({
                  firstname: {
                        identifier: 'firstname',
                        rules: [
                              {
                                    type: 'empty',
                                    prompt: 'Please enter your first name'
                              }
                        ]
                  },
                  user_permission: {
                        identifier: 'user_permission',
                        rules: [
                              {
                                    type: 'empty',
                                    prompt: 'Please select user permission'
                              }
                        ]
                  },
                  username: {
                        identifier: 'username',
                        rules: [
                              {
                                    type: 'empty',
                                    prompt: 'Please enter your username'
                              }
                        ]
                  },
                  email: {
                        identifier: 'email',
                        rules: [
                              {
                                    type: 'email',
                                    prompt: 'Please enter your email'
                              }
                        ]
                  },

            },
                    {
                          onSuccess: function () {
                                updatePost();
                          }
                    }

            );

      });

      $('.ui.checkbox').checkbox();
</script>

<div class="thirteen wide column">

      <h2 class="ui header">
            <i class="users icon"></i>
            <div class="content">
                  Edit User
                  <div class="sub header">Edit user account</div>
            </div>
      </h2>

      <div class="ui small form segment">

            <form id="data_form">

                  <input type="hidden" id="id" name="id" value="<?php echo $users->id(); ?>" />

                  <div class="two fields">
                        <div class="field">
                              <label>First Name</label>
                              <input placeholder="First Name" id="firstname" name="firstname" type="text" value="<?php echo $users->firstName(); ?>">
                        </div>
                        <div class="field">
                              <label>Last Name</label>
                              <input placeholder="Last Name" id="lastname" name="lastname" type="text" value="<?php echo $users->lastName(); ?>">
                        </div>
                  </div>
                  <div class="field">
                        <label>User Permission</label>
                        <div class="ui selection dropdown">
                              <input type="hidden" name="user_permission" id="user_permission" value="<?php echo $users->userPermission(); ?>">
                              <div class="default text"><?php echo $users->userPermission(); ?></div>
                              <i class="dropdown icon"></i>
                              <div class="menu ui transition hidden">
                                    <?php
                                    for ($i = 0; $i < count($permission_data); $i++) {
                                          $permission->extractor($permission_data, $i);
                                          ?>
                                          <div class="item" data-value="<?php echo $permission->id(); ?>"><?php echo $permission->permissionName(); ?></div>
                                    <?php }
                                    ?>
                              </div>
                        </div>
                  </div>

                  <div class="field">
                        <label>Email</label>
                        <input placeholder="Email" id="email" name="email" type="text" value="<?php echo $users->email(); ?>">
                  </div>
                  <div class="field">
                        <label>Username</label>
                        <input placeholder="Username" id="username" name="username" type="text" value="<?php echo $users->username(); ?>">
                  </div>
                  <div class="field">
                        <label>Password ( leave blank to keep the existing password )</label>
                        <input type="password" id="password" name="password" value="">
                  </div>

                <div class="ui error message"></div>
                <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i>New user has been added Successfully.</div>

                  <div class="small ui submit button floated right green">Save</div>

      </div>

</form>

</div>