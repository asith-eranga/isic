<?php

# database.php - database handling.

# Created: 24/05/2010





// no direct access

//defined( '_MEXEC' ) or die( 'Restricted access' );
//require_once("config.php");



class Default_Database{



public $connection;

private $db_host = '';  

private $db_user = '';  

private $db_pass = '';  

private $db_name = ''; 

public $sqlquery;

public $result = array();

public $rowsPerPage = 2;

public $navFirst = '', $navPrev = '', $navLinks = '', $navNext = '', $navLast = '';





	//Class constructor :: Connects to specified database

	public function __construct($host, $database, $dbuser, $dbpassword){							

		

		$this->db_host = $host;  

		$this->db_user = $dbuser;  

		$this->db_pass = $dbpassword;  

		$this->db_name = $database; 

		

		//Connect to database

		$this->connection = mysql_connect($this->db_host,$this->db_user,$this->db_pass);		

		

		//Select database

		if (!mysql_select_db($this->db_name,$this->connection)){

			echo ("Error selecting a database");

			exit();

		}

	}

	

	// Disconnects from the database

	public function disconnect()

	{

	if($this->con){

		if(mysql_close()){$this->con = false;return true;}else{return false;}

	}

	}

	

	// Get last mysql query

	public function getLastQuery(){

		return $this->sqlquery;

	}

	

	

	## -- CHECK FOR TABLE EXISTANCE --

	//How to use :: boolean isTable('TableName');

	public function isTable($table)

    {

		$tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');

        if($tablesInDb){

            if(mysql_num_rows($tablesInDb)==1){

                return true;

            }

            else{

                return false;

            }

        }

    }

	

	

	## -- Prevent SQL Injections --

	public function clean_sql_query($post) {

        foreach($post as $key => $value) {

            // stripslashes, we don't want to rely on magic quotes

            if(get_magic_quotes_gpc()) {

                //$post[$key] = stripslashes($value);

				$post[$key] = mysql_real_escape_string($value);

            }

            // quote if not a number

            if(!is_numeric($value)) {

                $post[$key] = mysql_real_escape_string($value);

            }

        }

        return $post;

	}

	

	## -- INSERT VALUE TO TABLE --

	// How to use :: boolean insert('TableName', array('value1', 'value2', 'value3'), 'col1, col2, col3');

	public function insert($table,$values){

		

		

        if($this->isTable($table)){

			$values = $this->clean_sql_query($values);

            $insert = 'INSERT INTO '.$table;          

			

			//generate column list

			$cols = '(';

			$keys = array_keys($values);

			for($i = 0; $i < count($values); $i++)

           {

                if(is_string($values[$keys[$i]])){

					$cols .= '`'.$keys[$i].'`';

                }

                else{

					$cols .= '`'.$keys[$i].'`';

                }



                // Parse to add commas

                if($i != count($values)-1){

                    $cols .= ', ';

                }

            }

			$cols .= ')';

			

			

            //generate value list

			$valList = " VALUES(";

			for($i = 0; $i < count($values); $i++)

           {

                if(is_string($values[$keys[$i]])){

					$valList .= "'".$values[$keys[$i]]."'";

                }

                else{

					$valList .= $values[$keys[$i]];

                }



                // Parse to add commas

                if($i != count($values)-1){

                    $valList .= ', ';

                }

            }

			$valList .= ")";

			

			$insert = $insert.$cols.$valList;

			

			$this->sqlquery = $insert;

			

            $insert = @mysql_query($insert);

            if($insert){

                return true;

            }else{

                return false;

            }

        }

    }

	

	

	# -- DELETE FROM TABLE

	public function delete($table,$where = null){

        if($this->isTable($table)){

            if($where == null){

                $delete = 'DELETE '.$table;

            }

            else{

                $delete = 'DELETE FROM '.$table.' WHERE '.$where;

            }

			$this->sqlquery = $delete;

			$del = @mysql_query($delete);

			

            if($del){

				return true;

            }

            else{

               return false;

            }

        }

        else{

            return false;

        }

    }

	

	

	# -- UPDATE TABLE

	// How to use :: update('table',array('column_to_update'=>'value'),array('where_column'=>'value')

	public function update($table,$cols,$where)

    {

        if($this->isTable($table)){

			$cols = $this->clean_sql_query($cols);

			$where = $this->clean_sql_query($where);



			//Iterate through WHERE conditions

			$whereStr = '';
			
			$_where_array_keys = array_keys($where);

			$last_key = end($_where_array_keys);

			foreach($where as $whereCol => $whereValue){

				$whereStr .= $whereCol.' = '.$whereValue;

				if($whereCol == $last_key){

					//last index

				}else{

					//not last index

					$whereStr .= ' AND ';

				}

			}

			



            $update = 'UPDATE '.$table.' SET ';

            $keys = array_keys($cols);

            for($i = 0; $i < count($cols); $i++){

                if(is_string($cols[$keys[$i]])){

                    $update .= '`'.$keys[$i].'`'.'="'.$cols[$keys[$i]].'"';



                }

                else{

                    $update .= '`'.$keys[$i].'`'.'='.$cols[$keys[$i]];

                }



                // Parse to add commas

                if($i != count($cols)-1){

                    $update .= ', ';

                }

            }

            $update .= ' WHERE '.$whereStr;

			

			

			$this->sqlquery = $update;

            $query = @mysql_query($update);

            if($query){

                return true;

            }

            else{

                return false;

            }

        }

        else{

            return false;

        }

    }





	# -- SELECT FROM TABLE

	public function select($table, $rows = '*', $where = null, $order = null, $pageNumber=0)

    {

	

		$this->result = null;

        $q = 'SELECT '.$rows.' FROM '.$table;

        if($where != null)

            $q .= ' WHERE '.$where;

        if($order != null)

            $q .= ' ORDER BY '.$order;

		

		//Pagination

		if($pageNumber>0){

			


			$query = @mysql_query($q);

        	if($query)

			$resultRows = mysql_num_rows($query);

			$this->generatePageLinks($pageNumber, $resultRows);

			

			$offset = ($pageNumber - 1) * $this->rowsPerPage;

			$q .= " LIMIT $offset, $this->rowsPerPage";

		}

		

       if($this->isTable($table))

       {

		$this->sqlquery = $q;

        $query = @mysql_query($q);

        if($query)

        {

            $this->numResults = mysql_num_rows($query);

			



	        for($i = 0; $i < $this->numResults; $i++)

            {

                $r = mysql_fetch_array($query);

				

                $key = array_keys($r);

                for($x = 0; $x < count($key); $x++)

                {

                    // Sanitizes keys so only alphavalues are allowed

					if(!is_int($key[$x]))

                    {

                        if(mysql_num_rows($query) > 1)

                            $this->result[$i][$key[$x]] = stripslashes($r[$key[$x]]);

                        else if(mysql_num_rows($query) < 1)

                            $this->result = null;

                        else

						$this->result[$i][$key[$x]] = stripslashes($r[$key[$x]]);

                        //$this->result[$key[$x]] = $r[$key[$x]];					

                    }

                }

            }

            return true;

        }

        else{

            return false;

        }

        }

		else

		  return false;

    }

	

	

	# -- GENERATE PAGE LINKS ::

	private function generatePageLinks($pageNum, $resultRows){

		$maxPage = ceil($resultRows/$this->rowsPerPage);

		

		$pageName = $_SERVER['PHP_SELF'];

		$this->navLinks  = '';

		

		for($page = 1; $page <= $maxPage; $page++){

		   if ($page == $pageNum) {

			  $this->navLinks .= " $page "; // current page

		   }

		   else{

			  $this->navLinks .= " <a href=\"$pageName?page=$page\">$page</a> ";

		   }

		}

		

		if ($pageNum > 1){

		   $page  = $pageNum - 1;

		   $this->navPrev  = " <a href=\"$pageName?page=$page\">&laquo; prev</a> ";		

		   $this->navFirst = " <a href=\"$pageName?page=1\">[First Page]</a> ";

		}

		else{

		   $this->navPrev  = '&nbsp;';

		   $this->navFirst = '&nbsp;';

		}

		

		if ($pageNum < $maxPage){

		   $page = $pageNum + 1;

		   $this->navNext = " <a href=\"$pageName?page=$page\">next &raquo;</a> ";		

		   $this->navLast = " <a href=\"$pageName?page=$maxPage\">[Last Page]</a> ";

		}

		else{

		   $this->navNext = '&nbsp;';

		   $this->navLast = '&nbsp;';

		}

		

	}

	

	public function viewPagination(){

		echo $this->navPrev. $this->navLinks . $this->navNext;

	}





	public function getNextId($tbl_name){

		$query = mysql_query("select auto_increment from information_schema.TABLES where TABLE_NAME='".$tbl_name."' and TABLE_SCHEMA='".$this->db_name."'");

		$row = mysql_fetch_array($query);

		return $row['auto_increment'];

	}

	public function custom($q){


						$query = @mysql_query($q);
			
						$this->numResults = mysql_num_rows($query);
			
						for($i = 0; $i < $this->numResults; $i++)
			
						{
			
							$r = mysql_fetch_array($query);
			
			
			
							$key = array_keys($r);
			
							for($x = 0; $x < count($key); $x++)
			
							{
			
								// Sanitizes keys so only alphavalues are allowed
			
								if(!is_int($key[$x]))
			
								{
			
									if(mysql_num_rows($query) > 1)
			
										$this->result[$i][$key[$x]] = stripslashes($r[$key[$x]]);
			
									else if(mysql_num_rows($query) < 1)
			
										$this->result = null;
			
									else
			
									$this->result[$i][$key[$x]] = stripslashes($r[$key[$x]]);
			
									//$this->result[$key[$x]] = $r[$key[$x]];					
			
								}
			
							}
			
						}	
	

	
	}

	public function customNoResults($q){
		$query = mysql_query($q);
		return $query;
	}




	public function cleanValue($value){
	
		return mysql_real_escape_string($value);
		
	}


}







?>