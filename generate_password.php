<?php
$con = mysqli_connect("localhost","root","","test");
//how to generate a simple random password in php
//for generating random password in php using str_shuffle() and substr()

//str_shuffle = randomly shufgle all characters of a string
//means asit randomly rearrange string characters
//substr() = returns part of a string

$hash = md5(rand(0,1000));
$password = rand(1000,5000);

$string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-"; 
echo substr(str_shuffle($string),0,12);

//syntax - substr(string, start, length)
?>