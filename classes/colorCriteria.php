<?php
/**
* The class colorCriteria is used to capture the color input entered by the user. 
* The data will be processed and the query will be formulated and returned to the birdid.php
* @author Aditi Deodhar <deodhar.a@gmail.com>
* @copyright Aditi, Dharmaraj, Girish, 2015
*/

class colorCriteria
{
	// properties 
	protected $_color;
		
	// methods	
	public function __construct($color)
	{		
		$this->_color = $color;		
	}
	public function getColor()
	{
		return $this->_color;
	}
	
	/**
	* This function passes list of colors as entered by the user to the function querying the database.
	* It formulates the complete query and passes back to called program
	* @param array $color 	list of colors
	*/
	
	public function processColor()	
	{
		$query = "SELECT * FROM bird_details WHERE bird_body_colors LIKE ";
		
		for ($i=0; $i<sizeof($this->_color); $i++)
		{
			if ($i==0)
			{
				$query_append = "'".'%'. $this->_color[$i]. '%'."'";
				$query = $query. $query_append;
			}
			else
			{					
				$query_append = "bird_body_colors LIKE "."'".'%'. $this->_color[$i]. '%'."'";
				$query = $query." ". 'AND'." ".$query_append;
			}
						
		}
		
		return $query;
		
	}
	
}

?>