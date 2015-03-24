<?php
/**
* This class handles all database interactions, like connecting to the database and querying the database.
* @author Aditi Deodhar <deodhar.a@gmail.com>
* @copyright Aditi, Dharmaraj, Girish, 2015
*/
class DB
{
	//properties
	protected $_connection;
	
	//methods
	public function __construct($host, $username, $password, $dbname)
	{
		$this->_connection = @new mysqli($host, $username, $password, $dbname);
		if(mysqli_connect_error())
		{
			throw new RuntimeException('Cannot access the database: '. mysqli_connect_error());
		}
	}
	
	/**
	* This function actually queries the database and returns the result to the called program
	* @param string	It is a query sent by the called program
	*/
	public function db_query($query)
	{
		// Make a query to the database
		$output= mysqli_query($this->_connection, $query);
						
		// Define array into which result of the query will be stored
		$bird_list = array();
		// Fetch whole data returned by the query
		while ($row = mysqli_fetch_array($output, MYSQLI_BOTH))
		{
			$record = $row['bird_id'];
			array_push($bird_list, $record);
		}		
		return($bird_list);
	}	
	
	/**
	* This function actually queries the database and returns the result to the called program
	* @param string	It is a query sent by the called program
	*/
	public function db_final_query($query)
	{
		// Make a query to the database
		$output= mysqli_query($this->_connection, $query);
						
		// Define array into which result of the query will be stored
		$bird_list = array();
		// Fetch whole data returned by the query
		while ($row = mysqli_fetch_array($output, MYSQLI_BOTH))
		{			
			$record = $row['bird_sci_name']. $row['bird_comm_eng_name']. $row['bird_sex'].'<img src ="'. $row['bird_image'].'" height = "100" width = "100"/>';
			array_push($bird_list, $record);
		}		
		return($bird_list);
	}	
}
?>