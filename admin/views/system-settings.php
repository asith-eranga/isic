<?php
define("_MEXEC","OK");
require_once("../../system/load.php");

$system_settings = new SystemSettings();

$system_settings->createTable();
$count = $system_settings->selectAllCount();
if($count == 0){
	$system_settings->insert();
}
  $data_system = $system_settings->selectAll();
  $system_settings->extractor($data_system);

?>

<script src="../system/user/js/systemsettings.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.ui.radio.checkbox').checkbox();
    $('.ui.checkbox').checkbox();
    $('.ui.dropdown').dropdown();
  
    $('.ui.form').form({
            address_line_1  : {
            identifier  : 'address_line_1',
            rules: [
                {
                    type   : 'empty',
                    prompt : 'Please select site logo'
                }
            ]
        }
        },
        {
            onSuccess:function(){ updatePost(); }
    });

    $("#site_logo").imagemanager({image_plugin_wrapper: "#image_preview_wrapper", image_select: "#selected_file"});
});
</script>
<div class="one wide column"></div>
<div class="thirteen wide column">

<div class="ui small form segment">
	<form id="data_form">

	  <div class="ui error message"></div>
	  <div id="form_submit_msg" class="ui green message"><i class="ok sign icon"></i></div>

     <div class="fields" id="image_preview_wrapper">
         <input type="hidden" id="site_logo" name="site_logo" value="<?php echo $system_settings->siteLogo(); ?>"/>
         <div class="six wide field">
             <label>Site Logo</label>
             <input placeholder="Select Image" name="selected_file" id="selected_file" type="text" readonly>
         </div>
         <div class="four wide field">
             <label>&nbsp;</label>
             <div class="small ui button teal select_image">Select Image</div>
             <div class="small ui icon button teal add_to_preview"><i class="add icon"></i></div>
         </div>
         <div class="sixteen wide field ui small images image_list">
         </div>
     </div>

     <h4 class="ui dividing header"> Contacts</h4>
        <div class="two fields">
            <div class="field">
                <label>Address Line 1</label>
            </div>
            <div class="field">
                <input placeholder="Address Line 1" id="address_line_1" name="address_line_1" type="text" value="<?php echo $system_settings->addressLine1(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Address Line 2</label>
            </div>
            <div class="field">
                <input placeholder="Address Line 2" id="address_line_2" name="address_line_2" type="text" value="<?php echo $system_settings->addressLine2(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Address Line 3</label>
            </div>
            <div class="field">
                <input placeholder="Address Line 3" id="address_line_3" name="address_line_3" type="text" value="<?php echo $system_settings->addressLine3(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Address Line 4</label>
            </div>
            <div class="field">
                <input placeholder="Address Line 4" id="address_line_4" name="address_line_4" type="text" value="<?php echo $system_settings->addressLine4(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Address Line 5</label>
            </div>
            <div class="field">
                <input placeholder="Address Line 5" id="address_line_5" name="address_line_5" type="text" value="<?php echo $system_settings->addressLine5(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Email</label>
            </div>
            <div class="field">
                <input placeholder="Email" id="email" name="email" type="text" value="<?php echo $system_settings->email(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Telephone / Fax</label>
            </div>
            <div class="field">
                <input placeholder="Fax" id="fax" name="fax" type="text" value="<?php echo $system_settings->fax(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Telephone 1</label>
            </div>
            <div class="field">
                <input placeholder="Telephone 1" id="telephone_1" name="telephone_1" type="text" value="<?php echo $system_settings->telephone1(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Telephone 2</label>
            </div>
            <div class="field">
                <input placeholder="Telephone 2" id="telephone_2" name="telephone_2" type="text" value="<?php echo $system_settings->telephone2(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Map Coordinates</label>
            </div>
            <div class="field">
                <input placeholder="Map Coordinates" id="map_coordinates" name="map_coordinates" type="text" value="<?php echo $system_settings->mapCoordinates(); ?>">
            </div>
        </div>
        <h4 class="ui dividing header"> Socials</h4>
        <div class="two fields">
            <div class="field">
                <label>Facebook</label>
            </div>
            <div class="field">
                <input placeholder="Facebook" id="facebook" name="facebook" type="text" value="<?php echo $system_settings->facebook(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Twitter</label>
            </div>
            <div class="field">
                <input placeholder="Twitter" id="twitter" name="twitter" type="text" value="<?php echo $system_settings->twitter(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Instagram</label>
            </div>
            <div class="field">
                <input placeholder="Instagram" id="instagram" name="instagram" type="text" value="<?php echo $system_settings->instagram(); ?>">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Pinterest</label>
            </div>
            <div class="field">
                <input placeholder="Pinterest" id="pinterest" name="pinterest" type="text" value="<?php echo $system_settings->pinterest(); ?>">
            </div>
        </div>

        <br><br>
     <div class="small ui submit button floated right green">Save</div>
	</form>
</div>
</div>
