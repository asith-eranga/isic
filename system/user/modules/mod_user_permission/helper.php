<?php
class Mod_UserPermission extends Default_DBConnection implements Default_DBInterface{

private $id; 
private $permission_name; 
private $permission; 
private $system_manager_permission;

private $table_name = "user_permission";

function id(){
    return $this->id;
}

function permissionName(){
    return $this->permission_name;
}

function permission(){
    return $this->permission;
}

function systemManagerPermission(){
    return $this->system_manager_permission;
}

 //------------------------//  



function setId($id){
   $this->id = $id;
}

function setPermissionName($permission_name){
   $this->permission_name = $permission_name;
}

function setPermission($permission){
   $this->permission = $permission;
}

function setSystemManagerPermission($system_manager_permission){
   $this->system_manager_permission = $system_manager_permission;
}

function extractor($results,$row=0){

   $this->setId($results[$row]['id']);
   $this->setPermissionName($results[$row]['permission_name']);
   $this->setPermission($results[$row]['permission']);
   $this->setSystemManagerPermission($results[$row]['system_manager_permission']);

}

function selectAll(){

   $this->MDatabase->select($this->table_name,"*","","id ASC");
   return $this->MDatabase->result;

}

function selectAllPaginated($page){

   $this->MDatabase->select($this->table_name,"*","","id ASC",$page);
   return $this->MDatabase->result;

}

function selectAllCount(){

   $this->MDatabase->select($this->table_name,"COUNT(*) as count","","");
   return $this->MDatabase->result[0]["count"];

}

function getById(){

   $this->MDatabase->select($this->table_name,"*","id='".$this->id()."'","id DESC");
   return $this->MDatabase->result;

}

function search(){

}

function searchPaginated($search_text,$page){
  $search_txt = Default_Common::textToSQLLikeString($search_text);
  $this->MDatabase->select($this->table_name,"*","permission_name $search_txt" ,'permission_name ASC',$page);
  return $this->MDatabase->result;
}

function searchCount($search_text){
  $search_txt = Default_Common::textToSQLLikeString($search_text);
  $this->MDatabase->select($this->table_name,"COUNT(*) as count","permission_name $search_txt" ,'permission_name ASC');
  return $this->MDatabase->result[0]["count"];
}

function insert(){
	
	 $status = $this->MDatabase->insert($this->table_name,array(
		"permission_name" => $this->permissionName(),
		"permission" => $this->permission(),
		"system_manager_permission" => $this->systemManagerPermission()
	 ));

   return $status;

}

function update(){

   $status = $this->MDatabase->update($this->table_name,array(
		"permission_name" => $this->permissionName(),
		"permission" => $this->permission(),
		"system_manager_permission" => $this->systemManagerPermission()
   ),array("id" => $this->id()));


   return $status;


}

function delete(){

   $status = $this->MDatabase->delete($this->table_name,"id='".$this->id()."'");
   return $status;

}

function setValues($data) {

   foreach($data as $k => $v){
      $this->$k = $v;
   }

}

function createTable(){

  $sql ='
    CREATE TABLE IF NOT EXISTS `user_permission` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `permission_name` VARCHAR(100) NULL DEFAULT NULL,
    `permission` TEXT NULL DEFAULT NULL,
	`system_manager_permission` TEXT NULL DEFAULT NULL,

    PRIMARY KEY (`id`)
  )
  AUTO_INCREMENT=1;';

  $status = $this->MDatabase->customNoResults($sql);

}

function getUserPermissionFromId(){
	$this->MDatabase->select($this->table_name,"*","id = '".$this->MDatabase->$this->id()."'");
	return $this->MDatabase->result;
}

function deleteUserPermission(){
    $status = $this->MDatabase->delete($this->table_name,"id='".$this->MDatabase->$this->id()."'");
    return $status;
}

function getSystemManagerCategories(){
	return array("activity-log"=>"Activity Log","email-settings"=>"Email Settings","variable-manager"=>"Variable Manager");
}

}

?>