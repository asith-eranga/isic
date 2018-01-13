<?php

class Default_Common{

	static function jsonEncode($code , $msg){
		$array = array(
			"code"=>$code , 
			"msg"=>$msg
			);
			
		echo json_encode($array);		
	}

	static function jsonEncodeData($array){
		echo json_encode($array);
	}

	static function jsonSuccess($msg){
		echo json_encode(array("code"=>"200","msg"=>$msg));
	}
	
	static function jsonSuccessMessage($msg){
		echo json_encode(array("code"=>"201","msg"=>$msg));
	}
	
	static function jsonSuccessNoMessage($data){
		echo json_encode(array("code"=>"202","msg"=>$data));
	}	
	
	static function jsonError($msg){
		echo json_encode(array("code"=>"400","msg"=>$msg));
	}	
	
	static function jsonValidationError($msg,$elements){
		echo json_encode(array("code"=>"303","msg"=>$msg,"els"=>$elements));
	}

	static function formatTime($timestamp){
		if($timestamp!="" && $timestamp!=0){
			return date("g:i a",$timestamp);
		}else{
			return "-";
		}
	}
	
	static function formatDate($timestamp){
		if($timestamp!="" && $timestamp!=0){
			return date("M j, Y",$timestamp);
		}else{
			return "-";
		}
	}
	

	static function currURL(){
		return (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	}

	static function textToSQLLikeString($data){
	
		$data_arr = explode(" ",$data);
		
		$final_string = "";
		
		foreach($data_arr as $k=>$v){

			$final_string .= "%";
			
			if($v!=""){
				$final_string .= "$v";
			}
			
			if(($k+1)==count($data_arr)){
				$final_string .= "%";
			}
			
		}
		
		return "LIKE '".$final_string."'";

		/*$data_arr = explode(" ",$data);

		$emptied_vals = array();

		foreach($data_arr as $k=>$v){
			if($v!=""){
				array_push($emptied_vals,$v);
			}
		}

		$data = implode(" ", $emptied_vals);

		return "REGEXP '(".str_replace(" ","|",$data).")'";	*/
	}

	static function limitDescription($text,$length=250){

		$clean_str = strip_tags($text);

		$str = substr(strip_tags($text), 0, $length);

			if(strlen($clean_str)>$length){
				$str .= "...";
			}

		return $str;

	}
	
	static function CSVExport($results) {

		header("Content-type:text/octect-stream");
		header("Content-Disposition:attachment;filename=data.csv");

		for($i=0; $i<count($results); $i++){
			print '"' . stripslashes(implode('","',$results[$i])) . "\"\n";
		}

    exit;
	}

    static function currencyConvert($from,$to,$value){

        $url = "https://rate-exchange.appspot.com/currency?from=".$from."&to=".$to."&q=".$value;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $output = curl_exec($ch);
        curl_close($ch);

        $currency_values = json_decode($output,TRUE);

        return $currency_values["v"];

    }
	
	static function displayCurrency($value){
		
		Default_ModManager::loadHelper("currency");
		$currency = new Mod_Currency();
		$sessionArr = $currency->getCurrencySession();
		if ($value != '') {
			  $valueOut = $sessionArr['prefix'] . ' ' . number_format($sessionArr['rate'] * $value, 2) . ' ' . $sessionArr['suffix'];
		} else {
			  $valueOut = $sessionArr['prefix'] . ' 0.00 ' . $sessionArr['suffix'];
		}
		return $valueOut;
	}

    static function makeSeo($text, $limit=75){

      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

      $text = trim($text, '-');

      $text = strtolower($text);

      $text = preg_replace('~[^-\w]+~', '', $text);

      if(strlen($text) > 70) {
      	$text = substr($text, 0, 70);
      } 

      if (empty($text))
      {
        return time();
      }

      return $text;
    }

    static function timeIsBetween($from,$to){

		//$time_from = 730; //7:30
		//$time_to = 1623; //13:23

		$time_from = str_replace(":","",$from);
		$time_to = str_replace(":","",$to);

		$current_time = (int) date('Gi');

		if ($current_time > $time_from && $current_time < $time_to ){
		    return true;
		}
		else
		{
		   return false;
		} 

    }
	
	static function add_hyphens($string, $length=10) {
		
		$string = strtolower(trim($string));
		$string = str_replace(" ","-",$string);
		$string = preg_replace('![^a-z0-9-]!',"-",$string);
		//$string = preg_replace('!\.!',"-",$string);
		$string = preg_replace('!\-+!',"-",$string);
		
		return (strlen($string) > $length) ? substr($string, 0, $length) : $string; 
		
	}
		
	static function checkSeoUrl($seo_url,$function_name,$field_name,$obj,$data_array){
		//$name = $function_name.'('.$seo_url.')';
		//$data = $obj->$name;
		//return $data_array;
		$data = call_user_func_array(array($obj,$function_name),array($seo_url));
		
		if(isset($data_array['id']) && !empty($data_array['id'])){//edit
			
			call_user_func_array(array($obj,"setId"),array($data_array['id']));
			$data_edit = call_user_func(array($obj,"getById"));
			
			if($data[0]['id'] == $data_array[0]['id']){ //
				return $seo_url;
			}
			
		}

		if(count($data)>0){
			$seo_url .= count($data)+1;
			//return array_map('self::checkSeoUrl', $seo_url,$function_name,$field_name,$obj);
		}else{
			//return $seo_url;
		}
		return $seo_url;
		/*for($i=0; $i<count($data); $i++){
			
			if($data[$i][$field_name] == $seo_url){
				$seo_url .= $i;
			}
		}*/
		
	}
	static function changeSeoUrl($count, $seo_url,$id){
		
		if($count>0){
			$seo_url .= '-'.$id;
		}else{
			$seo_url = $seo_url;
		}
		return $seo_url;
	}
	
	static function urlGetContents($Url) {
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!');
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
	
	static function strip_special_chars( $text ){
	   return preg_replace("/&#?[a-z0-9]{2,8};/i"," ",$text);    
	}
	
	static function dateRange($first, $last, $step = '+1 day', $output_format = 'd-M-Y') {
	
		  $dates = array();
		  $current = strtotime($first);
		  $last = strtotime($last);
	
		  while ($current <= $last) {
	
				$dates[] = date($output_format, $current);
				$current = strtotime($step, $current);
		  }
	
		  return $dates;
	}
	
	static function minusOneDay($date,$output_format = 'd-M-Y'){
		return date($output_format, strtotime($date .' -1 day'));
	}

	static function getCurrentTimeStamp()
	{
		return time();
	}

}
?>