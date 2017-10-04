<?php

class Default_DBConnection{

protected $MDatabase;

      function __construct() {

        $this->MDatabase = $MDatabase = new Default_Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        $this->MDatabase->rowsPerPage = 10;

      } 

}

?>