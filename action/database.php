<?php

$hostname = 'localhost';    // Localhost because we are connecting to the local DB
$username = 'root';         // Username (default xampp user will be `root`)
$password = '';             // Password (default xampp user will be empty)
$database = 'simple-ims';   // Database Name

// Connect to database
$connect = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if(!$connect){
    echo "Error connecting database";
}