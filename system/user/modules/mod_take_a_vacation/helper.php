<?php

class Mod_TakeAVacation extends Default_DBConnection implements Default_DBInterface {

      private $id;
	  private $name;
      private $image;
      private $description;
	  private $sort_order;
      private $status;
      private $created_by;
      private $created_date;
      private $modified_by;
      private $modified_date;
      private $table_name = "take_a_vacation";

      function id() {
            return $this->id;
      }
	  
	  function name() {
            return $this->name;
      }

      function image() {
            return $this->image;
      }

      function description() {
            return $this->description;
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

      function setImage($image) {
            $this->image = $image;
      }

      function setDescription($description) {
            $this->description = $description;
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
            $this->setImage($results[$row]['image']);
            $this->setDescription($results[$row]['description']);
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

            $this->MDatabase->select($this->table_name, "*", "", "id ASC");
            return $this->MDatabase->result;
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
                "image" => $this->image(),
                "description" => $this->description(),
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
                "image" => $this->image(),
                "description" => $this->description(),
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

            $sql = 'CREATE TABLE IF NOT EXISTS `take_a_vacation` (
					`id` INT(11) NOT NULL AUTO_INCREMENT,
					`name` VARCHAR(200) NULL DEFAULT NULL,
					`image` VARCHAR(500) NULL DEFAULT NULL,
					`description` TEXT NULL DEFAULT NULL,
					`sort_order` INT(11) NULL DEFAULT NULL,
					`status` INT(11) NULL DEFAULT NULL,
					`created_by` INT(11) NULL DEFAULT NULL,
					`created_date` VARCHAR(15) NULL DEFAULT NULL,
					`modified_by` INT(11) NULL DEFAULT NULL,
					`modified_date` VARCHAR(15) NULL DEFAULT NULL,
					
					PRIMARY KEY (`id`)
				  )
				  AUTO_INCREMENT=1;';

            $this->MDatabase->customNoResults($sql);
      }

      function getAllStatus() {

            $variable_manager = new VariableManager();
            $data = $variable_manager->getVariableValue("mod_take_a_vacation_status", array("value" => "Disable,Enable", "mod_name" => "mod_take_a_vacation"));

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
