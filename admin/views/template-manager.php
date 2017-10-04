<?php
define("_MEXEC","OK");
require_once("../../system/load.php");
//session_destroy();
$variable_manager = new VariableManager();
$variable_manager->setName('general_template');
$template_row 	  = $variable_manager->getByName();
$variable_session = Sessions::getVariableSessions();
//print_r($variable_session);
?>
<script src="../system/user/js/variablemanager.js"></script>
<script>
<?php 
if(count($template_row)==0 && !isset($variable_session['general_template']) && empty($variable_session['general_template'])){
?>
setTemplate('default');
<?php } ?>
</script>
<div class="one wide column"></div>
<div class="fourteen wide column">
    <div class="ui message"><div class="header">Select Your Theme</div></div>
    
    <?php
    $file_path = DOC_ROOT."templates/";
	$file_list = array_diff(scandir($file_path), array('..', '.'));
	$file_list = array_values($file_list);
	
	?>
    <div class="twelve wide column">
        <div class="ui three column grid">
        <?php 
		foreach($file_list as $file){
			
			$xml_config = file_get_contents($file_path.$file."/config.xml");
			
			$config_arr = simplexml_load_string($xml_config);
		?>
            <div class="column template" id="template_<?php echo $file; ?>">
              <div class="ui segment">
              	<div class="template-image">
                <?php 
				if(file_exists(DOC_ROOT.'templates/'.$file.'/images/'.$file.'_thumb.png')){ ?>
                
                <img src="<?php echo HTTP_PATH; ?>system/application/libs/php/timthumb.php?src=<?php echo HTTP_PATH; ?>templates/<?php echo $file; ?>/images/<?php echo $file; ?>_thumb.png&w=1000&h=700" class="ui fluid image">
                
                <?php }else{ ?>
                
                <img src="<?php echo HTTP_PATH; ?>system/application/libs/php/timthumb.php?src=<?php echo HTTP_PATH; ?>uploads/no-image.jpg&w=1000&h=700" class="ui fluid image">
                
                <?php } ?>
                
                <div class="image-hover">
                	<div class="more-details-btn">
                    	<div class="ui black button" onClick="$('#more_details_<?php echo $file; ?>').modal('show');">More Details</div>
                    </div>
                </div>
                </div>
                <?php 
				$variable_manager->extractor($template_row);
				
				if($file==$variable_manager->value()){	
				?>
                 <div class="template-footer" style="background:#333333;">
                    <div class="template-title" style="color:#fff">Active : <?php echo $config_arr->title; ?></div>
                 </div>
                 <?php
				  }else{ ?>
                <div class="template-footer" id="footer_<?php echo $file; ?>">
                    <div class="template-title"><h4><?php echo $config_arr->title; ?></h4></div>
                    <div class="small ui blue button floated right template-button" id="button_<?php echo $file; ?>" onClick="setTemplate('<?php echo $file; ?>')">Activate</div>
                </div>
                <?php } ?>
              </div>

            </div>
            <div class="ui modal more_details" id="more_details_<?php echo $file; ?>">
              <div class="header">
                <?php echo $config_arr->title; ?>
              </div>
              <div class="content">
                <div class="left" style="width:60%">
                  <img src="<?php echo HTTP_PATH; ?>templates/<?php echo $file; ?>/images/<?php echo $file; ?>_thumb.png" width="500" height="400" class="">
                </div>
                <div class="right">
                  <?php echo $config_arr->description; ?>
                </div>
              </div>
              <!--<div class="actions">
                <div class="ui small button">
                  Cancel
                </div>
                <div class="ui small positive button">
                  Okay
                </div>
              </div>-->
            </div>
        <?php } ?>
          
        </div>
        <div id="form_submit_msg"></div>
    </div>
</div>