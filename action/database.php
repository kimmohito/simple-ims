<?php

// Connect to database
$connect = mysqli_connect('localhost', 'root', '', 'simple-ims');

// Check connection
if($connect){
    echo "database is connected!";
}else{
    echo "Error connecting database";
}