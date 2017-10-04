<?php
class EmailSettings extends Default_DBConnection implements Default_DBInterface{

private $id; 
private $smtp_status; 
private $smtp_host; 
private $smtp_port; 
private $smtp_mailport; 
private $smtp_authentication; 
private $smtp_username; 
private $smtp_password; 
private $smtp_type; 
private $user_group; 

private $table_name = "email_settings";

function id(){
    return $this->id;
}

function smtpStatus(){
    return $this->smtp_status;
}

function smtpHost(){
    return $this->smtp_host;
}

function smtpPort(){
    return $this->smtp_port;
}

function smtpMailport(){
    return $this->smtp_mailport;
}

function smtpAuthentication(){
    return $this->smtp_authentication;
}

function smtpUsername(){
    return $this->smtp_username;
}

function smtpPassword(){
    return $this->smtp_password;
}

function smtpType(){
    return $this->smtp_type;
}

function userGroup(){
    return $this->user_group;
}



 //------------------------//  



function setId($id){
   $this->id = $id;
}

function setSmtpStatus($smtp_status){
   $this->smtp_status = $smtp_status;
}

function setSmtpHost($smtp_host){
   $this->smtp_host = $smtp_host;
}

function setSmtpPort($smtp_port){
   $this->smtp_port = $smtp_port;
}

function setSmtpMailport($smtp_mailport){
   $this->smtp_mailport = $smtp_mailport;
}

function setSmtpAuthentication($smtp_authentication){
   $this->smtp_authentication = $smtp_authentication;
}

function setSmtpUsername($smtp_username){
   $this->smtp_username = $smtp_username;
}

function setSmtpPassword($smtp_password){
   $this->smtp_password = $smtp_password;
}

function setSmtpType($smtp_type){
   $this->smtp_type = $smtp_type;
}

function setUserGroup($user_group){
   $this->user_group = $user_group;
}

function extractor($results,$row=0){

   $this->setId($results[$row]['id']);
   $this->setSmtpStatus($results[$row]['smtp_status']);
   $this->setSmtpHost($results[$row]['smtp_host']);
   $this->setSmtpPort($results[$row]['smtp_port']);
   $this->setSmtpMailport($results[$row]['smtp_mailport']);
   $this->setSmtpAuthentication($results[$row]['smtp_authentication']);
   $this->setSmtpUsername($results[$row]['smtp_username']);
   $this->setSmtpPassword($results[$row]['smtp_password']);
   $this->setSmtpType($results[$row]['smtp_type']);
   $this->setUserGroup($results[$row]['user_group']);
}

function selectAll(){

   $this->MDatabase->select($this->table_name,"*","","id");
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
      "id" => $this->id(),
      "smtp_status" => $this->smtpStatus(),
      "smtp_host" => $this->smtpHost(),
      "smtp_port" => $this->smtpPort(),
      "smtp_mailport" => $this->smtpMailport(),
      "smtp_authentication" => $this->smtpAuthentication(),
	  "smtp_username" => $this->smtpUsername(),
	  "smtp_password" => $this->smtpPassword(),
      "smtp_type" => $this->smtpType(),
	  "user_group" => $this->userGroup()
	 ));

   return $status;

}

function update(){

  if($this->smtpPassword()!=""){

   $status = $this->MDatabase->update($this->table_name,array(
      "smtp_status" => $this->smtpStatus(),
      "smtp_host" => $this->smtpHost(),
      "smtp_port" => $this->smtpPort(),
      "smtp_mailport" => $this->smtpMailport(),
      "smtp_authentication" => $this->smtpAuthentication(),
	    "smtp_username" => $this->smtpUsername(),
	    "smtp_password" => $this->smtpPassword(),
      "smtp_type" => $this->smtpType(),
	  "user_group" => $this->userGroup()
   ),array("1" => "1"));

  }else{
   $status = $this->MDatabase->update($this->table_name,array(
      "smtp_status" => $this->smtpStatus(),
      "smtp_host" => $this->smtpHost(),
      "smtp_port" => $this->smtpPort(),
      "smtp_mailport" => $this->smtpMailport(),
      "smtp_authentication" => $this->smtpAuthentication(),
      "smtp_username" => $this->smtpUsername(),
      "smtp_type" => $this->smtpType(),
	  "user_group" => $this->userGroup()
   ),array("1" => "1"));

  }

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
	CREATE TABLE IF NOT EXISTS `email_settings` (
		`id` INT(10) NOT NULL AUTO_INCREMENT,
		`smtp_status` INT(10) NULL DEFAULT NULL,
		`smtp_host` VARCHAR(100) NULL DEFAULT NULL,
		`smtp_port` INT(10) NULL DEFAULT NULL,
		`smtp_mailport` INT(10) NULL DEFAULT NULL,
		`smtp_authentication` INT(10) NULL DEFAULT NULL,
		`smtp_username` VARCHAR(200) NULL DEFAULT NULL,
		`smtp_password` VARCHAR(200) NULL DEFAULT NULL,
		`smtp_type` VARCHAR(10) NULL DEFAULT NULL,
		`user_group` VARCHAR(200) NULL DEFAULT NULL,
		PRIMARY KEY (`id`)
	)
  AUTO_INCREMENT=1;';

  $status = $this->MDatabase->customNoResults($sql);

}

function deleteTable(){
  $sql ='DROP TABLE IF EXISTS `email_settings`';

  $status = $this->MDatabase->customNoResults($sql);
}

function getLatest(){

  $this->MDatabase->rowsPerPage = 50;
  return $this->selectAllPaginated(1);

}

function getSmtpType(){
  return array("no"=>"No SSL","ssl"=>"SSL","tls"=>"TLS");
}

function sendMail($from,$from_name,$to,$subject,$body,$attachment=''){

  require_once(DOC_ROOT.'system/application/libs/php/phpmailer/class.phpmailer.php');
  require_once(DOC_ROOT.'system/application/libs/php/phpmailer/class.smtp.php');

  $data = $this->selectAll();
  $this->extractor($data);

      $mail  = new PHPMailer();
      $mail->IsSMTP();

      if($this->smtpAuthentication()==1){
        $mail->SMTPAuth   = true;
      }else{
        $mail->SMTPAuth   = false;
      }
        
      if($this->smtpType()!="no"){
        $mail->SMTPSecure = $this->smtpType();
      }

      $mail->Host       = $this->smtpHost();

      if($this->smtpType()!="no"){
        $mail->Port       = $this->smtpPort();
      }else{
        $mail->Port       = $this->smtpMailport();
      }
      
      $mail->Username   = $this->smtpUsername();
      $mail->Password   = $this->smtpPassword();
      
      $mail->From       = $from;
      $mail->FromName   = $from_name;
      $mail->Subject    = $subject;
      $mail->WordWrap   = 50;
      
      $mail->MsgHTML($body);
      
	  if(is_array($to)){
		  for($i=0; $i<count($to); $i++){
			  $mail->AddAddress($to[$i],$from_name);
		  }
	  }else{
      	  $mail->AddAddress($to,$from_name);
	  }
      
      $mail->IsHTML(true); // send as HTML
	  
	  if($attachment!=""){
		  
      $mail->AddAttachment(DOC_ROOT.'uploads/'.$attachment);
	  
	  }
	  
      if($mail->Send()){
		  
		  unlink(DOC_ROOT.'uploads/'.$attachment);
	  		//return 1;
	  }else{
		  
		  //return 0;
	  }


}


}

?>