<?php
session_start();
ob_start();
include("inc/connection.php");
header("Refresh:0; url=won.php");
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

$query = "SELECT * FROM bet WHERE player_name='$player'";                                                                                                                                       
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data); 

$winning_number = rand(0, 35);
$arr = array("Red"=>"red","Green"=>"green","Black"=>"black");
$winning_color = (array_rand($arr,1));

date_default_timezone_set('America/New_York');
$date = date("Y/m/d h:i:sa");

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
    <button class="side-btn"><a href="summary.php">Game Result</a></button>
    <button class="side-btn"><a href="help.php">Help</a></button>
    <button class="side-btn"><a href="store.php">Store</a></button>

    <div class="mail welcome">
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
        <?php 
if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        $a = $result['amount'];
        $n = $result['number'];
        $c = $result['color'];

        echo   " 
        <h3>You have bet " . $a . " chips.</h3>
        <h3 id='sub'>Your Number : " . $n . "</h3>
        <h3 id='sub'>Your Color : " . $c . "</h3>
    </div>
</div>
<div class='result-container'>
    <div class='result-left'>
        <h2>Winning Number : $winning_number</h2>
        <h2>Winning Color : $winning_color</h2>
    </div>
</div>
<div class='congrate'>"; 
$win = '';
        if (($n == $winning_number) && ($c == $winning_color)) {
            $winner =$player; 
            $win = ($a) * 20;
            echo "<h2>Congratulations!!! You have won " . $win . " chips.</h2>";
        }
        if (($n == $winning_number) && !($c == $winning_color)) {
            $winner =$player; 
            $win = ($a) * 10;
            echo "<h2>Congratulations!!! You have won " . $win . " chips.</h2>";
        }
        if (!($n == $winning_number) && ($c == $winning_color)) {
            $winner =$player; 
            $win = ($a) * 1.5;
            echo "<h2>Congratulations!!! You have won " . $win . " chips.</h2>";
        }
        if (!($n == $winning_number) && !($c == $winning_color)) {
            $winner =$player; 
            echo "<h2>Better luck next time.</h2>";
        } else {
            // echo "No record found";
        }
    }
}
    ?>

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

    <?php
$swin = sprintf("%.2f", $win);
$query = "UPDATE players SET chips = ($coins + $swin) WHERE username='$player'"; 

if (mysqli_query($conn, $query)) {
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

$check_sql = "SELECT * FROM result";
$player_sql = "SELECT * FROM result WHERE name='$player'";
$con_player = mysqli_query($conn, $player_sql);

if (mysqli_num_rows($con_player) >= 1) {

} else {
    if($win) { 
        $query = "INSERT INTO  result VALUES ('', '$winning_number', '$winning_color', '$player', 'Winner', '$a', '$c', '$n', '$swin', '$date');";
    } else {
        $query = "INSERT INTO  result VALUES ('', '$winning_number', '$winning_color', '$player', 'Loser', '$a', '$c', '$n', '$swin', '$date');";
    }
}


if (mysqli_query($conn, $query)) {
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


// if (('bet_number' == $winning_number) && ('bet_color' == $winning_color)) {
//     $query = "INSERT INTO result ('', '$winning_number', '$winning_color', name, 'Winner', bet_amount, bet_color, bet_number, 'bet_amount * 20', '$date') 
// SELECT id, '$winning_number', '$winning_color', player_name, '', amount, color, number, 'Winner', '$date' 
// FROM bet ORDER BY id ASC ";
// }
// if (($n == $winning_number) && !($c == $winning_color)) {
//     $winner =$player; 
//     $win = ($a) * 10;
//     echo "<h2>Congratulations!!! You have won " . $win . " chips.</h2>";
// }
// if (!($n == $winning_number) && ($c == $winning_color)) {
//     $winner =$player; 
//     $win = ($a) * 1.5;
//     echo "<h2>Congratulations!!! You have won " . $win . " chips.</h2>";
// }
// if (!($n == $winning_number) && !($c == $winning_color)) {
//     $winner =$player; 
//     echo "<h2>Better luck next time.</h2>";
// } else {
//     // echo "No record found";
// }

// if($win){
//     $query = "INSERT INTO result ('', '$winning_number', '$winning_color', name, status, bet_amount, bet_color, bet_number, win_chips, '$date') 
// SELECT id, '$winning_number', '$winning_color', player_name, '', amount, color, number, 'Winner', '$date' 
// FROM bet ORDER BY id ASC ";
//  }else{
//     $query = "INSERT INTO result ('', '$winning_number', '$winning_color', name, status, bet_amount, bet_color, bet_number, win_chips, '$date') 
// SELECT id, '$winning_number', '$winning_color', player_name, 'Loser', amount, color, number, '', '$date' 
// FROM bet ORDER BY id ASC ";
//  }

// if (mysqli_query($conn, $query)) {
// } else {
//     echo "Error: " . $query . "<br>" . mysqli_error($conn);
// }

?>

    <?php include "inc/footer.php"; ?>