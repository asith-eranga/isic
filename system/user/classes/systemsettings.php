<?php

class SystemSettings extends Default_DBConnection implements Default_DBInterface {

    private $id;
    private $site_logo;
    private $site_favicon;
    private $address_line_1;
    private $address_line_2;
    private $address_line_3;
    private $address_line_4;
    private $address_line_5;
    private $telephone_1;
    private $telephone_2;
    private $email;
    private $fax;
    private $map_coordinates;
    private $facebook;
    private $twitter;
    private $instagram;
    private $pinterest;

    private $table_name = "system_settings";

    function id(){
        return $this->id;
    }

    function siteLogo(){
        return $this->site_logo;
    }

    function siteFavicon(){
        return $this->site_favicon;
    }

    function addressLine1(){
        return $this->address_line_1;
    }

    function addressLine2(){
        return $this->address_line_2;
    }

    function addressLine3(){
        return $this->address_line_3;
    }

    function addressLine4(){
        return $this->address_line_4;
    }

    function addressLine5(){
        return $this->address_line_5;
    }

    function telephone1(){
        return $this->telephone_1;
    }

    function telephone2(){
        return $this->telephone_2;
    }

    function email(){
        return $this->email;
    }

    function fax(){
        return $this->fax;
    }

    function mapCoordinates(){
        return $this->map_coordinates;
    }

    function facebook(){
        return $this->facebook;
    }

    function twitter(){
        return $this->twitter;
    }

    function instagram(){
        return $this->instagram;
    }

    function pinterest(){
        return $this->pinterest;
    }

    //------------------------//

    function setId($id){
       $this->id = $id;
    }

    function setSiteLogo($site_logo){
       $this->site_logo = $site_logo;
    }

    function setSiteFavicon($site_favicon){
       $this->site_favicon = $site_favicon;
    }

    function setAddressLine1($address_line_1){
       $this->address_line_1 = $address_line_1;
    }

    function setAddressLine2($address_line_2){
       $this->address_line_2 = $address_line_2;
    }

    function setAddressLine3($address_line_3){
       $this->address_line_3 = $address_line_3;
    }

    function setAddressLine4($address_line_4){
       $this->address_line_4 = $address_line_4;
    }

    function setAddressLine5($address_line_5){
       $this->address_line_5 = $address_line_5;
    }

    function setTelephone1($telephone_1){
       $this->telephone_1 = $telephone_1;
    }

    function setTelephone2($telephone_2){
       $this->telephone_2 = $telephone_2;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function setFax($fax){
        $this->fax = $fax;
    }

    function setMapCoordinates($map_coordinates){
        $this->map_coordinates = $map_coordinates;
    }

    function setFacebook($facebook){
        $this->facebook = $facebook;
    }

    function setTwitter($twitter){
        $this->twitter = $twitter;
    }

    function setInstagram($instagram){
        $this->instagram = $instagram;
    }

    function setPinterest($pinterest){
        $this->pinterest = $pinterest;
    }

    function extractor($results,$row=0){

       $this->setId($results[$row]['id']);
       $this->setSiteLogo($results[$row]['site_logo']);
       $this->setSiteFavicon($results[$row]['site_favicon']);
       $this->setAddressLine1($results[$row]['address_line_1']);
       $this->setAddressLine2($results[$row]['address_line_2']);
       $this->setAddressLine3($results[$row]['address_line_3']);
       $this->setAddressLine4($results[$row]['address_line_4']);
       $this->setAddressLine5($results[$row]['address_line_5']);
       $this->setTelephone1($results[$row]['telephone_1']);
       $this->setTelephone2($results[$row]['telephone_2']);
       $this->setEmail($results[$row]['email']);
       $this->setFax($results[$row]['fax']);
       $this->setMapCoordinates($results[$row]['map_coordinates']);
       $this->setFacebook($results[$row]['facebook']);
       $this->setTwitter($results[$row]['twitter']);
       $this->setInstagram($results[$row]['instagram']);
       $this->setPinterest($results[$row]['pinterest']);
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

    function search(){}

    function searchPaginated($search_text,$page){
      $search_txt = Default_Common::textToSQLLikeString($search_text);
      $this->MDatabase->select($this->table_name,"*","address_line_1 $search_txt OR address_line_2 $search_txt OR address_line_3 $search_txt OR address_line_4 $search_txt" ,'id ASC',$page);
      return $this->MDatabase->result;
    }

    function searchCount($search_text){
      $search_txt = Default_Common::textToSQLLikeString($search_text);
      $this->MDatabase->select($this->table_name,"COUNT(*) as count","address_line_1 $search_txt OR address_line_2 $search_txt OR address_line_3 $search_txt OR address_line_4 $search_txt" ,'id ASC');
      return $this->MDatabase->result[0]["count"];
    }

    function insert(){
         $status = $this->MDatabase->insert($this->table_name,array(
          "site_logo" => $this->siteLogo(),
          "site_favicon" => $this->siteFavicon(),
          "address_line_1" => $this->addressLine1(),
          "address_line_2" => $this->addressLine2(),
          "address_line_3" => $this->addressLine3(),
          "address_line_4" => $this->addressLine4(),
          "address_line_5" => $this->addressLine5(),
          "email" => $this->email(),
          "fax" => $this->fax(),
          "map_coordinates" => $this->mapCoordinates(),
          "telephone_1" => $this->telephone1(),
          "telephone_2" => $this->telephone2(),
          "facebook" => $this->facebook(),
          "twitter" => $this->twitter(),
          "instagram" => $this->instagram(),
          "pinterest" => $this->pinterest()
         ));
       return $status;
    }

    function update(){
       $status = $this->MDatabase->update($this->table_name,array(
           "site_logo" => $this->siteLogo(),
           "site_favicon" => $this->siteFavicon(),
           "address_line_1" => $this->addressLine1(),
           "address_line_2" => $this->addressLine2(),
           "address_line_3" => $this->addressLine3(),
           "address_line_4" => $this->addressLine4(),
           "address_line_5" => $this->addressLine5(),
           "email" => $this->email(),
           "fax" => $this->fax(),
           "map_coordinates" => $this->mapCoordinates(),
           "telephone_1" => $this->telephone1(),
           "telephone_2" => $this->telephone2(),
           "facebook" => $this->facebook(),
           "twitter" => $this->twitter(),
           "instagram" => $this->instagram(),
           "pinterest" => $this->pinterest()
       ), array("1" => "1"));

       return $status;
    }

    function delete(){}

    function setValues($data) {
       foreach($data as $k => $v){
          $this->$k = $v;
       }
    }

    function createTable(){
        $sql ='
            CREATE TABLE IF NOT EXISTS `system_settings` (
                `id` INT(10) NOT NULL AUTO_INCREMENT,
                `site_logo` VARCHAR(100) NULL DEFAULT NULL,
                `site_favicon` VARCHAR(100) NULL DEFAULT NULL,
                `address_line_1` VARCHAR(200) NULL DEFAULT NULL,
                `address_line_2` VARCHAR(200) NULL DEFAULT NULL,
                `address_line_3` VARCHAR(200) NULL DEFAULT NULL,
                `address_line_4` VARCHAR(200) NULL DEFAULT NULL,
                `address_line_5` VARCHAR(200) NULL DEFAULT NULL,
                `email` VARCHAR(100) NULL DEFAULT NULL,
                `fax` VARCHAR(100) NULL DEFAULT NULL,
                `map_coordinates` VARCHAR(100) NULL DEFAULT NULL,
                `telephone_1` VARCHAR(100) NULL DEFAULT NULL,
                `telephone_2` VARCHAR(100) NULL DEFAULT NULL,
                `facebook` VARCHAR(100) NULL DEFAULT NULL,
                `twitter` VARCHAR(100) NULL DEFAULT NULL,
                `instagram` VARCHAR(100) NULL DEFAULT NULL,
                `pinterest` VARCHAR(100) NULL DEFAULT NULL,
                PRIMARY KEY (`id`)
            )
          AUTO_INCREMENT=1;';

        $this->MDatabase->customNoResults($sql);
    }

    function deleteTable(){
        $sql ='DROP TABLE IF EXISTS `system_settings`';
        $this->MDatabase->customNoResults($sql);
    }

    function getLatest(){
      $this->MDatabase->rowsPerPage = 50;
      return $this->selectAllPaginated(1);
    }
}
