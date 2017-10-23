<?php

class Mod_Cards extends Default_DBConnection implements Default_DBInterface {

      private $id;
      private $name;
	  private $title_1;
	  private $description_1;
      private $title_2;
      private $description_2;
      private $title_3;
      private $description_3;
      private $date_of_issue;
      private $price;
      private $itinerary;
      private $image;
	  private $sort_order;
      private $status;
      private $created_by;
      private $created_date;
      private $modified_by;
      private $modified_date;
      private $table_name = "cards";

      function id() {
            return $this->id;
      }

      function name() {
        return $this->name;
      }
	  
	  function title1() {
            return $this->title_1;
      }

      function description1() {
          return $this->description_1;
      }

      function title2() {
          return $this->title_2;
      }

      function description2() {
          return $this->description_2;
      }

      function title3() {
          return $this->title_3;
      }

      function description3() {
          return $this->description_3;
      }

      function dateOfIssue() {
          return $this->date_of_issue;
      }

      function price() {
          return $this->price;
      }

      function itinerary() {
          return $this->itinerary;
      }

      function image() {
            return $this->image;
      }
	  
	  function sortOrder() {
            return $this->sort_order;
      }

      function status() {
            return $this->status;
      }

      function createdBy() {
            return $this->created_by;
      }

      function createdDate() {
            return $this->created_date;
      }

      function modifiedBy() {
            return $this->modified_by;
      }

      function modifiedDate() {
            return $this->modified_date;
      }

      //------------------------//  

      function setId($id) {
            $this->id = $id;
      }

      function setName($name) {
          $this->name = $name;
      }
	  
	  function setTitle1($title_1) {
            $this->title_1 = $title_1;
      }

      function setDescription1($description_1) {
          $this->description_1 = $description_1;
      }

      function setTitle2($title_2) {
          $this->title_2 = $title_2;
      }

      function setDescription2($description_2) {
          $this->description_2 = $description_2;
      }

      function setTitle3($title_3) {
          $this->title_3 = $title_3;
      }

      function setDescription3($description_3) {
          $this->description_3 = $description_3;
      }

      function setDateOfIssue($date_of_issue) {
          $this->date_of_issue = $date_of_issue;
      }

      function setPrice($price) {
          $this->price = $price;
      }

      function setItinerary($itinerary) {
          $this->itinerary = $itinerary;
      }

      function setImage($image) {
            $this->image = $image;
      }
	  
	  function setSortOrder($sort_order) {
            $this->sort_order = $sort_order;
      }
	  
      function setStatus($status) {
            $this->status = $status;
      }

      function setCreatedBy($created_by) {
            $this->created_by = $created_by;
      }

      function setCreatedDate($created_date) {
            $this->created_date = $created_date;
      }

      function setModifiedBy($modified_by) {
            $this->modified_by = $modified_by;
      }

      function setModifiedDate($modified_date) {
            $this->modified_date = $modified_date;
      }

      function extractor($results, $row = 0) {

            $this->setId($results[$row]['id']);
            $this->setName($results[$row]['name']);
			$this->setTitle1($results[$row]['title_1']);
            $this->setTitle2($results[$row]['title_2']);
            $this->setTitle3($results[$row]['title_3']);
            $this->setDescription1($results[$row]['description_1']);
            $this->setDescription2($results[$row]['description_2']);
            $this->setDescription3($results[$row]['description_3']);
            $this->setDateOfIssue($results[$row]['date_of_issue']);
            $this->setPrice($results[$row]['price']);
            $this->setItinerary($results[$row]['itinerary']);
            $this->setImage($results[$row]['image']);
			$this->setSortOrder($results[$row]['sort_order']);
            $this->setStatus($results[$row]['status']);
            $this->setCreatedBy($results[$row]['created_by']);
            $this->setCreatedDate($results[$row]['created_date']);
            $this->setModifiedBy($results[$row]['modified_by']);
            $this->setModifiedDate($results[$row]['modified_date']);
      }

      function selectAllPaginated($page) {

            $this->MDatabase->select($this->table_name, "*", "", "sort_order ASC", $page);
            return $this->MDatabase->result;
      }

      function selectAll() {

            $this->MDatabase->select($this->table_name, "*", " status=1 ", "id ASC");
            return $this->MDatabase->result;
      }

      function selectAllCount() {

            $this->MDatabase->select($this->table_name, "COUNT(*) as count", " ", "");
            return $this->MDatabase->result[0]["count"];
      }

      function getById() {

            $this->MDatabase->select($this->table_name, "*", "id='" . $this->id() . "'", "id DESC");
            return $this->MDatabase->result;
      }

      function search() {
            
      }

      function searchPaginated($search_text, $page) {
            $search_txt = Default_Common::textToSQLLikeString($search_text);
            $this->MDatabase->select($this->table_name, "*", "name $search_txt", 'name ASC', $page);
            return $this->MDatabase->result;
      }

      function searchCount($search_text) {
            $search_txt = Default_Common::textToSQLLikeString($search_text);
            $this->MDatabase->select($this->table_name, "COUNT(*) as count", "name $search_txt", 'name ASC');
            return $this->MDatabase->result[0]["count"];
      }

      function insert() {
            $status = $this->MDatabase->insert($this->table_name, array(
                "name" => $this->name(),
                "title_1" => $this->title1(),
                "title_2" => $this->title2(),
                "title_3" => $this->title3(),
                "description_1" => $this->description1(),
                "description_2" => $this->description2(),
                "description_3" => $this->description3(),
                "date_of_issue" => $this->dateOfIssue(),
                "price" => $this->price(),
                "itinerary" => $this->itinerary(),
                "image" => $this->image(),
				"sort_order" => $this->sortOrder(),
                "status" => $this->status(),
                "created_by" => $this->createdBy(),
                "created_date" => $this->createdDate()
            ));
            return $status;
      }

      function update() {

            $status = $this->MDatabase->update($this->table_name, array(
                "name" => $this->name(),
                "title_1" => $this->title1(),
                "title_2" => $this->title2(),
                "title_3" => $this->title3(),
                "description_1" => $this->description1(),
                "description_2" => $this->description2(),
                "description_3" => $this->description3(),
                "date_of_issue" => $this->dateOfIssue(),
                "price" => $this->price(),
                "itinerary" => $this->itinerary(),
                "image" => $this->image(),
                "status" => $this->status(),
                "modified_by" => $this->modifiedBy(),
                "modified_date" => $this->modifiedDate()
                    ), array("id" => $this->id()));
            return $status;
      }

      function delete() {

            $status = $this->MDatabase->delete($this->table_name, "id='" . $this->id() . "'");
            return $status;
      }

      function setValues($data) {

            foreach ($data as $k => $v) {
                  $this->$k = $v;
            }
      }

      function createTable() {

            $sql = '
					CREATE TABLE IF NOT EXISTS `cards` (
					`id` INT(11) NOT NULL AUTO_INCREMENT,
					`name` VARCHAR(200) NULL DEFAULT NULL,
					`title_1` VARCHAR(200) NULL DEFAULT NULL,
					`title_2` VARCHAR(200) NULL DEFAULT NULL,
					`title_3` VARCHAR(200) NULL DEFAULT NULL,
					`description_1` TEXT NULL DEFAULT NULL,
					`description_2` TEXT NULL DEFAULT NULL,
					`description_3` TEXT NULL DEFAULT NULL,
					`date_of_issue` VARCHAR(200) NULL DEFAULT NULL,
					`price` VARCHAR(200) NULL DEFAULT NULL,
					`itinerary` VARCHAR(200) NULL DEFAULT NULL,
					`image` VARCHAR(500) NULL DEFAULT NULL,					
					`sort_order` INT(11) NULL DEFAULT NULL,
					`status` INT(11) NULL DEFAULT NULL,
					`created_by` INT(11) NULL DEFAULT NULL,
					`created_date` VARCHAR(15) NULL DEFAULT NULL,
					`modified_by` INT(11) NULL DEFAULT NULL,
					`modified_date` VARCHAR(15) NULL DEFAULT NULL,
					
					PRIMARY KEY (`id`)
				  )
				  AUTO_INCREMENT=1;';

            $status = $this->MDatabase->customNoResults($sql);
      }

      function getAllStatus() {

            $variable_manager = new VariableManager();
            $data = $variable_manager->getVariableValue("mod_cards_status", array("value" => "Disable,Enable", "mod_name" => "mod_cards"));

            return explode(",", $data);
      }

      function updateSortOrder() {

            $status = $this->MDatabase->update($this->table_name, array(
                "sort_order" => $this->sortOrder(),
                    ), array("id" => $this->id()));
            return $status;
      }
	  
	  function nextOrderValue(){
			$this->MDatabase->select($this->table_name, "MAX(sort_order) as next_value", "", "");
            return $this->MDatabase->result[0]["next_value"]+1;
	  }

}
