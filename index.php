<?php 

$title= 'Fun Roulette Game';

include "inc/header.php"; 
?>
<div class="head">
    <h1>
        <button class="head-btn">
            <?php echo $title; ?></button>
    </h1>
</div>

<div class="bonus">
    <h1 class="sbonus">New players will get 100 Chips Sign Up Bonus</h1>
    <div class="cover-container">
        <div class="left">
            <div>
                <img src="img/4.gif" alt="Roulette Wheel" class="wheel">
            </div>
        </div>
        <div class="right">
            <div class="link">
                <h2><a href="login.php">Welcome To <button class="cover-btn">Login</button></a></h2>
            </div><br />
            <div class="link">
                <h2><a href="signup.php">Don't Have An Account. <button class="cover-btn">Sign Up</button> Here.</a></h2>
            </div>
        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>