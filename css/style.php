<style>
    body {
        background-color: rgb(60, 4, 87);
    }

    .head {
        text-align: center;
        color: #95ff95;
        background-color: #e11459;
        padding: 1px;
        border-radius: 20px;
    }

    .sub-head {
        margin-top: 5px;
        text-align: center;
        color: #95ff95;
        background-color: #e11459;
        padding: 1px;
        border-radius: 20px;
    }

    .bonus {
        text-align: center;
        color: cyan;
    }

    .sbonus {
        color: cyan;
        text-shadow: 3px 2px 4px #ff00ff;
    }

    .cover-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 68vh;
        margin-top: -14px;
    }

    .left {
        width: 700px;
        float: left;
        text-align: center;
        color: white;
    }

    .right {
        width: 600px;
        float: right;
        text-align: center;
    }

    .wheel {
        width: 540px;
        height: 400px;
        border-radius: 0 95px 0 95px;
    }

    a {
        text-decoration: none;
        color: cyan;
    }

    .cover-btn {
        padding: 10px;
        border-radius: 18px;
        background-color: #0b0b7a;
        color: lawngreen;
        font-size: 22px;
        border: 2px solid magenta;
        outline: none;
    }

    .cover-btn:hover {
        padding: 10px;
        border-radius: 18px;
        background-color: rgb(209, 5, 131);
        color: lawngreen;
        font-size: 22px;
        border: 2px solid magenta;
        outline: none;
    }

    .head-btn {
        padding: 10px;
        border: 2px solid whitesmoke;
        border-radius: 18px;
        background-color: #0b0b7a;
        color: lawngreen;
        font-size: 22px;
        outline: none;
    }

    .head-btn:hover {
        padding: 10px;
        border-radius: 18px;
        background-color: rgb(78, 6, 112);
        color: yellow;
        font-size: 22px;
        border: 2px solid cyan;
        outline: none;
    }

    .footer {
        background-color: #e11459;
        color: #ffffff;
        text-align: center;
        font-size: 15px;
        padding: 4px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 95.5%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #800080;
        margin-bottom: 25px;
    }

    /* Float cancel and signup buttons and add an equal width */
    .signupbtn {
        width: 50%;
        padding: 14px;
        background-color: purple;
        color: springgreen;
        font-size: medium;
        font-weight: bold;
        border-radius: 20px;
        border: 3px solid greenyellow;
        outline: none;
    }

    .signupbtn:hover {
        width: 50%;
        padding: 14px;
        background-color: rgb(243, 6, 243);
        color: springgreen;
        font-size: medium;
        font-weight: bold;
        border-radius: 20px;
        border: 3px solid greenyellow;
        outline: none;
    }

    .signin,
    .container-signup {
        text-align: center;
    }

    /* Add padding to container elements */
    .signup-container {
        padding: 16px;
    }

    /* Change styles for signup button on extra small screens */
    @media screen and (max-width: 100%) {
        .signupbtn {
            width: 50%;
        }
    }

    .signup {
        width: 700px;
        background-color: #33c4cc;
        margin-left: 25%;
        margin-top: 2%;
        border-radius: 25px;
    }

    .sign-success {
        font-size: 18px;
        color: purple;
    }

    .privacy {
        color: #4405cc;
        font-weight: bold;
    }

    .login {
        width: 700px;
        height: 512px;
        background-color: #33c4cc;
        margin-left: 25%;
        margin-top: 1.5%;
        margin-bottom: 1.5%;
        border-radius: 25px;
    }

    form {
        margin-bottom: 25px;
    }

    .error {
        background: #ffa4ae;
        border: 1px solid #F44336;
        padding: 0.5em;
        width: 444px;
        font-size: 15px;
    }

    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #70082b;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        padding: 8px 8px 8px 8px;
        text-decoration: none;
        font-size: 19px;
        color: #e0d6f1;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }

    .menu {
        display: flex;
        justify-content: space-between;
    }

    .mail {
        color: navajowhite;
        font-weight: bold;
        text-align: center;
        margin-top: 115px;
    }

    .game-mail {
        color: navajowhite;
        font-weight: bold;
        text-align: center;
        margin-top: 175px;
    }

    .store-mail {
        color: navajowhite;
        font-weight: bold;
        text-align: center;
        margin-top: 287px;
    }

    .logo {
        width: 225px;
        height: 120px;
        margin-bottom: 135px;
    }

    .welcome {
        font-size: 20px;
    }

    .coin {
        width: 49px;
        height: 49px;
        margin-left: 5px;
    }

    .wallet {
        display: flex;
        align-items: center;
        font-size: 20px;
    }

    .side-btn {
        width: 200px;
        border: 2px solid #d4044b;
        border-radius: 18px;
        background-color: #2b1257;
        font-size: 22px;
        outline: none;
        text-align: center;
    }

    .side-btn:hover {
        width: 200px;
        border: 2px solid #04d473;
        border-radius: 18px;
        background-color: rgb(78, 6, 112);
        font-size: 22px;
        outline: none;
        text-align: center;
    }

    #players {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #players td,
    #players th {
        border: 1px solid #ddd;
        padding: 13px;
        text-align: center;
    }

    #players tr:nth-child(even) {
        background-color: #b0ffed;
    }

    #players tr:nth-child(odd) {
        background-color: #fb84ac;
    }

    #players tr:hover {
        background-color: #ddd;
    }

    #players th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #6a0e7a;
        color: white;
    }

    input[type=number] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        font-size: 20px;
    }

    .game-container {
        border-radius: 5px;
        background-color: #6a0e7a;
        padding: 27px;
        color: white;
        font-size: 19px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

    .center {
        text-align: center;
    }

    .game {
        height: 485px;
        margin-top: 1%;
        margin-bottom: 2.75%;
    }

    .game-left {
        float: left;
        width: 36%;
        height: 416px;
        background-color: #ea85fb;
        margin-top: 3%;
        margin-left: 5%;
        margin-bottom: 3.2%;
        border-radius: 25px;
    }

    .game-right {
        float: right;
        width: 50%;
        height: 416px;
        background-color: #ea85fb;
        margin-top: 3%;
        margin-right: 5%;
        margin-bottom: 3.2%;
        border-radius: 25px;
    }

    .game-submit {
        margin-top: 8px;
        text-align: center;
    }

    .enter {
        width: 100px;
        padding: 6px;
        background-color: purple;
        color: springgreen;
        font-weight: bold;
        border-radius: 20px;
        outline: none;
    }

    .enter:hover {
        width: 100px;
        padding: 6px;
        background-color: rgb(168, 4, 168);
        color: rgb(48, 250, 149);
        font-weight: bold;
        border-radius: 20px;
        outline: none;
    }

    #beterror {
        background: #ed6b79;
        border: 1px solid #F44336;
        padding: 0.5em;
        width: 444px;
        font-size: 15px;
    }

    .result-left {
        float: left;
        width: 600px;
        padding: 16px;
        text-align: center;
        margin-top: 0.6%;
        margin-left: 29%;
        border-radius: 25px;
        background-image: linear-gradient(to right, #d4044b, yellow, #d4044b);
    }

    .result-left1 {
        float: left;
        width: 400;
        text-align: center;
        margin-top: 0.6%;
        margin-left: 36.5%;
        border-radius: 25px;
        background-image: linear-gradient(to right, #d4044b, yellow, #d4044b);
    }

    .result-right {
        float: right;
        width: 220px;
        padding: 16px;
        color: white;
        text-align: center;
        background-color: #55031f;
        margin-top: -17.5%;
        margin-bottom: 3%;
        margin-right: 3%;
        border: 2px solid #FFEB3B;
    }

    .result-view {
        width: 220px;
        border-radius: 25px;
        color: white;
        text-align: center;
        background-color: #55031f;
        margin-top: 1.6%;
        border: 2px solid #FFEB3B;
    }

    .result-view:hover {
        width: 220px;
        border-radius: 25px;
        color: white;
        text-align: center;
        background-color: #56035f;
        margin-top: 1.6%;
        border: 2px solid #FFEB3B;
    }

    .congrate {
        color: white;
        text-align: center;
        margin-top: 96px;
    }    

    .result-container1 {
        height: 109px;
    }

    .result-container {
        height: 185px;
    }

    #game-result {
        border: 2px solid #86fec3;
        border-radius: 30px;
        background-color: #6c0505;
        color: white;
        margin-left: 650px;
        margin-right: 650px;
        margin-top: 48px;
        text-align: center;
    }

    #summery {
        width: 70%;
        background-color: #ea85fb;
        margin-right: 5%;
        margin-left: 15%;
        margin-bottom: 0.6%;
        border-radius: 25px;
    }

    .buy {
        width: 506px;
        background-color: #5c369f;
        margin-left: 30%;
        margin-top: 8.5%;
        height: 205px;
    }

    .buy-right {
        width: 506px;
        background-color: #5c369f;
        margin-right: 160px;
        margin-top: 6.5%;
        height: 205px;
    }

    .store {
        margin-left: 20px;
    }

    .store-right {
        float: right;
        width: 220px;
        padding: 16px;
        color: white;
        text-align: center;
        background-color: #55031f;
        margin-top: -26.2%;
        margin-bottom: 3%;
        margin-right: 4%;
        border: 2px solid #FFEB3B;
    }

    .buy-btn {
        padding: 2px 12px 4px 12px;
        border-radius: 18px;
        background-color: #0b0b7a;
        color: lawngreen;
        font-size: 22px;
        border: 2px solid magenta;
        outline: none;
        margin-top: 6px;
        margin-left: 140px;
    }

    .buy-btn:hover {
        padding: 2px 12px 4px 12px;
        border-radius: 18px;
        background-color: rgb(209, 5, 131);
        color: lawngreen;
        font-size: 22px;
        border: 2px solid magenta;
        outline: none;
        margin-top: 2px;
        margin-left: 140px;
    }

    .score-body {
        background-color: #fd94f5;
        margin-left: 6%;
        margin-right: 6%;
        margin-top: 2%;
        margin-bottom: 2%;
        border-radius: 25px;
    }

    .mail1 {
        color: navajowhite;
        font-weight: bold;
        text-align: center;
        margin-top: 160px;
    }

    #roulette-spin {
        animation: rotate 3s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>