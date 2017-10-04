<?php

class Default_Views{

	private $module_name;

	function setModule($module_name){
		$this->module_name = "mod_".$module_name;
	}

	function load($view_file,$var_array='',$module_view=false){

		if($module_view){
			$views_path = ABSPATH.USER_FOLDER."modules".DIRECTORY_SEPARATOR.$this->module_name.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR;
		}else{
			$views_path = ABSPATH.USER_FOLDER."views".DIRECTORY_SEPARATOR;
		}
		

		$full_path = $views_path.$view_file;

			$ext = pathinfo($full_path, PATHINFO_EXTENSION);
			$file = ($ext == '') ? $view_file.'.php' : $view_file;

			$full_path = $views_path.$file;

		if(file_exists($full_path)){

			if(is_array($var_array)){
				extract($var_array, EXTR_PREFIX_SAME, "sys");
			}

			include($full_path);
		}else{
			die("Error: View ".$view_file." does not exsists");
		}

	}

	function loadFile($file,$module_view=false){

		if($module_view){
			$file_path = HTTP_PATH."system/user/modules/".$this->module_name."/";
		}else{ // use later
			$file_path = HTTP_PATH."system/user/modules/".$this->module_name."/"; 
		}
		
		$full_path = $file_path.$file;

			$ext = pathinfo($full_path, PATHINFO_EXTENSION);

		// TODO: check if file exsists using doc root

			if($ext=="js"){
				echo '<script type="text/javascript" src="'.$full_path.'"></script>';
			}

			if($ext=="css"){
				echo '<link rel="stylesheet" type="text/css" href="'.$full_path.'">';
			}

	}

	function loadAppLibs($file){

		$file_path = HTTP_PATH."system/application/libs/";

		$full_path = $file_path.$file;

			$ext = pathinfo($full_path, PATHINFO_EXTENSION);

		// TODO: check if file exsists using doc root

			if($ext=="js"){
				echo '<script type="text/javascript" src="'.$full_path.'"></script>';
			}

			if($ext=="css"){
				echo '<link rel="stylesheet" type="text/css" href="'.$full_path.'">';
			}
	}
	
}

?>