<?php

class Mod_Discounts extends Default_DBConnection implements Default_DBInterface {

      private $id;
      private $name;
    private $page_title;
    private $meta_title;
    private $meta_description;
    private $meta_keywords;
    private $discount;
    private $map_embed_code_src;
    private $page_url;
	  private $description;
      private $display_type;
      private $card_type;
      private $category;
      private $image;
    private $logo;
	  private $sort_order;
      private $status;
      private $created_by;
      private $created_date;
      private $modified_by;
      private $modified_date;
      private $table_name = "discounts";

      function id() {
            return $this->id;
      }

      function name() {
        return $this->name;
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

    function discount() {
        return $this->discount;
    }

    function mapEmbedCodeSRC() {
        return $this->map_embed_code_src;
    }

    function pageUrl() {
        return $this->page_url;
    }

      function description() {
          return $this->description;
      }

      function displayType() {
          return $this->display_type;
      }

      function cardType() {
          return $this->card_type;
      }

      function category() {
          return $this->category;
      }

      function image() {
            return $this->image;
      }

    function logo() {
        return $this->logo;
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

    function setDiscount($discount) {
        $this->discount = $discount;
    }

    function setMapEmbedCodeSRC($map_embed_code_src) {
        $this->map_embed_code_src = $map_embed_code_src;
    }

    function setPageUrl($page_url) {
        $this->page_url = $page_url;
    }

      function setDescription($description) {
          $this->description = $description;
      }

      function setDisplayType($display_type) {
          $this->display_type = $display_type;
      }

      function setCardType($card_type) {
          $this->card_type = $card_type;
      }

      function setCategory($category) {
          $this->category = $category;
      }

      function setImage($image) {
            $this->image = $image;
      }

    function setLogo($logo) {
        $this->logo = $logo;
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
          $this->setPageTitle($results[$row]['page_title']);
          $this->setMetaTitle($results[$row]['meta_title']);
          $this->setMetaDescription($results[$row]['meta_description']);
          $this->setMetaKeywords($results[$row]['meta_keywords']);
            $this->setDiscount($results[$row]['discount']);
            $this->setMapEmbedCodeSRC($results[$row]['map_embed_code_src']);
          $this->setPageUrl($results[$row]['page_url']);
            $this->setDescription($results[$row]['description']);
            $this->setDisplayType($results[$row]['display_type']);
            $this->setCardType($results[$row]['card_type']);
            $this->setCategory($results[$row]['category']);
            $this->setImage($results[$row]['image']);
            $this->setLogo($results[$row]['logo']);
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

            $this->MDatabase->select($this->table_name, "*", " status=1 ", "sort_order ASC");
            return $this->MDatabase->result;
      }

      function selectAllNormal($page) {

        $this->MDatabase->select($this->table_name, "*", "display_type=0 AND status=1 ", "sort_order ASC", $page);
        return $this->MDatabase->result;
      }

      function selectAllFeatured() {

        $this->MDatabase->select($this->table_name, "*", "display_type=1 AND status=1 ", "sort_order ASC");
        return $this->MDatabase->result;
      }

      function selectAllCount() {

            $this->MDatabase->select($this->table_name, "*", "", "sort_order ASC");
            return $this->MDatabase->result;
      }

      function getById() {

            $this->MDatabase->select($this->table_name, "*", "id='" . $this->id() . "'", "sort_order DESC");
            return $this->MDatabase->result;
      }

      function getByName() {

            $this->MDatabase->select($this->table_name, "*", "LOWER(name) LIKE '%" . $this->name() . "%' OR LOWER(description) LIKE '%" . $this->name() . "%'", "sort_order DESC");
            return $this->MDatabase->result;
      }

    function getByCardType() {
        $this->MDatabase->select($this->table_name, "*", $this->cardType() . " IN (card_type) AND display_type = " . $this->displayType(), "sort_order DESC");
        return $this->MDatabase->result;
    }

    function getByCategoryType() {
        $this->MDatabase->select($this->table_name, "*", $this->category() . " IN (category) AND display_type = " . $this->displayType(), "sort_order DESC");
        return $this->MDatabase->result;
    }

    function getByCardTypeAndCategoryType($card, $category) {
        $this->MDatabase->select($this->table_name, "*",  $card ." IN (card_type) AND " . $category . " IN (category) AND display_type = " . $this->displayType(), "sort_order DESC");
        return $this->MDatabase->result;
    }

    function getByPageUrl() {

        $this->MDatabase->select($this->table_name, "*", "page_url='" . $this->pageUrl() . "'", "id ASC");
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
                "page_title" => $this->pageTitle(),
                "meta_title" => $this->metaTitle(),
                "meta_description" => $this->metaDescription(),
                "meta_keywords" => $this->metaKeywords(),
                "discount" => $this->discount(),
                "map_embed_code_src" => $this->mapEmbedCodeSRC(),
                "page_url" => str_replace(' ', '-', strtolower($this->pageUrl())),
                "description" => $this->description(),
                "display_type" => $this->displayType(),
                "card_type" => $this->cardType(),
                "category" => $this->category(),
                "image" => $this->image(),
                "logo" => $this->logo(),
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
                "page_title" => $this->pageTitle(),
                "meta_title" => $this->metaTitle(),
                "meta_description" => $this->metaDescription(),
                "meta_keywords" => $this->metaKeywords(),
                "discount" => $this->discount(),
                "map_embed_code_src" => $this->mapEmbedCodeSRC(),
                "page_url" => str_replace(' ', '-', strtolower($this->pageUrl())),
                "description" => $this->description(),
                "display_type" => $this->displayType(),
                "card_type" => $this->cardType(),
                "category" => $this->category(),
                "image" => $this->image(),
                "logo" => $this->logo(),
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
					CREATE TABLE IF NOT EXISTS `discounts` (
					`id` INT(11) NOT NULL AUTO_INCREMENT,
					`name` VARCHAR(200) NULL DEFAULT NULL,
					`page_title` VARCHAR(200) NULL DEFAULT NULL,
				    `meta_title` VARCHAR(200) NULL DEFAULT NULL,
				    `meta_description` VARCHAR(200) NULL DEFAULT NULL,
				    `meta_keywords` VARCHAR(200) NULL DEFAULT NULL,
					`discount` VARCHAR(50) NULL DEFAULT NULL,
					`map_embed_code_src` VARCHAR(500) NULL DEFAULT NULL,
					`page_url` VARCHAR(300) NULL DEFAULT NULL,
					`description` TEXT NULL DEFAULT NULL,
					`display_type` TEXT NULL DEFAULT NULL,
					`card_type` TEXT NULL DEFAULT NULL,
					`category` VARCHAR(200) NULL DEFAULT NULL,
					`image` VARCHAR(500) NULL DEFAULT NULL,
					`logo` VARCHAR(500) NULL DEFAULT NULL,						
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
            $data = $variable_manager->getVariableValue("mod_discounts_status", array("value" => "Disable,Enable", "mod_name" => "mod_discounts"));

            return explode(",", $data);
      }

      function getAllDisplayTypes() {

            $variable_manager = new VariableManager();
            $data = $variable_manager->getVariableValue("mod_discounts_display_types", array("value" => "Normal,Special", "mod_name" => "mod_discounts"));

            return explode(",", $data);
      }

      function getAllCardTypes() {

            $variable_manager = new VariableManager();
            $data = $variable_manager->getVariableValue("mod_discounts_card_types", array("value" => "ISIC,ITIC,IYTC", "mod_name" => "mod_discounts"));

            return explode(",", $data);
      }

      function getAllCategories() {

            $variable_manager = new VariableManager();
            $data = $variable_manager->getVariableValue("mod_discounts_categories", array("value" => "ACCOMMODATION,ACTIVITIES,ATTRACTIONS,DINING AND TAKEAWAY,EDUCATION,ENTERTAINMENT", "mod_name" => "mod_discounts"));

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
