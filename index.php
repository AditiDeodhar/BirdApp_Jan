<?php
/**

*/

// include the class files
require_once '/classes/Criteria.php';

// Accept the variables entered by the user
// Check if color is entered
$colours = (isset($data['bird_body_colours'])) ? $data['bird_body_colours']: "";
//$colors = array('Red', 'Blue', 'Green');

// create an instance of the class Criteria
$color_list = new Criteria($colors);

// display the color entered by the user
echo "The colors are ";
for ($i=0; $i<sizeof($color_list->getColor());$i++)
{
	echo $color_list->getColor()[$i]. ' ';
}
?>