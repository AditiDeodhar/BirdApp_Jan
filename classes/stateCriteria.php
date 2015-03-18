<?php
/**
* The class criteria is used to capture the input by the user. 
* Depending on the user input, appropriate function will be called.
* @author Aditi Deodhar <deodhar.a@gmail.com>
* @copyright Aditi, Dharmaraj, Girish, 2015
*/

class Criteria
{
	// properties 
	protected $_color;
	protected $_state;
	protected $_size;
	
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
	* @param array $color 	list of colors
	*/
	public function processColor()	
	{
		$query = "SELECT * FROM bird_details WHERE bird_body_colors LIKE ";
		
		if (sizeof($this->_color) > 1)
		{
			for ($i=0; $i<sizeof($this->_color); $i++)
			{
				if ($i==0)
				{
					$query = $query. $this->_color[$i];
				}
				else
				{
					$query = $query." ". 'AND'." ". $this->_color[$i];
				}
			}
			echo "The final query is ". $query;
		}
		else
		{
			$query = $query." " ." ". $this->_color[0];
			echo "The final query is". $query;
		}
		return $query;
		
	}
	
}

?>