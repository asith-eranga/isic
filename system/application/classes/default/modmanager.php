<?php

class Default_ModManager{

	function loadHelper($name){
		$mod_path = ABSPATH.USER_FOLDER."modules".DIRECTORY_SEPARATOR;
		$mod_name = "mod_".$name;
		$full_path = $mod_path.$mod_name;

			$ext = pathinfo($full_path, PATHINFO_EXTENSION);
			$file = "helper.php";

			$full_path = $full_path.DIRECTORY_SEPARATOR.$file;

		if(file_exists($full_path)){

			$module_path = $full_path;

			if(!class_exists($mod_name)){
				include_once($full_path);
			}

		}else{

			die("Error: Module ".$mod_name." does not exsists");

		}
	}

	function load($name,$params = ""){

		$mod_path = ABSPATH.USER_FOLDER."modules".DIRECTORY_SEPARATOR;
		$mod_name = "mod_".$name;
		$full_path = $mod_path.$mod_name;

			$ext = pathinfo($full_path, PATHINFO_EXTENSION);
			$file = ($ext == '') ? $mod_name.'.php' : $mod_name;

			$full_path = $full_path.DIRECTORY_SEPARATOR.$file;

		if(file_exists($full_path)){

			$module_path = $full_path;

			if($params!=""){
				extract($params, EXTR_PREFIX_SAME, "sys");
			}

			include($full_path);

		}else{

			die("Error: Module ".$mod_name." does not exsists");

		}

	}

	function listAllModules(){

		$mod_path = ABSPATH.USER_FOLDER."modules".DIRECTORY_SEPARATOR;
		$list = array_diff(scandir($mod_path), array('..', '.'));

		$mod_list = array();

		foreach($list as $mod_name){
			array_push($mod_list,$mod_name);
		}

		return $mod_list;

	}

	function niceName($mod_name){
		return ucwords(str_replace("_"," ",str_replace("mod_","",$mod_name)));
	}

}

?>