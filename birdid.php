<?php

	// include the class files
	require_once '/classes/colorCriteria.php';
	require_once '/classes/sizeCriteria.php';
	require_once '/classes/stateCriteria.php';
	require_once '/classes/DB.php';
	
	// variable declaration
	
	// database-related 
	$host = 'localhost';
	$user = 'root';
	$password = 'root';
	$database = 'birds';
	
	// Accept the variables entered by the user
	
	// input:color
	$colors = array();
		
	foreach ($_POST['color'] as $bodycolour)
	{
		//if user has entered "Not Sure", don't insert it into array. Break statement skips that iteration
		if (strcmp($bodycolour,'Not Sure') ==0)
		{
			echo "You have selected \"Not Sure\" for color";	
			break;		
		}
		array_push ($colors, $bodycolour);		
	}	
	// input:size
	$size = $_POST['size'];
	
	//input:state
	$state = array();
	
	foreach ($_POST['state'] as $instate)
	{
		//if user has entered "Not Idea", don't insert it into array. Break statement skips that iteration
		if (strcmp($instate,'No Idea') == 0)
		{
			echo "You have selected \"No Idea\" for state";			
			break;		
		}
		array_push ($state, $instate);		
	}
	
	//if all the 3 inputs are entered as non conclusive, there is no point going ahead
	if (sizeof($colors) == 0 AND $size == 'Not Sure' AND sizeof($state) == 0)
	{
		$output = "No selection is made, hence displaying no result";
		echo $output;
		exit();
	}	
	
	//Process each input
	
	// create an instance of the class colorCriteria
	$colorlist = new colorCriteria($colors);
		
	// send the color list entered by the user to the colorCriteria class for processing. It will return a formulated query 		
	$dbquery = $colorlist->processColor();
	echo "The color dbquery is ". $dbquery;
	echo "<br>";
	// Connect to the database
	$dbconnect = new DB($host, $user, $password, $database);
	
	// query the Database
	$bird_color_list = $dbconnect->db_query($dbquery);
	
	// display the result. bird_color_list array will contain only those birds having all colors entered by the user	
	for ($i=0; $i< sizeof($bird_color_list);$i++)
	{		
		echo "<br>";
		echo "The Result is ". $bird_color_list[$i];		
	}	
	
	//create instance of class sizeCriteria
	$bird_size = new sizeCriteria($size);

	// send the size entered by the user to the sizeCriteria class for processing. It will return a formulated query 		
	$dbquery = $bird_size->processSize();
	echo "The size dbquery is ". $dbquery;
	echo "<br>";
	// Connect to the database
	$dbconnect = new DB($host, $user, $password, $database);
	
	// query the Database
	$bird_size_list = $dbconnect->db_query($dbquery);
	
	// display the result. bird_size_list array will contain only those birds of the size entered by the user	
	for ($i=0; $i< sizeof($bird_size_list);$i++)
	{		
		echo "<br>";
		echo "The Result is ". $bird_size_list[$i];		
	}	
	
	// create an instance of the class stateCriteria
	   $bird_state = new stateCriteria($state);
	
	// send the state/s entered by the user to the stateCriteria class for processing. It will return a formulated query
	$dbquery = $bird_state->processState();
	echo "The state dbquery is ". $dbquery;
	echo "<br>";
	// Connect to the database
	$dbconnect = new DB($host, $user, $password, $database);
	
	// query the database
	$bird_state_list = $dbconnect->db_query($dbquery);
	
	// display the result. bird_state_list array will contain only those birds of the state entered by the user	
	for ($i=0; $i< sizeof($bird_state_list);$i++)
	{		
		echo "<br>";
		echo "The Result is ". $bird_state_list[$i];		
	}
	// From the arrays bird_color_list, bird_size_list and bird_state_list, find out the records common to all the 3 arrays
	// Use the function intersect() to compare the 3 arrays. 
	$bird_final_list = array_intersect($bird_color_list, $bird_size_list, $bird_state_list);
	print_r($bird_final_list);
	"The final result is ";
	echo "The size of the final array is ". sizeof($bird_final_list);
	for ($i=0; $i< sizeof($bird_final_list);$i++)
	{		
		echo "The final list is ". $bird_final_list[$i];
	}
	
?>