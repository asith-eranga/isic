<?php

class Mod_SEO extends Default_DBConnection implements Default_DBInterface {

    private $id;
    private $page_name;
    private $page_title;
    private $meta_title;
    private $meta_description;
    private $meta_keywords;
    private $modified_by;
    private $modified_date;
    private $table_name = "seo";

    function id() {
        return $this->id;
    }
	  
    function pageName() {
        return $this->page_name;
    }

    function pageTitle() {
        return $this->page_title;
    }

    function metaTitle() {
        return $this->meta_title;
    }

    function metaDescription() {
        return $this->meta_description;
    }

    function metaKeywords() {
        return $this->meta_keywords;
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
	  
    function setPageName($page_name) {
        $this->page_name = $page_name;
    }

    function setPageTitle($page_title) {
        $this->page_title = $page_title;
    }

    function setMetaTitle($meta_title) {
        $this->meta_title = $meta_title;
    }

    function setMetaDescription($meta_description) {
        $this->meta_description = $meta_description;
    }

    function setMetaKeywords($meta_keywords) {
        $this->meta_keywords = $meta_keywords;
    }

    function setModifiedBy($modified_by) {
        $this->modified_by = $modified_by;
    }

    function setModifiedDate($modified_date) {
        $this->modified_date = $modified_date;
    }

    function extractor($results, $row = 0) {
        $this->setId($results[$row]['id']);
	    $this->setPageName($results[$row]['page_name']);
        $this->setPageTitle($results[$row]['page_title']);
        $this->setMetaTitle($results[$row]['meta_title']);
        $this->setMetaDescription($results[$row]['meta_description']);
        $this->setMetaKeywords($results[$row]['meta_keywords']);
        $this->setModifiedBy($results[$row]['modified_by']);
        $this->setModifiedDate($results[$row]['modified_date']);
    }

    function selectAllPaginated($page) {
        $this->MDatabase->select($this->table_name, "*", "", "id ASC", $page);
        return $this->MDatabase->result;
    }

    function selectAll() {
        $this->MDatabase->select($this->table_name, "*", " status=1 ", "id ASC");
        return $this->MDatabase->result;
    }

    function selectAllCount() {
        $this->MDatabase->select($this->table_name, "COUNT(*) as count", " ", "id ASC");
        return $this->MDatabase->result[0]["count"];
    }

    function getById() {
        $this->MDatabase->select($this->table_name, "*", "id='" . $this->id() . "'", "id DESC");
        return $this->MDatabase->result;
    }

    function searchPaginated($search_text, $page) {
        $search_txt = Default_Common::textToSQLLikeString($search_text);
        $this->MDatabase->select($this->table_name, "*", "page_name $search_txt", 'page_name ASC', $page);
        return $this->MDatabase->result;
    }

    function searchCount($search_text) {
        $search_txt = Default_Common::textToSQLLikeString($search_text);
        $this->MDatabase->select($this->table_name, "COUNT(*) as count", "page_name $search_txt", 'page_name ASC');
        return $this->MDatabase->result[0]["count"];
    }

    function update() {
        $status = $this->MDatabase->update(
            $this->table_name,
            array(
                "page_title" => $this->pageTitle(),
                "meta_title" => $this->metaTitle(),
                "meta_description" => $this->metaDescription(),
                "meta_keywords" => $this->metaKeywords(),
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
        $sql = 'CREATE TABLE IF NOT EXISTS `seo` (
			      `id` INT(11) NOT NULL AUTO_INCREMENT,
			      `page_name` VARCHAR(200) NULL DEFAULT NULL,
			      `page_title` VARCHAR(500) NULL DEFAULT NULL,
			      `meta_title` VARCHAR(500) NULL DEFAULT NULL,
			      `meta_description` VARCHAR(500) NULL DEFAULT NULL,
			      `meta_keywords` TEXT NULL DEFAULT NULL,
			      `modified_by` INT(11) NULL DEFAULT NULL,
			      `modified_date` VARCHAR(15) NULL DEFAULT NULL,
			    PRIMARY KEY (`id`) )
			    AUTO_INCREMENT=1;';
        $this->MDatabase->customNoResults($sql);

        // Run on first time
        /*$seo = "INSERT INTO seo(page_name, page_title, meta_title, meta_description, meta_keywords) VALUES
                          ('Home', '', '', '', ''),
                          ('About us', '', '', '', ''),
                          ('Cards', '', '', '', ''),
                          ('Discounts', '', '', '', ''),
                          ('Partner with ISIC', '', '', '', ''),
                          ('Travel with us', '', '', '', ''),
                          ('Take a vacation', '', '', '', ''),
                          ('Fly now pay later', '', '', '', ''),
                          ('Contacts us', '', '', '', ''),
                          ('Get your card', '', '', '', '')";
        $this->MDatabase->customNoResults($seo);*/
    }

    function insert() { }

    function delete() { }

    function search() { }

}
