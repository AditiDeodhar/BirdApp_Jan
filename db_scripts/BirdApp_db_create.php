<?php
/**
* This script is a one-time-use script creating database and database tables
* Database name: birds
* Database tables in order of their dependencies
*				bird_details				
*				state_details
*				bird_state
*				place_details		
* @Author: Aditi Deodhar <deodhar.a@gmail.com>
* @copyright: Aditi, Dhararaj, Girish, 2015
*/

$servername = 'localhost';
$username = 'root';
$password = 'root';

// Connect to the database
$link = mysql_connect($servername, $username, $password);
if (!$link)
{	
	$output = 'Unable to connect to the database';
	echo $output;
	exit();
}
echo $link. "<br>";
/*
// configure it to use UTF-8 encoding
if (!mysql_set_charset($link, 'utf8'))
{
	$output = 'Unable to set database connection encoding';
	echo $output;
	exit();	
}
*/

// Create Database 
$query = "CREATE DATABASE birds";
if(mysql_query($query))
{
	echo "Database Created Successfully";
	echo "\n";
}
else
{
	die("Database Creation Failed:". mysql_error($link));
}


// Select database
if(!mysql_select_db('Birds'))
{
	$output = 'Unable to locate the database';
	echo $output;
	echo "\n";
	exit();
}

// If none of the conditions above are true, then database connection with utf-8 encoding is established successfully
// and the desired database is selected

// Display database connection successful message
$output = 'Database Birds is selected';
echo $output;
echo "<br>";

// Create table bird_details
$query= "CREATE TABLE if not exists `bird_details`
(
	bird_id				int(5)		auto_increment,
	bird_sci_name		varchar(50),
	bird_comm_eng_name	varchar(100),
	bird_body_colors	varchar(120),
	bird_sex			varchar(1),
	bird_size			varchar(10),
	bird_image			varchar(500),
	bird_tail_type		varchar(20),
	bird_crest_type		varchar(20),
	bird_bill_type		varchar(20),
	bird_leg_type		varchar(20),
	PRIMARY KEY (bird_id)
)";
if(mysql_query($query))
{
	echo "Database Table bird_details created successfully";
	echo "<br>";
}
else
{
	echo "Table creation bird_details failed:". mysql_error($link),"<br>";
}

// Create table state_details
$query= "CREATE TABLE if not exists `state_details`
	(
		state_id						int(5)		auto_increment,
		state_name						varchar(30),
		state_union_territory_flag		varchar(1),
		PRIMARY KEY (state_id)
	)";
if(mysql_query($query))
{
	echo "Database Table state_details created successfully";
	echo "<br>";
}
else
{
	echo "Table creation state_details failed:". mysql_error($link)."<br>";
}

// Create table bird_state
$query= "CREATE TABLE if not exists `bird_state`
	(
		bird_state_id			int(5)		auto_increment,
		bird_id					int(5),
		state_id				int(5),
		PRIMARY KEY (bird_state_id),
		FOREIGN KEY (bird_id)	REFERENCES	bird_details(bird_id),
		FOREIGN KEY (state_id)	REFERENCES	state_details(state_id)
	)";
if(mysql_query($query))
{
	echo "Database Table bird_state created successfully";
	echo "<br>";
}
else
{
	echo "Table creation bird_state failed:". mysql_error($link)."<br>";
}

// Create table place_details
$query= "CREATE TABLE if not exists `place_details`
	(
		place_id				int(5)		auto_increment,
		place_name				varchar(40),
		place_details			varchar(250),
		place_type				varchar(10),
		state_id				int(5),
		PRIMARY KEY (place_id),
		FOREIGN KEY (state_id)	REFERENCES	state_details(state_id)
	)";
if(mysql_query($query))
{
	echo "Database Table place_details created successfully";
	echo "<br>";
}
else
{
	echo "Table creation place_details failed:". mysql_error($link)."<br>";
}
?>


