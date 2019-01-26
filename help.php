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

$query = "SELECT * FROM bet";                                                                                                                                     
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
<?php       
    
if($total < 5){   
    echo "   
        <button class='side-btn'><a href='game.php'>Play</a></button>";
}  
?>  
        <button class="side-btn"><a href="store.php">Store</a></button>         
        <button class="side-btn"><a href="terms.php">Terms & Conditions</a></button>         
        <div class="game-mail welcome"><?php echo $email; ?></div>
    </div>

    <div class="mskcnsignup">
    <div style="color: antiquewhite;">
    <br/>
        <button class="cover-btn">How to Play Roulette</button> 
        <hr style="border:1px solid #e11459;">

        <p>Last updated: January 17, 2019</p>


        <p>Roulette has offered glamour, mystery, and excitement to casino-goers since the 17th century. The game is popular in casinos worldwide in part because its rules are relatively simple and easy-to-understand. However, roulette offers a surprising level of depth for serious betters. Before putting it all on black, learn the basics of this thrilling game by reading the detailed instructions in this article below the jump.</p>


        <h2><button class="cover-btn">Know the equipment</button></h2>

        <p>Roulette is French for "little wheel." On this wheel are 36 numbers and a 0; on some American tables, there is a "00." A croupier sends a small white ball spinning that will eventually land on one of the numbers. Bets are placed on the table, correlating with the slots the ball can possibly land in. On the table are the numbers and a few other options:</p>
            <ol>
                    <li>1st 12</li>
                    <li>2nd 12</li>
                    <li>3rd 12</li>
                    <li>1-18</li>
                    <li>19-36</li>
                    <li>Red</li>
                    <li>Black</li>
                    <li>Green</li>
            </ol>

        <h2><button class="cover-btn">Know the different bets</button></h2>

        <p>In roulette, you have to anticipate the number or type of pocket on which the ivory ball is going to land. To do this, there are a range of bets you can make."Inside" bets, or bets placed on specific numbers, generally have higher paying odds. You can bet:</p>
            <ol>
                <li>Straight up" betting on one number pays 35 to 0</li>
                <li>Split betting on two numbers pays 17 to 1</li>
                <li>"Street" betting on three numbers pays 11 to 1</li>
                <li>Three numbers can be bet with just one chip. It can be placed on the end of any "street" (the row of 3 numbers) on the table map.</li>
                <li>Corner betting on four numbers pays 8 to 1</li>
                <li>The chip lies on the intersection of the four numbers.</li>
                <li>Six line betting on 6 numbers pays 5 to 1</li>
                <li>The chip lies on the edge of two adjoining streets.</li>
                <li>Additionally, for American roulette, there is the Five-number bet which covers "0,00,1,2,3" and pays 6:1, and the Row 00 bet which covers 0 and 00 and pays 17:1.</li>
            </ol>

        <h2><button class="cover-btn">Learn about "Other" bets</button></h2>
        <ol>
            <li>Color matching (Red or Black or Green) pays 1 to 1.5 Times.</li>
            <li>Number matching (Red or Black or Green) pays 1 to 10 Times.</li>
            <li>Color matching (Red or Black or Green) pays 1 to 20 Times.</li>
        </ol>


        <h2><button class="cover-btn">Watch what's happening</button></h2>

        <p>Sometimes, dealers have habits. They might release the ball at exactly the same angle and velocity nearly every time during a specific session. As the dealer releases the ball, the same numbers pass every time, increasing the chances that the ball ends up resting on the same portion of the wheel repeatedly</p>

        <p>A wheel can go off-kilter. However, casinos are pretty good at spotting this. There's really no way to tell if a wheel is off balance unless you monitor thousands and thousands of spins.</p>


        <h2><button class="cover-btn">Place your bets</button></h2>

        <p>The first six bets are placed on the pockets numbered 0 to 36 on the game table. If you want to bet on column, place your bets on the empty pocket under the three columns. For the dozen, choose the pocket P12 for the first 12 numbers, M 12 for the 12 middle numbers and D 12 for the last 12 numbers. Finally, when you want to bet on the outside bets, use the red, black, even, odd, high or low pockets.</p>

        <p>Some players like to watch the other players, either hoping the others know something they don't or doing the opposite of their opponents' actions. You can try this, but it won't improve your odds more than coincidentally.</p>


        <h2><button class="cover-btn">A Game of Chance</button></h2>

        <p>Whatever your method, there is no absolute winning strategy. The outcome of where the ball will land is a matter of chance, and each roll is a unique occurrence that should be treated as such. Though you may feel inexperienced there is an old say about Roulette, “the wheel has no memory.” Black and red, odd or even, and all bets on the table have the same amount of chance hitting on any given spin. This is huge positive for players new to the game, as Lady Luck could be just around the corner.

What are the best Roulette tips for beginners to understand how to win at Roulette?</p>
<ol>
    <li>Roulette is a game of chance, making it hard to predict the odds of any particular number landing on each spin.</li>
    <li>Every table has a minimum bet, and sometimes inside and outside bets for the same table can be different.</li>
    <li>Multiple bets can be made for each spin, and spreading out your bets increases your chances of winning (if you lose however, you lose more).</li>
    <li>Payouts vary based on the type of bet made, for beginners, outside bets are heavily recommended.</li>
    <li>The house edge in American Roulette is 5.26%, beginners are urged to play French/European versions as the house edge is lowered to 2.7%.</li>
    <li>Whatever strategy a players decides to utilize: Martingale, D’Alembert or Fibonacci for instance, it’s critical to remember that in Roulette the spin of the wheel is a unique event for each spin despite perceived hot or cold streaks.</li>  
</ol>
<p>Most importantly, you should have fun! Roulette is a very entertaining casino game that offers huge rewards to those willing to try. So give it a chance. If you don’t want to visit a brick and mortar, head over to Planet 7 Online Casino today to have a spin at the Roulette table. You might just end up winning big! Good luck!</p>
  
    
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
    </script>

<?php include "inc/footer.php"; ?> 