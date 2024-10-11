<?php




$text = "Hello world!ASDASDASDASDASDS";


$encrypt = crypt($text,'salt');

$hash = password_hash($text, PASSWORD_DEFAULT);


echo "Text:".$text."<br>";
echo "Encrypt:".$encrypt."<br>";
echo "Hash:".$hash."<br>";