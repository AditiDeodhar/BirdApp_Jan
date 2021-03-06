<?php

require_once 'classes/DB.class.php';
 
//connect to the database
$db = new DB();
$db->connect();
 
//start the session
session_start();
 
//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
    $user = unserialize($_SESSION['user']);
    $_SESSION['user'] = serialize($userTools-&gt;get($user-&gt;id));
}
?>