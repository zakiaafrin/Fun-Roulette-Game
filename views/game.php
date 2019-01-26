<?php
session_start();
ob_start();
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

$query = "SELECT * FROM bet";                                                                                                                                     
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
    
if($total == 5){        
    header("location:win.php");
}

include "inc/header.php"; 
?>
<div class="head" id="main">
    <div class="menu">
        <div>
            <button class="head-btn" onclick="openNav()">☰</button>
        </div>
        <div>
            <button class="head-btn" style="margin-left: 88px;">
                <?php echo $title; ?></button>
        </div>
        <div class="wallet">
            <div><strong>
                    <?php echo $coins;  ?> chips </strong></div>
            <div><img src="img/coin.png" alt="coin" class="coin"></div>
        </div>

    </div>

    <div class="welcome">Welcome <b>
            <?php echo $player; ?></b> | <a href="logout.php">Logout</a></div>
</div>

<div id="mySidebar" class="sidebar">
    <img src="img/7.png" alt="Roulette Logo" class="logo">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button class="side-btn"><a href="help.php">Help</a></button>
    <button class="side-btn"><a href="store.php">Store</a></button>  
        <button class="side-btn"><a href="terms.php">Terms & Conditions</a></button>  
    <div class="game-mail welcome">
        <?php echo $email; ?>
    </div>
</div>
<div class="game">

    <div class="game-left">
        <h1 class="center">My Bet</h1>
        <div class="game-container">
            <form action="" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="a">Amount</label>
                    </div>
                    <?php

if(isset($_POST['submit'])){
    $amount = $_POST['a'];
    $color = ucwords($_POST['c']);
    $number = $_POST['n'];
        
    $player_sql = "SELECT * FROM bet WHERE player_name='$player'";
    $con_user = mysqli_query($conn, $player_sql);

    //check if user already exist
    if (mysqli_num_rows($con_user) > 0) {
        echo "<b id='beterror'>Sorry. You have already placed a bet.</b><br/><br/>";     
    } else {     
        if ($amount <= $coins) {
            $query = "UPDATE players SET chips = $coins - $amount WHERE username='$player'"; 
            $data = mysqli_query($conn, $query); 

            $query = "INSERT INTO bet VALUES ('', '$player', '$amount', '$color', '$number')";
            $data = mysqli_query($conn, $query);
            if($data) {
                header("Refresh:0; url=game.php");
                echo "Records added successfully.";
            } else {
                echo "<b id='beterror'>*All fields are required!</b><br/><br/>";
            }
        } else {
            echo "Sorry. You don't have enough chips to bet. Buy chips from our <a href='store.php'>Store</a>.";  
        }         
    }
}

?>
                    <div class="col-75">
                        <input type="number" name="a" placeholder="Your amount" min="1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="c">Color</label>
                    </div>
                    <div class="col-75">
                        <select name="c" required>
                            <option selected disabled value="">Select your color</option>
                            <option value="red">Red</option>
                            <option value="black">Black</option>
                            <option value="green">Green</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="n">Number</label>
                    </div>
                    <div class="col-75">
                        <select name="n" required>
                            <option selected disabled value="">Select your number</option>
                            <?php 
                            for($i = 0; $i <= 35; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="game-submit">
                    <input type="submit" value="Enter" name="submit" class="enter">
                </div>
            </form>
        </div>
    </div>

    <div class="game-right">
        <h1 class="center">Bet Screen</h1>
        <table id="players">
            <tr>
                <th></th>
                <th>Player</th>
                <th>Bet Amount</th>
                <th>Bet Color</th>
                <th>Bet Number</th>
            </tr>
            <?php 
if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        echo   " 
            <tr>
                <td>" . $result['id'] . "</td>
                <td>" . $result['player_name'] . "</td>
                <td>" . $result['amount'] . "</td>
                <td>" . $result['color'] . "</td>
                <td>" . $result['number'] . "</td>
            </tr>";
    }
} else {
    // echo "No record found";
}
?>
        </table>
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