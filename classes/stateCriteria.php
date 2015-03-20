<?php
/**
* The class stateCriteria is used to capture the state input entered by the user. 
* The data will be processed and the query will be formulated and returned to the birdid.php
* @author Aditi Deodhar <deodhar.a@gmail.com>
* @copyright Aditi, Dharmaraj, Girish, 2015
*/

class stateCriteria
{
	// properties 
	protected $_state;
	
	// methods	
	public function __construct($state)
	{		
		$this->_state = $state;		
	}
	public function getState()
	{
		return $this->_state;
	}
	
	/**
	* This function passes list of states as entered by the user to the function querying the database.
	* @param array $state 	list of states
	*/
	public function processState()	
	{
		if(sizeof($this->_state) == 0)
		{
			$query = "SELECT * FROM bird_details";
		}
		else
		{
			$query = "SELECT * FROM bird_details WHERE bird_state LIKE ";
			
			for ($i=0; $i<sizeof($this->_state); $i++)
			{
				if ($i==0)
				{
					$query_append = "'".'%'. $this->_state[$i]. '%'."'";
					$query = $query. $query_append;
				}
				else
				{					
					$query_append = "bird_state LIKE "."'".'%'. $this->_state[$i]. '%'."'";
					$query = $query." ". 'AND'." ".$query_append;
				}
							
			}
		}		
		return $query;		
	}	
}
?>