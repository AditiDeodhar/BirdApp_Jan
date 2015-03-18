<?php

	// include the class files
	require_once '/classes/colorCriteria.php';
	require_once '/classes/sizeCriteria.php';
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
	
	//if both the inputs are entered as "Not Sure", there is no point going ahead
	if (sizeof($colors) == 0 AND $size == 'Not Sure')
	{
		$output = "No selection is made, hence displaying no result";
		echo $output;
		exit();
	}
	//Process each input
	
	// create an instance of the class colorCriteria
	// If user has entered only "Not Sure, then the array would be empty. If it is so, no need to proceed with color processing
	if (sizeof($colors) > 0)
	{
		//create instance of class colorCriteria
		$colorlist = new colorCriteria($colors);

		// send the color list entered by the user to the colorCriteria class for processing. It will return a formulated query 
		
		$dbquery = $colorlist->processColor();
		echo "the dbquery is ". $dbquery;
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
	}
	
	// create an instance of the class sizeCriteria
	// If user has entered only "Not Sure, then no need to proceed with size processing
	if ($size != 'Not Sure')
	{
		//create instance of class sizeCriteria
		$bird_size = new sizeCriteria($size);

		// send the size entered by the user to the sizeCriteria class for processing. It will return a formulated query 
		
		$dbquery = $bird_size->processSize();
		echo "the dbquery is ". $dbquery;
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
	}
	
	
	
?>