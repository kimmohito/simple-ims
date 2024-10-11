<?php

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']!=''){
    echo "You have logged in as ".$_SESSION['user']['name'].". ";
}else{
    echo "Not logged in!";
}