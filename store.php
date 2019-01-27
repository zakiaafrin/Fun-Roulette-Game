<?php
session_start();
include("inc/connection.php");

$title= 'Fun Roulette Game';
$email = $_SESSION['email'];

if($email == TRUE) {
} else {
    header('location:login.php');
}

$query = "SELECT * FROM players WHERE email='$email'";                                                                                                                                     
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total !=0){
    while($result = mysqli_fetch_assoc($data)){
        $player = $result['username'];
        $coins = $result['chips'];
        }
    } else {
        echo "No record found";
}  

include "inc/header.php"; 
?>
<div class="head" id="main">
    <div class="menu">
        <div>
            <button class="head-btn" onclick="openNav()">☰ Menu</button>
        </div>
        <div>
            <button class="head-btn" style="margin-left: 52px;">
                <?php echo $title; ?></button>
        </div>
        <div class="wallet">
            <div><strong>
                    <?php echo $coins;  ?> chips </strong></div>
            <div><img src="img/coin.png" alt="coin" class="coin"></div>
        </div>
    </div>

    <div class="welcome">Welcome <b>
            <?php echo $player; ?></b> | <a href="logout.php">Logout</a>
    </div>
</div>

<div id="mySidebar" class="sidebar">
    <img src="img/7.png" alt="Roulette Logo" class="logo">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button class="side-btn"><a href="game.php">Play</a></button>
    <button class="side-btn"><a href="help.php">Help</a></button>
    <button class="side-btn"><a href="terms.php">Terms & Conditions</a></button>
    <div class="store-mail welcome">
        <?php echo $email; ?>
    </div>
</div>
<div style="height: 543px;">
    <div style="float: left;">
        <div class="buy">
            <div class="store">
                <img src="img/coin1.png" alt="100 Chips" width="90" style="margin-top: 4.5%;">
            </div>
            <div class="store-right">
                <h3>Buy 100 Chips</h3>
                <h3>Only $3.00</h3>
            </div>
            <button class="buy-btn">Buy</button>
        </div>
        <div class="buy">
            <div class="store">
                <img src="img/coin2.png" alt="100 Chips" width="150" style="margin-top: 2%;">
            </div>
            <div class="store-right" style="margin-top: -28%;">
                <h3>Buy 200 Chips</h3>
                <h3>Only $3.50</h3>
            </div>
            <button class="buy-btn">Buy</button>
        </div>
    </div>
    <div style="float: right;">
        <div class="buy-right">
            <div class="store">
                <img src="img/coin4.png" alt="100 Chips" width="150" style="margin-top: 5%;">
            </div>
            <div class="store-right" style="margin-top: -24.5%;">
                <h3>Buy 250 Chips</h3>
                <h3>Only $4.00</h3>
            </div>
            <button class="buy-btn">Buy</button>
        </div>
        <div class="buy-right">
            <div class="store">
                <img src="img/coin3.png" alt="100 Chips" width="190" style="margin-top: 4%;">
            </div>
            <div class="store-right" style="margin-top: -25.5%;">
                <h3>Buy 500 Chips</h3>
                <h3>Only $5.00</h3>
            </div>
            <button class="buy-btn">Buy</button>
        </div>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "290px";
        document.getElementById("mySidebar").style.textAlign = "center";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<?php include "inc/footer.php"; ?>