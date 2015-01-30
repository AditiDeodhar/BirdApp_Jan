<?php
/********************************************************************
This script contains database class that handles database connection
Date: 27th January 2015
Author: Aditi Deodhar (deodhar.a@gmail.com)
********************************************************************/

// Class definition
class DB 
{
	protected $dbname = 'birds';
	protected $username = 'root';
	protected $password = 'root';
	protected $servername = 'localhost';


	// This function opens connection to the database. It is called on every page where there is a database 
	//operation
	public function connect() 
	{
		$connection = mysql_connect($this->$servername, $this->$username, $this->$password);
		mysql_select_db($this->$dbname);
		return true;
	}

	// This functions takes  a mysql row set and returns an associative array, where the keys in the array are 
	// column names in the row set. 
	// If singleRow is set to true, then it will return a single row instead of an array of rows
	public function processRowSet($rowSet, $singleRow=false)
	{
		$resultArray = array();
		while ($row = mysql_fetch_assoc($rowSet))
		{
			array_push($resultArray, $row);
		}
		if ($singleRow == true)
		{
			return $resultArray[0];
		}
		return $resultArray;
	}

	// This function selects rows from the database. It returns a row or rows from $table using $where as where 
	// clause. The returned value is an associative array
	public function select($table, $where) 
	{
		$sql = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
		{
			return $this->processRowSet($result, true);
		}
		return $this->processRowSet($result);
	}
}
?>
