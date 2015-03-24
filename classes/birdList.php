<?php
/**
* The class colorCriteria is used to capture the color input entered by the user. 
* The data will be processed and the query will be formulated and returned to the birdid.php
* @author Aditi Deodhar <deodhar.a@gmail.com>
* @copyright Aditi, Dharmaraj, Girish, 2015
*/

class birdList
{
	// properties 
	protected $_list;
		
	// methods	
	public function __construct($list)
	{		
		$this->_list = $list;		
	}
	public function getList()
	{
		return $this->_list;
	}
	
	/**
	* This function passes list of colors as entered by the user to the function querying the database.
	* It formulates the complete query and passes back to called program
	* @param array $color 	list of colors
	*/
	
	public function processList()	
	{
		$count = 0;
		$query = "SELECT bird_sci_name, bird_comm_eng_name, bird_sex, bird_image FROM bird_details WHERE bird_id in ( ";
		
		//for ($i=0; $i<sizeof($this->_list); $i++)
		foreach ($this->_list as $ind => $ind_value)
		{
			if ($count==0)
			{
				$query_append = $ind_value;
				$query = $query. $query_append;
				$count++;
				echo "Hey, I am in IF";
			}
			else
			{					
				$query_append = ",". $ind_value;
				$query = $query.$query_append;
			}
						
		}
		$query = $query . ")";
		//echo "The final query is ". $query;
		return $query;		
	}
	
}

?>