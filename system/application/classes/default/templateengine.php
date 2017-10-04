<?php

class Default_TemplateEngine {

    protected $file;
    protected $values = array();
  	protected $template;

	public function __construct() {
		$variable_manager = new VariableManager();
		$template 		  = $variable_manager->getVariableValue("general_template", array("value" => $_POST['template'], "mod_name" => "system"));
		$this->template = $template."/";
	}

	function set($values = array()){
		$this->values = $values;
	}

	function getTemplatePath(){
		return DOC_ROOT.TEMPLATES_FOLDER.$this->template;
	}
	
	function getTemplateUrl(){
		return HTTP_PATH.TEMPLATES_FOLDER.$this->template;
	}

	function loadFunctionFile(){

		$template_path = DOC_ROOT.TEMPLATES_FOLDER.$this->template;

		$full_path = $template_path."functions.php";

		if(file_exists($full_path)){
			include($full_path);
		}

	}

	function loadTemplate($file){

		$this->file = $file;

		$template_path = DOC_ROOT.TEMPLATES_FOLDER.$this->template;
		$template_url = HTTP_PATH.TEMPLATES_FOLDER.$this->template;

		$full_path = $template_path.$this->file;

			$ext = pathinfo($full_path, PATHINFO_EXTENSION);
			$file = ($ext == '') ? $this->file.'.php' : $this->file;

			$full_path = $template_path.$file;

		if(file_exists($full_path)){

			if(is_array($this->values)){
				extract($this->values, EXTR_PREFIX_SAME, "sys");
			}

			include($full_path);
		}else{
			die("Error: Template ".$this->file." does not exsists");
		}

	}


	function loadFile($file,$module_view=false){

		$template_url = HTTP_PATH.TEMPLATES_FOLDER.$this->template;
		
		$full_path = $template_url.$file;

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