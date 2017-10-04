<?php
define('_MEXEC','OK');
require_once("../../../system/load.php");

 $action = $_POST['action'];
 
 switch($action){
 	case "view":
	 	view();
	 	break;
	 case "delete":
	 	delete();
	 	break;
 }
 
 
  function view(){

  	$file_names = $_POST['file_names'];
  	$folder_path = $_POST['folder_path'];
  	$update_to = $_POST['update_to'];

  	$file_names_array = explode(",",$file_names);


  	echo '<ul class="ax-image-edit" id="'.str_replace("#","ax-edit_",$update_to).'">';

  	foreach($file_names_array as $k=>$v){

  		if($v!=""){

	  		$unique_id = base64_encode($v);
        //$unique_id = $v.":".$folder_path;

	  		echo '<li id="'.str_replace("=","", $unique_id).'"><img src="'.HTTP_PATH.'uploads/'.$folder_path.$v.'" width="128" /> <br /> <a href="javascript:;" onclick="removeImage(\''.$unique_id.'\',\''.$folder_path.'\',\''.$update_to.'\')">Remove</a> </li>';

  		}

  	}

  	echo '</ul>';

  }

  function delete(){

  	$uniq_id = $_POST['uniq_id'];
    $folder_path = $_POST['folder_path'];

  	$data = base64_decode($uniq_id);

  	unlink(DOC_ROOT.'uploads/'.$folder_path.$data);
  	unlink(DOC_ROOT.'uploads/'.$folder_path.'thumbs/'.$data);

  	echo $data;

  }