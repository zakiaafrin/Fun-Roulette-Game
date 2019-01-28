<?php
   $servername ="localhost";
   $username="phpmyadmin";
   $password="@1234Nijhum";
   $dbname="roulette";
   $conn = mysqli_connect($servername,$username,$password,$dbname);
   if($conn){
      // echo "connection ok";
   }
   else{
       die("connection failed because".mysqli_connect_error());
   }
?>