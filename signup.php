<?php
session_start();
include("inc/connection.php");
error_reporting(0);
// if(count($_SESSION)) header("Location: login.php");

$title= 'Fun Roulette Game';
include "inc/header.php"; 
?>
      
    <div class="head">
        <h1>
            <button class="head-btn"><?php echo $title; ?></button>
        </h1>
    </div>

    <div class="signup">
        <form action="" method="post" enctype="multipart/form-data" style="border:1px solid #ccc; border-radius: 25px;">
            <div class="signup-container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $name = ucwords($_POST['username']);
    $pass = $_POST['password'];
    $chips = "100";

    $email_sql = "SELECT * FROM players WHERE email='$email'";
    $user_sql = "SELECT * FROM players WHERE username='$name'";
    $con_user = mysqli_query($conn, $user_sql);
    $con_email = mysqli_query($conn, $email_sql);

     //check if user already exist
    if (mysqli_num_rows($con_user) > 0) {
        echo "<b class='error'>Sorry. Username already taken.</b><br/><br/>";     
    } else if (mysqli_num_rows($con_email) > 0) {
        echo "<b class='error'>Sorry.This email already exists.</b><br/><br/>";

    //email validation    
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo "<b class='error'>Please Enter A Valid Email.</b><br/><br/>";
    } else {
        if($email!="" && $name!="" &&  $pass!="" ) {
            $query = "INSERT INTO players VALUES ('$id', '$email', '$name', '$pass', '$chips')";
                
            $data = mysqli_query($conn, $query);
            if($data) {
                echo "<div class='sign-success'>Sign Up successful.</div></br>";
                header('location:login.php');
            } else {
                echo "<b class='error'>*All fields are required!</b><br/><br/>";
            }
        }
    }
}
   
?>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email">

                <label for="username"><b>User Name</b></label>
                <input type="text" placeholder="Enter Username" name="username">

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="myInput"><br/>

                <label>
                    <input type="checkbox" onclick="myFunction()">Show Password<br>
                </label>

                <p>By creating an account you agree to our <a href="terms.php" class="privacy">Terms & Privacy</a>.</p>

                <div class="container-signup">
                    <p><input type="submit" name="submit" value="Sign Up" class="signupbtn"></p>
                </div>

                <div class="signin">
                    <p>Already have an account? <a href="login.php" style="color: purple"><b>Sign in</b></a></p>
                </div>
                
                <div class="signin">
                    <a href="index.php" style="color: purple"><b>Home</b></a>
                </div>

            </div>
        </form>
    </div>

    <div class="footer">
        <p>CopyRight &copy; 2018. This site is created by Zakia Afrin Jeme. All Rights Reserved.</p>

    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>