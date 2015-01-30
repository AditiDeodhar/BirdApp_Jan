<?php
/*************************************************************************************
This class is for accepting user input, Colour and make a query to the bird_details 
table. 
Date: 28th January 2015
Author: Aditi Deodhar (deodhar.a@gmail.com)
*************************************************************************************/
require_once DB.class.php;

class GetColour
{
	$colours = array();
	
	// @param Colour $colour
	// @return ColourSorted[]
	
	function ProcessColour ($bird_colours)
	{
		$this->colours = $bird_colours;
		$ColourSorted = array();
		$query = "body_colour like";
		$db = new DB();
		for ($i=0;$i<sizeof($this->colors),$i++)
		{
			$query_append = '%$this->colours[$i]%';
			if($i==0)
			{
				$query = $query . $query_append;
			}
			else
			{
				$query = $query . 'AND' . $query_append;
			}
			$ColourSorted = $db->select('bird_details', $query);  
		}
	}
}
?>