<?php

class Sessions {

      static function setAdminLoginDetails($admin_id, $admin_username) {
            $_SESSION["admin_id"] = $admin_id;
            $_SESSION["admin_username"] = $admin_username;
            $_SESSION["is_admin_logged"] = true;
      }
	  
	  static function isAdminLogged() {
            if (isset($_SESSION['is_admin_logged']) && $_SESSION['is_admin_logged'] == true) {
                  return true;
            } else {
                  return false;
            }
      }

      function getAdminId() {
            return $_SESSION["admin_id"];
      }

      static function adminRedirectOnNotLoggedIn() {

            if (!Sessions::isAdminLogged()) {
                  header("Location: login");
            }
      }

      static function adminJSRedirectOnNotLoggedIn() {

            if (!Sessions::isAdminLogged()) {

                  $views = new Default_Views();
                  $views->setModule('users');
                  $views->load('admin/login', '', true);
                  //die("Please Login");
            }
      }

      static function logoutAdmin() {
            unset($_SESSION["admin_id"]);
            unset($_SESSION["admin_username"]);
            unset($_SESSION["is_admin_logged"]);
            unset($_SESSION["user_permission"]);
      }

      static function setUserPermission($permission) {
            $_SESSION["user_permission"] = $permission;
      }

      static function setSystemManagerPermission($system_manager_permission) {
            $_SESSION["system_manager_permission"] = $system_manager_permission;
      }

      static function getUserPermission() {
            return $_SESSION["user_permission"];
      }

      static function getSystemManagerPermission() {
            return $_SESSION["system_manager_permission"];
      }

      static function checkUserPermission($module_name, $action) {

            $user_permissions = json_decode(Sessions::getUserPermission(), true);
            switch ($action) {
                  case 1:
                        $view = "view";
                        return $user_permissions[$module_name][0][$view][0];
                        break;
                  case 2:
                        $add = "add";
                        return $user_permissions[$module_name][0][$add][0];
                        break;
                  case 3:
                        $edit = "edit";
                        return $user_permissions[$module_name][0][$edit][0];
                        break;
                  case 4:
                        $delete = "delete";
                        return $user_permissions[$module_name][0][$delete][0];
                        break;
                  case 5:
                        $other = "other";
                        return $user_permissions[$module_name][0][$other][0];
                        break;
            }


            print_r($user_permissions[$module_name][0][$add][0]);
      }

      static function setVariableSessions($variable_array) {
            $_SESSION['variable_manager'] = $variable_array;
      }

      static function getVariableSessions() {
            return $_SESSION['variable_manager'];
      }

      static function setPropertiesId($id) {
            $_SESSION['properties_id'] = $id;
      }

      static function getPropertiesId() {
            return $_SESSION['properties_id'];
      }

      static function setFrontPropertiesId($id) {
            $_SESSION['front_properties_id'] = $id;
      }

      static function getFrontPropertiesName() {
            return $_SESSION['front_properties_name'];
      }
	  
	  static function setFrontPropertiesName($name) {
            $_SESSION['front_properties_name'] = $name;
      }

      static function getFrontPropertiesId() {
            return $_SESSION['front_properties_id'];
      }
	  
	  static function setFrontCheckIn($check_in) {
		    $property_id = Sessions::getFrontPropertiesId();
            $_SESSION['check_in_'.$property_id] = $check_in;
      }

      static function getFrontCheckIn() {
		    $property_id = Sessions::getFrontPropertiesId();
            return $_SESSION['check_in_'.$property_id];
      }
	  
	  static function setFrontCheckOut($check_out) {
		    $property_id = Sessions::getFrontPropertiesId();
            $_SESSION['check_out_'.$property_id] = $check_out;
      }

      static function getFrontCheckOut() {
		    $property_id = Sessions::getFrontPropertiesId();
            return $_SESSION['check_out_'.$property_id];
      }
	  
	  static function setFrontNationalityId($id) {
		    $property_id = Sessions::getFrontPropertiesId();
            $_SESSION['nationality_'.$property_id] = $id;
      }

      static function getFrontNationalityId() {
		    $property_id = Sessions::getFrontPropertiesId();
            return $_SESSION['nationality_'.$property_id];
      }
	  
	  static function setRoomCart($reservation_data){
		    $property_id = Sessions::getFrontPropertiesId();
		    $_SESSION['room_cart_'.$property_id] = $reservation_data;
	  }

	  static function getRoomCart(){
		    $property_id = Sessions::getFrontPropertiesId();
		   	return $_SESSION['room_cart_'.$property_id];
	  }
	  
	  static function unsetRoomCart(){
		    $property_id = Sessions::getFrontPropertiesId();
		   	unset($_SESSION['room_cart_'.$property_id]);	  
	  }

}

?>