<?php 

$user = 'root';
$pass = '';
$db = 'hotel';

$db_connect = new mysqli('localhost',$user, $pass, $db) or die("Unable to connect to database");


?>