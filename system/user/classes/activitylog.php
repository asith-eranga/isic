<?php
class ActivityLog extends Default_DBConnection implements Default_DBInterface{

private $id; 
private $created_date; 
private $user; 
private $module; 
private $type; 
private $message; 
private $ip; 

private $table_name = "activity_log";

function id(){
    return $this->id;
}

function createdDate(){
    return $this->created_date;
}

function user(){
    return $this->user;
}

function module(){
    return $this->module;
}

function type(){
    return $this->type;
}

function message(){
    return $this->message;
}

function ip(){
    return $this->ip;
}



 //------------------------//  



function setId($id){
   $this->id = $id;
}

function setCreatedDate($created_date){
   $this->created_date = $created_date;
}

function setUser($user){
   $this->user = $user;
}

function setModule($module){
   $this->module = $module;
}

function setType($type){
   $this->type = $type;
}

function setMessage($message){
   $this->message = $message;
}

function setIp($ip){
   $this->ip = $ip;
}

function extractor($results,$row=0){

   $this->setId($results[$row]['id']);
   $this->setCreatedDate($results[$row]['created_date']);
   $this->setUser($results[$row]['user']);
   $this->setModule($results[$row]['module']);
   $this->setType($results[$row]['type']);
   $this->setMessage($results[$row]['message']);
   $this->setIp($results[$row]['ip']);

}


function selectAll(){

   $this->MDatabase->select($this->table_name,"*","","id DESC");
   return $this->MDatabase->result;

}

function selectAllPaginated($page){

   $this->MDatabase->select($this->table_name,"*","","id DESC",$page);
   //echo $this->MDatabase->sqlquery;
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
  $this->MDatabase->select($this->table_name,"*","title $search_txt OR category $search_txt OR summary $search_txt OR description $search_txt" ,'title ASC',$page);
  return $this->MDatabase->result;
}

function searchCount($search_text){
  $search_txt = Default_Common::textToSQLLikeString($search_text);
  $this->MDatabase->select($this->table_name,"COUNT(*) as count","title $search_txt OR category $search_txt OR summary $search_txt OR description $search_txt" ,'title ASC');
  return $this->MDatabase->result[0]["count"];
}

function insert(){
	
	 $status = $this->MDatabase->insert($this->table_name,array(
      "created_date" => $this->createdDate(),
      "user" => $this->user(),
      "module" => $this->module(),
      "type" => $this->type(),
      "message" => $this->message(),
      "ip" => $this->ip()
	 ));

   return $status;

}

function update(){

   $status = $this->MDatabase->update($this->table_name,array(
      "created_date" => $this->createdDate(),
      "user" => $this->user(),
      "module" => $this->module(),
      "type" => $this->type(),
      "message" => $this->message(),
      "ip" => $this->ip()
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
	CREATE TABLE IF NOT EXISTS `activity_log` (
		`id` INT(10) NOT NULL AUTO_INCREMENT,
		`created_date` INT(10) NULL DEFAULT NULL,
		`user` VARCHAR(50) NULL DEFAULT NULL,
		`module` VARCHAR(50) NULL DEFAULT NULL,
		`type` VARCHAR(20) NULL DEFAULT NULL,
		`message` VARCHAR(500) NULL DEFAULT NULL,
		`ip` VARCHAR(20) NULL DEFAULT NULL,
		PRIMARY KEY (`id`)
	)
  AUTO_INCREMENT=1;';

  $status = $this->MDatabase->customNoResults($sql);

}

function deleteTable(){
  $sql ='DROP TABLE IF EXISTS `activity_log`';

  $status = $this->MDatabase->customNoResults($sql);
}

function getLatest(){

  $this->MDatabase->rowsPerPage = 50;
  return $this->selectAllPaginated(1);

}

function newLogRecord($module,$type,$message){
      
      if(!class_exists("Mod_Users")){
        Default_ModManager::loadHelper('users');
      }

      $users = new Mod_Users();
      $users->setId(Sessions::getAdminId());
      $user_data = $users->getById();
      $users->extractor($user_data);

  $this->setCreatedDate(time());
  $this->setUser($users->getFullName());
  $this->setModule(Default_ModManager::niceName($module));
  $this->setType($type);
  $this->setMessage($message);
  $this->setIp($_SERVER['REMOTE_ADDR']);

  $this->insert();

}


}

?>