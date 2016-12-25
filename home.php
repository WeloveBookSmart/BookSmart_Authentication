<?php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location: index.php");  
 }  
 echo '<h1 align="center">'.$_SESSION["username"].' - Welcome to Home Page</h1>';  
 echo '<p align="center"><a href="logout.php">Logout</a></p>';  
 ?>  