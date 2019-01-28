<?php
session_start();
include("inc/connection.php");

$title= 'Fun Roulette Game';
$email = $_SESSION['email'];

if($email == TRUE) {

} else {
    header('location:login.php');
}

// $query = $conn->query("SELECT name FROM result WHERE name = '$player'");
// $new_player = $query->num_rows > 0 ;

// if(!$new_player){
//     header("Location: summary.php");
// }

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
    
if($total != 5){        
    header("location:game.php");
}

$query = "SELECT * FROM result WHERE name='$player'";                                                                                                                                       
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data); 

if($total !=0){
    while($result = mysqli_fetch_assoc($data)){
        $ba = $result['bet_amount'];
        $bn = $result['bet_number'];
        $bc = $result['bet_color'];
        $wn = $result['win_num'];
        $wc = $result['win_col'];
        $wchips = $result['win_chips'];
        }
    } else {
        echo "No record found";
} 
           
$query = "INSERT INTO scoreboard (win_num, win_col, name, status, bet_amount, bet_color, bet_number, win_chips, date) 
SELECT win_num, win_col, name, status, bet_amount, bet_color, bet_number, win_chips, date 
FROM result";
if (mysqli_query($conn, $query)) {

} else {
echo "Error: " . $query . "<br>" . mysqli_error($conn);
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
                <?php echo $title; ?>
            </button>
        </div>
        <div class="wallet">
            <div><strong>
                    <?php echo $coins;  ?> chips </strong>
            </div>
            <div><img src="img/coin.png" alt="coin" class="coin"></div>
        </div>
    </div>

    <div class="welcome">Welcome <b>
            <?php echo $player; ?></b>
    </div>
</div>

<div id="mySidebar" class="sidebar">
    <img src="img/7.png" alt="Roulette Logo" class="logo">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button class="side-btn"><a href="summary.php">Game Result</a></button>

    <div class="store-mail welcome">
        <?php echo $email; ?>
    </div>
</div>

<div style="text-align:center;">
    <div>
        <div class="result-view">
            <h3><a href="summary.php">View Result</a></h3>
        </div>
        <img src="img/results.png" alt="Result Logo" style="width: 525px; text-align:center; margin-top: -88px;">
    </div>

    <div class="result-right">
        <h3>You have bet
            <?php echo $ba; ?> chips.
        </h3>
        <h3 id='sub'>Your Number :
            <?php echo $bn; ?>
        </h3>
        <h3 id='sub'>Your Color :
            <?php echo $bc; ?>
        </h3>
    </div>
</div>
<div class='result-container1'>
    <div class='result-left'>
        <h2>Winning Number :
            <?php echo $wn; ?>
        </h2>
        <h2>Winning Color :
            <?php echo $wc; ?>
        </h2>
    </div>
</div>
<div class='congrate'>
    <?php
    if ($wchips > 0) {
        echo "<h2>Congratulations!!! You have won " . $wchips . " chips.</h2>";
    } else {
        echo "<h2>Better luck next time.</h2>";
    }?>
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

    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });

    document.onkeydown = function (e) {
        var key;
        if (window.event) {
            key = event.keyCode
        }
        else {
            var unicode = e.keyCode ? e.keyCode : e.charCode
            key = unicode
        }

        switch (key) {                      //event.keyCode
            case 116:                       //F5 button
                key.returnValue = false;
                key = 0;                    //event.keyCode = 0;
                return false;
            case 82:                        //R button
                if (event.ctrlKey) {
                    key.returnValue = false;
                    key = 0;                //event.keyCode = 0;
                    return false;
                }
            case 91:                        // ctrl + R Button
                event.returnValue = false;
                key = 0;
                return false;
        }
    }
</script>

<?php include "inc/footer.php"; ?>