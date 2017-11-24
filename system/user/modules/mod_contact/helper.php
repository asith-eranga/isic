<?php

class Mod_Contact extends Default_DBConnection implements Default_DBInterface {

    private $id;
    private $title;
    private $image;
    private $description;
    private $sort_order;
    private $modified_by;
    private $modified_date;
    private $table_name = "contact";

    function id() {
        return $this->id;
    }
	  
    function title() {
        return $this->title;
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
	  
    function setTitle($title) {
        $this->title = $title;
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

    function setModifiedBy($modified_by) {
        $this->modified_by = $modified_by;
    }

    function setModifiedDate($modified_date) {
        $this->modified_date = $modified_date;
    }

    function extractor($results, $row = 0) {
        $this->setId($results[$row]['id']);
	    $this->setTitle($results[$row]['title']);
        $this->setImage($results[$row]['image']);
        $this->setDescription($results[$row]['description']);
	    $this->setSortOrder($results[$row]['sort_order']);
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

    function update() {
        $status = $this->MDatabase->update(
            $this->table_name,
            array(
                "title" => $this->title(),
                "image" => $this->image(),
                "description" => $this->description(),
                "modified_by" => $this->modifiedBy(),
                "modified_date" => $this->modifiedDate()),
            array("id" => $this->id()));
        return $status;
    }

    function setValues($data) {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
    }

    function createTable() {
        $sql = 'CREATE TABLE IF NOT EXISTS `contact` (
			      `id` INT(11) NOT NULL AUTO_INCREMENT,
			      `title` VARCHAR(200) NULL DEFAULT NULL,
			      `image` VARCHAR(500) NULL DEFAULT NULL,
			      `description` TEXT NULL DEFAULT NULL,
			      `sort_order` INT(11) NULL DEFAULT NULL,
			      `modified_by` INT(11) NULL DEFAULT NULL,
			      `modified_date` VARCHAR(15) NULL DEFAULT NULL,
			    PRIMARY KEY (`id`) )
			    AUTO_INCREMENT=1;';
        $this->MDatabase->customNoResults($sql);

        // Run on first time
        /*$contact = "INSERT INTO contact(title, description, sort_order) VALUES
                          ('TEAM LK', 'Content here', 0)";
        $this->MDatabase->customNoResults($contact);*/
    }

    function insert() { }

    function delete() { }

    function search() { }

}
