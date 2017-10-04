<?php
define('_MEXEC','OK');
require_once("../../../system/load.php");

 $action = $_POST['action'];
 
 switch($action){
	case "getRoomDetails":
		getRoomDetails();
		break;
	case "getRoomRates":
		getRoomRates();
		break;
	case "addRoom":
		addRoom();
		break;
	case "removeRoom":
		removeRoom();
		break;
	case "viewReservationSummary":
		viewReservationSummary();
		break;
	case "rateInfoModal":
		rateInfoModal();
		break;
	case "rateInfoModalFromSession":
		rateInfoModalFromSession();
		break;
 }



function getRoomDetails(){

	//define('NATIONALITY', 'SL');
	//define('NATIONALITY', 'FO');
	
	Default_ModManager::loadHelper("rate_plans");
	Default_ModManager::loadHelper("room_types");
	Default_ModManager::loadHelper("allotments");
	Default_ModManager::loadHelper("offers");
	Default_ModManager::loadHelper("addons");
	Default_ModManager::loadHelper("bed_types");
	Default_ModManager::loadHelper("meal_type");
	
	
	$room_types = new Mod_Room_types();
	$offers		= new Mod_Offers();
	$addons		= new Mod_Addons();
	$bed_types  = new Mod_Bed_types();
	$meal_types = new Mod_Mealtype();
	
	$room_types->setPropertyId(Sessions::getFrontPropertiesId());
	$room_array = $room_types->selectAllActive(); 
	$from = Sessions::getFrontCheckIn();
	$to   = Default_Common::minusOneDay(Sessions::getFrontCheckOut());
	
	$blocks     = array();
	//error_reporting(E_ALL);
	for($i=0; $i<count($room_array); $i++){
	
		$room_block = array();
		$room_types->extractor($room_array,$i);
		
		$room_id = $room_types->id();
		
		$allotments = new Mod_Allotments();
		$allotments->setPropertyId(Sessions::getFrontPropertiesId());
		$allotments->setRoomType($room_id);
		$allotments_arr = $allotments->getAllotmentsForRoomId($from, $to);
	
		$rate_plans = new Mod_Rate_plans();
		$rate_plans->setPropertyId(Sessions::getFrontPropertiesId());
		$rate_plans->setRoomTypeId($room_id);
		$rates_arr = $rate_plans->getAllRatesByRoomId($from,$to); //var_dump($rates_arr);
	
		if(count($allotments_arr)>0 && count($rates_arr)>0){
	
			$room_block['room_id'] = $room_types->id();
			$room_block['room_name'] = $room_types->name();
			$room_block['room_image'] = $room_types->image();
			$room_block['room_description'] = $room_types->description();
	
			$room_block['no_of_rooms']  = $allotments->getMinimumAllotmentsforRoomType($allotments_arr,$room_id);
			$room_block['extra_beds'] = $room_types->getExtraAdults();
			$room_block['extra_childs'] = $room_types->getExtraChilds();
	
			$offers->setPropertyId(Sessions::getFrontPropertiesId());
			$offers->setRoomType($room_id);
			$offers->setFromDate(strtotime($from));
			$offers->setToDate(strtotime($to));
			$offers_arr = $offers->getValidHighestDiscountOffer();
			$room_block['valid_offer'] = $offers_arr;
			
			$addons->setPropertyId(Sessions::getFrontPropertiesId());
			$addons->setRoomTypes($room_id);
			$addons_arr = $addons->getValidAddonsByRoomType();
			$room_block['addons'] = $addons_arr;
			
			$bed_types_arr  = $room_types->getBedTypesArray($rates_arr); 
			$room_block['bed_types'] = $bed_types_arr;
			
			$meal_types_arr = $room_types->getMealTypesArray($rates_arr);
			$room_block['meal_types'] = $meal_types_arr;
			
			if($allotments->getMinimumAllotmentsforRoomType($allotments_arr,$room_id) == 0){
				$no_of_rooms = 0;
			}else{
				$no_of_rooms = 1;
			}
			$lowest_room_rate_arr  = $rate_plans->getValidLowestRoomRateAry($rates_arr); //print_r($lowest_room_rate_arr);
			$room_data = array('room_id' =>$room_types->id(), 'bed_type'=>$lowest_room_rate_arr['bed_type_id'],'meal_type'=>$lowest_room_rate_arr['meal_type_id'],'no_of_rooms'=>$no_of_rooms,'extra_beds'=>0,'extra_children'=>0); 
			
			$room_rate_array = $rate_plans->getRoomRates($room_data); //print_r($room_rate_array);
			if($room_rate_array['code'] == 200){
				$final_room_rate = Default_Common::displayCurrency($room_rate_array['final_room_rate']);
				$original_room_rate = Default_Common::displayCurrency($room_rate_array['original_room_rate']);
			}else if($room_rate_array['code'] == 300){//no allotments
				$final_room_rate = "No rooms";
				$original_room_rate = "No rooms";
			}else{//no rates
				$final_room_rate = "No rates";
				$original_room_rate = "No rates";
				$room_block['no_rate_days'] = implode(', ',$room_rate_array['no_rate_days']);
			}
			
			$room_block['room_rates'] = array(
				"code" => $room_rate_array['code'],
				"display_rate" => $final_room_rate,
				"original_rate" => $original_room_rate
			);
			$room_block['default_meal_type'] = $lowest_room_rate_arr['meal_type_id'];
			$room_block['default_bed_type']  = $lowest_room_rate_arr['bed_type_id'];
	
			$blocks[] = $room_block;
	
		}
		
	}
	
	/*echo '<pre>';
	print_r($blocks);
	echo '</pre>';*/
	
	echo json_encode($blocks);

}

function getRoomRates(){

	Default_ModManager::loadHelper("rate_plans");

	$rate_plans = new Mod_Rate_plans();
	$data = $rate_plans->getRoomRates($_POST);
	$data["original_room_rate"] = Default_Common::displayCurrency($data["original_room_rate"]);
	$data["final_room_rate"] 	= Default_Common::displayCurrency($data["final_room_rate"]);
	$data['no_rate_days'] 		= implode(', ',$data['no_rate_days']);
	echo json_encode($data);

}

function addRoom(){

	Default_ModManager::loadHelper("rate_plans");

	$rate_plans = new Mod_Rate_plans();
	$status     = $rate_plans->addRoom($_POST);
	
	if($status['no_allotments'] == 0 && $status['exceed_min_rooms'] == 0 && $status['exceed_exta_beds'] == 0 && $status['exceed_extra_children'] == 0){
		Default_Common::jsonSuccess("Room has been added succesfully.");
	}else{
		if($status['no_allotments'] == 1){
			Default_Common::jsonError("Sorry! Requested room is currently not available");
		}else if($status['exceed_min_rooms'] == 1){
			Default_Common::jsonError("Sorry! Requested room count is not available");
		}else if($status['exceed_exta_beds'] == 1){
			Default_Common::jsonError("Sorry! Requested extra bed count is not available");
		}else{
			Default_Common::jsonError("Sorry! Requested children count is not available");
		}
	}

}

function removeRoom(){

	Default_ModManager::loadHelper("rate_plans");

	$rate_plans = new Mod_Rate_plans();
	$status     = $rate_plans->removeRoom($_POST['array_index']);
}

function viewReservationSummary(){
    
	$template   = new Default_TemplateEngine();
   
    $room_cart_session = Sessions::getRoomCart();
   
    $template->set(array('room_cart_session' => $room_cart_session,'currency' => $_POST['currency']));
    $template->loadTemplate("layouts/reservation-summary");

}

function rateInfoModal(){
	
	Default_ModManager::loadHelper("rate_plans");

	$rate_plans = new Mod_Rate_plans();
	$template   = new Default_TemplateEngine();

	$room_rate_array = $rate_plans->getRoomRates($_POST);
	
	$rate_info_array = $rate_plans->setRateInfoArray($room_rate_array);
	$rate_info_array['original_room_rate'] = $room_rate_array['original_room_rate'];
	$rate_info_array['final_room_rate']	   = $room_rate_array['final_room_rate'];
	$rate_info_array['no_of_rooms'] = $_POST['no_of_rooms'];
	$rate_info_array['children'] 	= $_POST['extra_children'];
	$rate_info_array['extra_beds']  = $_POST['extra_beds'];
	
    $template->set($rate_info_array);
    $template->loadTemplate("layouts/rate-info");
}

function rateInfoModalFromSession(){
	
	Default_ModManager::loadHelper("rate_plans");

	$rate_plans = new Mod_Rate_plans();
	$template   = new Default_TemplateEngine();
	
	$index = $_POST['array_index'];
    $room_cart_session = Sessions::getRoomCart();
	
	$original_room_rate 	= $room_cart_session['rooms'][$index]['original_room_rate'];
	$final_room_rate 		= $room_cart_session['rooms'][$index]['final_room_rate'];
	$original_rates_per_day = $room_cart_session['rooms'][$index]['original_rates_per_day'];
	$final_rates_per_day 	= $room_cart_session['rooms'][$index]['final_rates_per_day'];
	
	$room_rate_array = array("code"=>"200", "original_room_rate"=>$original_room_rate, "final_room_rate"=>$final_room_rate, "original_rates_per_day"=>$original_rates_per_day, "final_rates_per_day"=>$final_rates_per_day);
	
	$rate_info_array = $rate_plans->setRateInfoArray($room_rate_array);
	$rate_info_array['original_room_rate'] = $original_room_rate;
	$rate_info_array['final_room_rate'] = $final_room_rate;
	$rate_info_array['no_of_rooms'] = $room_cart_session['rooms'][$index]['no_of_rooms'];
	$rate_info_array['children'] = $room_cart_session['rooms'][$index]['children'];
	$rate_info_array['extra_beds'] = $room_cart_session['rooms'][$index]['extra_beds'];
	
    $template->set($rate_info_array);
    $template->loadTemplate("layouts/rate-info");
}