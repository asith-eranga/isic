<?php

interface Default_DBInterface{

	public function selectAll();
	public function selectAllPaginated($page);
	public function selectAllCount();
	public function getById();
	public function search();
	public function searchPaginated($search_text,$page);
	public function searchCount($search_text);
	public function insert();
	public function update();
	public function delete();

}

?>