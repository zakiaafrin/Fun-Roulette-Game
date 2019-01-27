<?php
session_start();
ob_start();
include("inc/connection.php");
if(count($_SESSION)) header("Location: game.php");
$error = isset($_GET['error']); 

$title= 'Fun Roulette Game';

include "inc/header.php"; 
?>

<div class="head">
    <h1>
        <button class="head-btn">
            <?php echo $title; ?></button>
    </h1>
</div>
<div class="login">
    <form action="" method="post">
        <div class="signup-container">
            <h1>Log In</h1>
            <hr>

            <?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $query = "SELECT * FROM players WHERE email = '$email' && password = '$pwd' ";
        $data = mysqli_query($conn, $query);
        $result = mysqli_num_rows($data);

        if ($result == 1){
            $_SESSION['email'] = $email;
            header('location:game.php');
        } else {
            echo "<div><h6><b class='error'>Login Failed. Please enter a valid Username or Password.</b></h6></div>";
        }
    };
?>
            <label for="email"><b>Email</b></label>
            <input type="text" value="" placeholder="Enter Email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="myInput" required>

            <div class="container-signup">
                <p><button type="submit" name="submit" class="signupbtn">Submit</button></p>
            </div>

            <div class="signin">
                <p>Don't have an account? <a href="signup.php" style="color: purple"><b>Sign Up</b></a></p>
            </div>

            <div class="signin">
                <a href="index.php" style="color: purple"><b>Home</b></a>
            </div>
        </div>
    </form>
</div>

<?php include "inc/footer.php"; ?>