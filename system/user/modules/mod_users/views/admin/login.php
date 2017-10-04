<?php
$views = new Default_Views();

$views->setModule('users');
$views->loadFile('mod_users.js', true);

?>

<script type="text/javascript">
      $(document).ready(function () {

            $('.ui.form').form({
                  username: {
                        identifier: 'username',
                        rules: [
                              {
                                    type: 'empty',
                                    prompt: 'Please enter your username'
                              }
                        ]
                  },
                  password: {
                        identifier: 'password',
                        rules: [
                              {
                                    type: 'empty',
                                    prompt: 'Please enter your password'
                              }
                        ]
                  }

            },
            {
                  onSuccess: function () {
                        doLogin();
                  }
            }

            );

      });
</script>
<div class="ui sixteen wide column stackable center aligned page grid">
      <div class="five wide column">

            <div class="ui segment">
                  <img src="../images/isic2_logo.png" alt="cms_logo" />
                  <div class="ui bottom right attached label">Administrator</div>
            </div>

            <div class="ui form segment">

                  <form id="login_form">

                        <div class="ui small error message"></div>
                        <div id="form_submit_msg" class="ui small green message"><i class="ok sign icon"></i></div>

                        <div class="field">
                              <div class="ui icon input">
                                    <input type="text" placeholder="Username" id="username" name="username">
                                    <i class="user icon"></i>
                              </div>
                        </div>
                        <div class="field">
                              <div class="ui icon input">
                                    <input type="password" placeholder="Password" id="password" name="password">
                                    <i class="lock icon"></i>
                              </div>
                        </div>
                        <div class="ui blue submit small button right floated">Login</div>

                  </form>

            </div>

      </div>
</div>