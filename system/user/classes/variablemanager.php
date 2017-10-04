<?php
class VariableManager extends Default_DBConnection implements Default_DBInterface{

private $id; 
private $name; 
private $value; 
private $owner_type; 
private $owner;

private $table_name = "variable_manager";

function id(){
    return $this->id;
}

function name(){
    return $this->name;
}

function value(){
    return $this->value;
}

function ownerType(){
    return $this->owner_type;
}

function owner(){
    return $this->owner;
}



 //------------------------//  



function setId($id){
   $this->id = $id;
}

function setName($name){
   $this->name = $name;
}

function setValue($value){
   $this->value = $value;
}

function setOwnerType($owner_type){
   $this->owner_type = $owner_type;
}

function setOwner($owner){
   $this->owner = $owner;
}

function extractor($results,$row=0){

   $this->setId($results[$row]['id']);
   $this->setName($results[$row]['name']);
   $this->setValue($results[$row]['value']);
   $this->setOwnerType($results[$row]['owner_type']);
   $this->setOwner($results[$row]['owner']);

}

function selectAll(){

   $this->MDatabase->select($this->table_name,"*","","name");
   return $this->MDatabase->result;

}

function selectAllPaginated($page){

   $this->MDatabase->select($this->table_name,"*","","id DESC",$page);
   echo $this->MDatabase->sqlquery;
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

function searchAll($search_text){
  $search_txt = Default_Common::textToSQLLikeString($search_text);
  $this->MDatabase->select($this->table_name,"*","name $search_txt OR owner $search_txt OR value $search_txt" ,'name ASC');
  return $this->MDatabase->result;
}

function searchPaginated($search_text,$page){
  $search_txt = Default_Common::textToSQLLikeString($search_text);
  $this->MDatabase->select($this->table_name,"*","name $search_txt OR owner $search_txt OR value $search_txt",'name ASC',$page);
  return $this->MDatabase->result;
}

function searchCount($search_text){
  $search_txt = Default_Common::textToSQLLikeString($search_text);
  $this->MDatabase->select($this->table_name,"COUNT(*) as count","name $search_txt OR owner $search_txt OR value $search_txt",'name ASC');
  return $this->MDatabase->result[0]["count"];
}

function insert(){
	
   $status = $this->MDatabase->insert($this->table_name,array(
      "id" => $this->id(),
      "name" => $this->name(),
      "value" => $this->value(),
      "owner_type" => $this->ownerType(),
      "owner" => $this->owner()
   ));

   return $status;

}

function update(){

   $status = $this->MDatabase->update($this->table_name,array(
      "value" => $this->value(),
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
  CREATE TABLE IF NOT EXISTS `variable_manager` (
    `id` INT(11) NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NULL DEFAULT NULL,
    `value` TEXT(11) NULL DEFAULT NULL,
    `owner_type` INT(11) NULL DEFAULT NULL,
    `owner` VARCHAR(50) NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
  )
  AUTO_INCREMENT=1;';

  $status = $this->MDatabase->customNoResults($sql);

}

function createVariableSession(){

  $data_array = array();

  $data = $this->selectAll();
  for($i=0;$i<count($data); $i++){
    $this->extractor($data,$i);
    $data_array[$this->name()] = $this->value();
  }

  Sessions::setVariableSessions($data_array);

}

function getByName(){

   $this->MDatabase->select($this->table_name,"*","name='".$this->name()."'","id DESC");
   return $this->MDatabase->result;

}

function getVariableValue($name,$default=0){


  $data_array = Sessions::getVariableSessions();

  if(isset($data_array[$name])){

    return $data_array[$name];

  }else{

    $this->setName($name);
    $data = $this->getByName();

    if(!count($data)){

        $this->setName($name);
        $this->setValue($default['value']);
        $this->setOwnerType(1);
        $this->setOwner($default['mod_name']);

        $this->insert();

        $this->createVariableSession();

        return $this->getVariableValue($name,$default);

    }else{
        $this->extractor($data,0);
    }

    return $this->value();

  }

}


}

?>