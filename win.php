<?php
session_start();
ob_start();
include("inc/connection.php");
header("Refresh:0; url=won.php");
$title = 'Fun Roulette Game';
$email = $_SESSION['email'];

if($email == TRUE) {
} else {
    header('location:login.php');
}

$query = "SELECT * FROM players WHERE email = '$email'";                                                                                                                                     
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0){
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
                <?php echo $title; ?>
            </button>
        </div>
        <div class="wallet">
            <div><strong>
                    <?php echo $coins;  ?> chips </strong></div>
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
    <button class="side-btn"><a href="help.php">Help</a></button>
    <button class="side-btn"><a href="store.php">Online Store</a></button>

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
</div>
<?php
    $win_number = rand(0, 35);
    $arr = array("Red"=>"red","Green"=>"green","Black"=>"black");
    $win_color = (array_rand($arr,1));
    
    $query = $conn->query("SELECT players.username, players.chips, bet.amount, bet.number, bet.color FROM players join bet on players.username = bet.player_name ");
    $datas = [];
    while ($row = $query->fetch_object()) {
       $datas[] = $row;    
    }
    foreach ($datas as $data){    
       $chip = $data->chips;
       $amount = $data->amount;
       $number = $data->number;
       $color = $data->color;
       $uname = $data->username;
    
       if ($win_number == $number && $win_color == $color){
           $win_amount = $amount*20;
           $message = "Congratulation!!! You have won $win_amount chips.";
       }
       else if ($win_number == $number){
           $win_amount = $amount*10;
           $message = "Congratulation!!! You have won $win_amount chips.";
       }
       else if ($win_color == $color){
           $win_amount = $amount*1.5;
           $message = "Congratulation!!! You have won $win_amount chips.";
       }
       else {
           $win_amount = $amount*0;
           $message = "Better luck next time.";
       }
    
       //update chip into players table
       $query = $conn->query("UPDATE players SET chips = ($chip + $win_amount) WHERE username='$uname'");    
        
       //insert data into result table
       if($win_amount){
           $query = $conn->query("INSERT INTO result VALUES ('0', '$win_number', '$win_color', '$uname', 'Winner', '$amount','$color', '$number','$win_amount', now())");
       }else{
           $query = $conn->query("INSERT INTO result VALUES ('0', '$win_number', '$win_color', '$uname', 'Loser', '$amount', '$color', '$number','$win_amount', now())");
       }
    }
?>

<?php include "inc/footer.php"; ?>