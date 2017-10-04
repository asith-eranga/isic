<?php
define("_MEXEC","OK");
require_once("../../system/load.php");

Default_ModManager::loadHelper('user_permission');
Default_ModManager::loadHelper('users');

$sessions = new Sessions();

$users = new Mod_Users();
$users->setId($sessions->getAdminId());
$user_details = $users->getById();
$users->extractor($user_details);

?>
<script src="../system/user/modules/mod_users/mod_users.js"></script>
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
            /*password: {
             identifier  : 'password',
             rules: [
             {
             type   : 'empty',
             prompt : 'Please enter your password'
             }
             ]
             }*/

        },
                {
                    onSuccess: function () {
                        updatePost();
                    }
                }

        );

        $('.ui.dropdown').dropdown();

    });
</script>
<div class="one wide column"></div>

<div class="fourteen wide column">

  <div class="ui message">
    <div class="header"><i class="user big icon"></i>
      Manage Your Account
    </div>
  </div>
  
  <div class="twelve wide column">

    <div class="ui small form segment">

        <form id="data_form">

            <div class="ui error message"></div>
            <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i>New user has been added succesfully.</div>

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

                <select class="ui dropdown" id="user_permission" name="user_permission" >
                    <?php
                    $permission = new Mod_UserPermission();
                    $permission_data = $permission->selectAll();

                    for ($i = 0; $i < count($permission_data); $i++) {
                        $permission->extractor($permission_data, $i);
                        ?>
                        <option value="<?php echo $permission->id(); ?>" <?php
                        if ($users->userPermission() == $permission->id()) {
                            echo 'selected=""';
                        }
                        ?>>
                                    <?php echo $permission->permissionName(); ?>
                        </option>
                        <?php
                    }
                    ?>               
                </select>

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
                <label>Password ( leave blank to keep the exsisting password )</label>
                <input type="password" id="password" name="password" value="">
            </div>
            
            <div class="small ui submit button floated right green">Save</div>

		</form>
    	</div>

	</div>

</div>