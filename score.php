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

$query = "SELECT * FROM scoreboard ORDER BY date DESC LIMIT 100";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

include "inc/header.php"; 
?>    
    <div class="head" id="main">
        <div class="menu">
            <div>
                <button class="head-btn" onclick="openNav()">☰</button>
            </div>
            <div>
                <button class="head-btn" style="margin-left: 88px;"><?php echo $title; ?></button>
            </div>
            <div class="wallet">
                <div><strong><?php echo $coins;  ?> chips </strong></div>
                <div><img src="img/coin.png" alt="coin" class="coin"></div>               
            </div>

        </div>        
        <div class="welcome">Welcome <b><?php echo $player; ?></b> | <a href="logout.php">Logout</a></div>
    </div>

    <div id="mySidebar" class="sidebar">
        <img src="img/7.png" alt="Roulette Logo" class="logo">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> 
        <button class="side-btn"><a href="game.php">Play</a></button>
        <button class="side-btn"><a href="help.php">Help</a></button>
        <button class="side-btn"><a href="store.php">Store</a></button>  
        <button class="side-btn"><a href="terms.php">Terms & Conditions</a></button>           
        <div class="mail welcome"><?php echo $email; ?></div>
    </div>

    <div class="score-body">
        <h1 class="center">Scoreboard</h1>
        <table id="players">
            <tr>
                <th>Player</th>
                <th>Bet Amount</th>
                <th>Bet Color</th>
                <th>Bet Number</th>
                <th>Winning Number</th>
                <th>Winning Color</th>
                <th>Chips Win</th>
                <th>Time</th>
            </tr>
            <?php                                                                                                                                   
if($total !=0){
    while($result = mysqli_fetch_assoc($data)){
        echo   " 
            <tr>
                <td>" . $result['name']  . "</td>
                <td>" . $result['bet_amount'] . "</td>
                <td>" . $result['bet_color'] . "</td>
                <td>" . $result['bet_number'] . "</td>
                <td>" . $result['win_num'] . "</td>
                <td>" . $result['win_col'] . "</td>
                <td>" . $result['win_chips'] . "</td>
                <td>" . $result['date'] . "</td>
                </tr>";
    }
} else {
    // echo "No record found";
}
?>
        </table>        
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "290px";
            document.getElementById("mySidebar").style.textAlign = "center";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
        
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });

        document.onkeydown = function(e) {
            var key;
            if (window.event) {
                key = event.keyCode
            }
            else {
                var unicode = e.keyCode ? e.keyCode : e.charCode
                key = unicode
            }

            switch (key) {//event.keyCode
                case 116: //F5 button
                key.returnValue = false;
                key = 0; //event.keyCode = 0;
                return false;
                case 82: //R button
                if (event.ctrlKey) {
                    key.returnValue = false;
                    key = 0; //event.keyCode = 0;
                    return false;
                }
                case 91: // ctrl + R Button
                event.returnValue= false;
                key=0;
                return false;
            }
        }
    </script>

    <?php
    $query = "TRUNCATE TABLE bet;";
    if (mysqli_query($conn, $query)) {
        
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    $query = "TRUNCATE TABLE result;";
    if (mysqli_query($conn, $query)) {
        
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    ?>

<?php include "inc/footer.php"; ?> 