<?php
// database.php

$host = '127.0.0.1:4306';
$db = 'expusers';  
$user = 'root';     
$pass = '';        

// Create a new MySQLi connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");
