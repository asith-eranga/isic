<?php
define("_MEXEC", "OK");
require_once("../system/load.php");
?>
<!DOCTYPE html>
<html>
      <head>

            <title>ISIC | Administrator</title>

            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" type="text/css" href="../admin/ui/packaged/semantic.css">
            <link rel="stylesheet" type="text/css" href="../admin/ui/packaged/colorpicker.css">
            <link rel="stylesheet" type="text/css" href="../admin/ui/packaged/components/tab.css">
            <link rel="stylesheet" type="text/css" href="../admin/ui/style.css">
            <link rel="stylesheet" type="text/css" href="../admin/ui/packaged/jquery.fancybox.css">

<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>-->
            <script src="../system/application/libs/js/jquery-3.2.1.min.js"></script>
            <script src="../admin/ui/packaged/semantic.js"></script>
            <script src="../admin/ui/packaged/tablesort.js"></script>
            <script src="../admin/ui/packaged/components/tab.js"></script>
            <script src="../admin/ui/packaged/colorpicker.js"></script>
            <script src="../admin/ui/packaged/chart.js"></script>
            <script src="../admin/ui/packaged/jquery.fancybox.pack.js"></script>

            <script src="../system/application/includes/main.js"></script>
            <script src="../system/user/js/bbq_history.js"></script>

            <link rel="stylesheet" type="text/css" href="../system/application/libs/js/jquery-ui/jquery-ui.min.css">
            <link rel="stylesheet" type="text/css" href="../system/application/libs/js/jquery-ui/jquery-ui.theme.min.css">
            <script src="../system/application/libs/js/jquery-ui/jquery-ui.min.js"></script>

<!--<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>-->
            <script src="../system/application/libs/js/json2.min.js"></script>

            <script src="../admin/ui/admin-ui.js"></script>
            <script src="../system/user/js/variablemanager.js"></script>

            <script>

                  function doLoginProperty() {
                        var url_data = '';
                        url_data = '&password=' + $('#password_property').val();
                        url_data += '&properties_id=' + $('#changeProperties_id_value').val();

                        sendData("doLoginProperty", url_data, "../system/user/modules/mod_users/controller.php", function (res) {

                              var obj = jQuery.parseJSON(res);
                              if (obj.code == 200) {
                                    showFormMessage('#form_submit_msg_property', 'success', {message: obj.msg});
                                    clearFormFields("#data_form_property");
                                    changePropertiesFunction();

                              } else {
                                    showFormMessage('#form_submit_msg_property', 'error', {message: obj.msg});
                              }
                        });
                  }

            </script>

      </head>

      <body>

            <?php if (Sessions::isAdminLogged()) { ?>

                  <div class="ui blue menu">
                        <a class="active item main-menu home-btn" onclick="adminLoadNav('home')">
                              <i class="dashboard inverted icon"></i>
                        </a>

                        <!--<div class="ui dropdown item">
                              <i class="disk outline icon"></i> Modules <i class="dropdown icon"></i>
                              <div class="menu">
                                    <?php foreach (Default_ModManager::listAllModules() as $mod_name) { ?>
                                          <a onclick="loadModule('<?php echo $mod_name; ?>')" class="item"><?php echo Default_ModManager::niceName($mod_name); ?></a>
                                    <?php } ?>
                              </div>
                        </div>-->

                        <div class="ui dropdown item main-menu">
                            Content <i class="dropdown icon"></i>
                            <div class="menu">
                                <a onclick="loadModule('mod_home_page')" class="item main-menu">
                                    <i class="building outline icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_home'); ?>
                                </a>
                                <a onclick="loadModule('mod_about_page')" class="item main-menu">
                                    <i class="newspaper outline icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_about'); ?>
                                </a>
                                <a onclick="loadModule('mod_card_page')" class="item main-menu">
                                    <i class="address book outline icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_card'); ?>
                                </a>
                                <a onclick="loadModule('mod_contact')" class="item main-menu">
                                    <i class="mail outline icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_contact'); ?>
                                </a>
                                <a onclick="loadModule('mod_partner_with_isic')" class="item main-menu">
                                    <i class="child icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_partner_with_ISIC'); ?>
                                </a>
                                <a onclick="loadModule('mod_travel_with_us')" class="item main-menu">
                                    <i class="map signs icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_travel_with_us'); ?>
                                </a>
                                <a onclick="loadModule('mod_take_a_vacation')" class="item main-menu">
                                    <i class="travel icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_take_a_vacation'); ?>
                                </a>
                                <a onclick="loadModule('mod_fly_now_pay_later')" class="item main-menu">
                                    <i class="plane icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_fly_now_pay_later'); ?>
                                </a>
                            </div>
                        </div>

                        <a class="item" onclick="loadModule('mod_cards')" >
                            <i class="browser icon"></i> <?php echo Default_ModManager::niceName('mod_cards'); ?>
                        </a>

                        <a class="item" onclick="loadModule('mod_discounts')" >
                            <i class="dollar icon"></i> <?php echo Default_ModManager::niceName('mod_discounts'); ?>
                        </a>

                        <div class="ui dropdown item main-menu">
                            Misc. <i class="dropdown icon"></i>
                            <div class="menu">
                                <a onclick="loadModule('mod_testimonials')" class="item main-menu">
                                    <i class="comments outline icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_testimonials'); ?>
                                </a>
                                <a onclick="loadModule('mod_events')" class="item main-menu">
                                    <i class="ticket icon"></i>
                                    <?php echo Default_ModManager::niceName('mod_events'); ?>
                                </a>
                            </div>
                        </div>

                        <a class="item" onclick="loadModule('mod_seo')" >
                            <i class="line chart icon"></i> <?php echo Default_ModManager::niceName('mod_seo'); ?>
                        </a>

                        <a class="item" onclick="adminLoadNav('settings');">
                              <i class="laptop icon"></i> System
                        </a>
                        
                        <div class="ui dropdown item main-menu">
                              Users <i class="dropdown icon"></i>
                              <div class="menu">
                                    <a onclick="loadModule('mod_users')" class="item main-menu"><i class="users icon"></i>Manage Users</a>
                                    <a onclick="loadModule('mod_user_permission')" class="item main-menu"><i class="lock icon"></i><?php echo Default_ModManager::niceName('mod_user_permission'); ?></a>
                              </div>
                        </div>

                        <div class="right blue menu">

                              <?php
                              Default_ModManager::loadHelper('users');
                              $users = new Mod_Users();
                              $users->setId(Sessions::getAdminId());
                              $user_data = $users->getById();
                              $users->extractor($user_data);
                              ?> 
                              
                              <div class="item">Hello, <?php echo $users->getFullName(); ?></div>
                              <div class="item">
                                    <div class="ui icon input table_search">
                                          <input type="text" id="search_text" name="search_text" onkeyup="typewatch(function () {
                                                                  view(1);
                                                            })" placeholder="Search...">
                                          <i class="search link icon"></i>
                                    </div>
                              </div>

                              <div class="ui dropdown logout item">
                                    <i class="setting inverted icon"></i> <i class="dropdown inverted icon"></i>
                                    <div class="menu">
                                          <a class="item" onclick="adminLoadNav('my-account')"><i class="user icon"></i>My Account</a>
                                          <a class="item" onclick="adminLogout()"><i class="power icon"></i>Logout</a>
                                    </div>
                              </div>

                        </div>
                  </div>

            <?php } ?>


            <div class="ui stackable padded grid">

                  <div class="row">
                        <div class="sixteen wide column">
                              <?php if (Sessions::isAdminLogged()) { ?>
                                    <div id="ajax_breadcrumb" class="ui small breadcrumb">
                                          <div class="active section">Dashboard</div>
                                          <i class="right arrow icon divider"></i>
                                    </div>
                              <?php } ?>
                        </div>
                  </div>


                  <div id="ajax_module_view" class="row">
                        <div class="sixteen wide column">

                        </div>
                  </div>

            </div>


            <div class="ui small modal wrap_filemanager" style="width:765px">
                  <iframe  width="765" height="550" frameborder="0" src=""></iframe>
            </div>

      </body>

</html>