<?php
/************************************************************************************************
This class records the criteria entered by the user and accordingly sets the variables
Date: 28th January 2015
Author: Aditi Deodhar (deodhar.a@gmail.com)
************************************************************************************************/
require_once DB.class.php;

class UserCriteria
{
	public $colour;
	public $size;
	public $state;
	public $bill_type;
	public $crest_type;
	public $tail_type;
	public $bill_type;
	public $leg_type;
	
	// Constructor
	function __construct($data)
	{
		$this->colour = (isset($data['bird_body_colours'])) ? $data['bird_body_colours']: "";
		$this->size = (isset($data['bird_size'])) ? $data['bird_size']: "";
		$this->state = (isset($data['state_name'])) ? $data['state_name']: "";
		$this->bill_type = (isset($data['bird_bill_type_name'])) ? $data['bird_bill_type_name']: "";
	}
	
}

?>