<?php
   $servername ="localhost";
   $username="phpmyadmin";
   $password="";
   $dbname="roulette";
   $conn = mysqli_connect($servername,$username,$password,$dbname);
   if($conn){
      // echo "connection ok";
   }
   else{
       die("connection failed because".mysqli_connect_error());
   }
?>