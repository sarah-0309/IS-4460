<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
</head>
<style>
    *{
        background-color: tan;    
    }

    footer .grid-container{
        display: grid;
        grid-template-columns: auto auto auto auto;
    }
    
    li a{
        background-color: cadetblue;
    }
    li {
        background-color: cadetblue;
    }

    .FAQ{
        text-align: left;
        color:rgb(119, 9, 31);
        font-weight: bold;
        display: inline;
    }

    h1{
        color:rgb(119, 9, 31);
    }

    #search-box{
        background-color: cadetblue;
        width:300px;
        height: 30px;
        border: 1px solid cornflowerblue;
        margin: 10px;
    }

    #google{
        height: auto;
        width: auto;
        margin: 10px;
        background-color: cadetblue;
    }

    footer li{
        font-style: oblique;
        display: inline;
        font-size: large;
    
    }

    #home{
        color: white;
        font-size: large;
        text-decoration: double;

    }

    #user{
        width:500px;
        height:100px;
        display: flex;
    }
</style>

<body>
    <br>
    <div class="header">
        <h1 class="FAQ">Frequently Asked Questions(FAQ)</h1>
        <form action="https://www.google.com/search">
            <input type="text" name="q" id="search-box" placeholder="ex: University of Utah?">
            <button id="google">Search Google</button>
        </form>
    </div>
    
<hr>
<br>

<?php
require_once "Mysql_Login.php";

    $conn = new mysqli($hn,$un,$pw,$db);
    if($conn -> connect_error) die($conn -> connect_error);

    $query = "SELECT * FROM FAQ";

    $result = $conn -> query($query);
    if(!$result) die(mysqli_error($conn));


    $numRows = $result -> num_rows;
       for($j = 0; $j < $numRows; ++$j){
           $row = $result -> fetch_array(MYSQLI_ASSOC);
           if($j == 0){
               $q1 = $row['question_title'];
               $a1 = $row['answer'];
            }
            if($j == 1){
            $q2 = $row['question_title'];
            $a2= $row['answer'];
            }
            if($j == 2){
                $q3 = $row['question_title'];
                $a3 = $row['answer'];
            }
            if($j == 3){
                $q4 = $row['question_title'];
                $a4 = $row['answer'];
            }
            if($j == 4){
                $q5 = $row['question_title'];
                $a5 = $row['answer'];
            }
    }

    echo <<< _END
    <section class="Question-1">
        <h2>$q1</h2>
        <p>$a1</p>
        <hr>
    </section>

    <section class="Question-1">
        <h2>$q2</h2>
        <p>$a2</p>
        <hr>
    </section>

    <section class="Question-2">
        <h2>$q3</h2>
        <p>$a3</p>
    
        <hr>
    </section>

    <section class="Question-3">
        <h2>$q4</h2>
        <p>$a4</p>
        <hr>
    </section>

    <section class="Question-4">
        <h2>$q5</h2>
        <p>$a5</p>
        <hr>
        <p>
            Still not getting your answer? Contact Us anytime. You can contact us through Email: FishUs@gmail.com
        </p>
        
        <form method="POST" action="add_question.php">
            <label for="question">Question:</label>
            <input type="text" class="user" id="user" name= "user" placeholder="you can list your question in here, we will answer it ASAP"><br>
            <input type="text" class="name" id="name" name= "name" placeholder="Enter your name">
            <input type="submit">
        </form>

    </section><hr>

    <!-- <form action="https://www.google.com/search">
        <input type="text" name="q" id="search-box" placeholder="ex: University of Utah?">
        <button id="google">Search Google</button>
    </form> -->

    <footer>
    <div class="grid-container">
        <li id="home">
            <a href="home.php"> Fish type </a>
        </li>

        <li id="food">
            <a href="fishfood.php"> Fish food </a>
        </li>

        <li id="login">
            <a href="login.html"> Login Page  </a>
        </li>

        <li id="register">
            <a href="registeration.html"> Registeration Page </a>
        </li>
    </div>
    </footer>

</body>
</html>
_END;
?>