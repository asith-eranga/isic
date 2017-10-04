<?php
define('_MEXEC','OK');
require_once("../../../system/load.php");

 $action = $_POST['action'];
 
 switch($action){
 	case "view":
 		view();
 		break;
 	case "create":
 		create();
 		break;
 	case "updateValue":
 		updateValue();
 		break;
 	case "doDelete":
 		doDelete();
 		break;
	case "setTemplate":
 		setTemplate();
 		break;
 }

function view(){

	$variable_manager = new VariableManager();

	if(isset($_POST['search_text'])){
		$data = $variable_manager->searchAll($_POST['search_text']);
	}else{
		$data = $variable_manager->selectAll();
	}

	viewHTML($data);

}

function create(){

	$variable_manager = new VariableManager();
	$variable_manager->setValues($_POST);

	$variable_manager->setOwner("user");

	if( $variable_manager->insert() ){
		
			$variable_manager->createVariableSession();
			
			Default_Common::jsonSuccess( "Variable Created Succesfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}

}

function updateValue(){

	$variable_manager = new VariableManager();

	$variable_manager->setId($_POST['id']);
	$variable_manager->setValue($_POST['new_value']);

	if( $variable_manager->update() ){

			$variable_manager->createVariableSession();
		
			Default_Common::jsonSuccess( "Variable Updated Succesfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}

}

function doDelete(){

	$variable_manager = new VariableManager();

	$variable_manager->setId($_POST['id']);

	if( $variable_manager->delete() ){

			$variable_manager->createVariableSession();

			Default_Common::jsonSuccess( "Variable Updated Succesfully." );
	}else{
			Default_Common::jsonError( "Error" );
	}


}

function setTemplate(){
	
	$variable_manager = new VariableManager();
	$variable_manager->setName('general_template');
	$template_row = $variable_manager->getByName();
	if(count($template_row)>0){
		$variable_manager->extractor($template_row);
		$variable_manager->setId($variable_manager->id());
		$variable_manager->setValue($_POST['template']);
	
		if( $variable_manager->update() ){
	
				$variable_manager->createVariableSession();
			
				Default_Common::jsonSuccess( "Template Saved Succesfully." );
		}else{
				Default_Common::jsonError( "Error" );
		}
	}else{
		$template = $variable_manager->getVariableValue("general_template", array("value" => $_POST['template'], "mod_name" => "system"));
		Default_Common::jsonSuccess( "Template Saved Succesfully." );
	}
}

function viewHTML($data){

?>

<table class="ui table">
  <thead>
    <tr>
      <th>Variable</th>
      <th>Owner</th>
      <th>Value</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php

$variable_manager = new VariableManager();

for($i=0;$i<count($data); $i++){
  $variable_manager->extractor($data,$i);
?>
    <tr>
      <td><?php echo $variable_manager->name(); ?></td>
      <td><?php echo $variable_manager->owner(); ?></td>
      <td><div class="ui mini input"><input id="value_<?php echo $variable_manager->id(); ?>" type="text" value="<?php echo $variable_manager->value(); ?>" /></div></td>
      <td>
        <div class="ui buttons">
          <div class="ui mini blue button" onclick="updateValue(<?php echo $variable_manager->id(); ?>)">Update</div>
          <div class="ui mini red button" onclick="confirmDelete(<?php echo $variable_manager->id(); ?>)">Delete</div>
        </div>
      </td>
    </tr>

<?php } ?>

  </tbody>
</table>


<?php

}

?>

