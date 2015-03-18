<?php
/**
* The class sizeCriteria is used to capture the input by the user. 
* The data will be processed and the query will be formulated and returned to the birdid.php
* @author Aditi Deodhar <deodhar.a@gmail.com>
* @copyright Aditi, Dharmaraj, Girish, 2015
*/

class sizeCriteria
{
	// properties 
	protected $_size;
	
	// methods	
	public function __construct($size)
	{		
		$this->_size = $size;		
	}
	public function getSize()
	{
		return $this->_size;
	}
	
	/**
	* This function passes the size as entered by the user to the function querying the database.
	* @param array $size 	size specification
	*/
	public function processSize()	
	{
		if($this->_size == 'crow')
		{
			$query= "Select * from bird_details where bird_size = '$size'";
		}
		elseif( $this->_size == 'crow+')
		{
			$query= "Select * from bird_details where bird_size in ('crow+', 'kite-', 'kite', 'kite+', 'hen', 'hen-', 'hen+')";
		}
		elseif ( $this->_size == 'crow-kite')
		{
			$query= "Select * from bird_details where bird_size in ('crow+', 'kite-', 'kite', 'hen', 'hen-', 'hen+')";
		}
		elseif ( $this->_size == 'kite+')
		{
			$query= "Select * from bird_details where bird_size = '$size'";
		}
		elseif ($this->_size == 'crow-')
		{
			$query= "Select * from bird_details where bird_size in ('crow-', 'sparrow+', 'sparrow', 'sparrow-', 'myna', 'myna-', 'myna+', 'pigeon', 'pigeon-', 'pigeon+')";
		}
		elseif ($this->_size == 'sparrow-')
		{
			$query= "Select * from bird_details where bird_size = '$size'";
		}
		elseif ($this->_size == 'sparrow-crow')
		{
			$query= "Select * from bird_details where bird_size in ('sparrow', 'sparrow+', 'myna-', 'myna', 'myna+', 'pigeon-', 'pigeon', 'pigeon+', 'crow-')";
		}
		else
		{
			// If no size is selected, please retrieve all the birds			
			$query = "Select * from bird_details";
		}
			
		return $query;		
	}	
}

?>