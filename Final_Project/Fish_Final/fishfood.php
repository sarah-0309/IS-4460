


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        *{
            margin: 0px;
            padding: 0;
            list-style: none;
            font-size: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: black;
        }
         h1 .price{
            font-size: 400;
            font-weight: bold;
            color: #fbc2eb;
            text-decoration: blue underline wavy;
            align-items: center;
        } 
        body{
            height: 100vh;
            display: flex;
            align-items: top;
            justify-content: center;
            background-image: linear-gradient(to right,  rgb(140, 210, 163), #fbc2eb);
        }


        .grid-container {
            display: grid;
            grid-row-gap: 40px;
            grid-template-columns: auto auto auto;
            padding: 10px;
            padding-top: 350px;
            }

        .grid-item {
            background-color: transparent;
            padding: 20px;
            font-size: 40px;
            text-align: center;
        }

        .shell{
            display: flex;  
        }

        .button,.shell{
            background-color: rgb(127, 168, 122);
             width: 1000px;
             height: 65px;
             text-align: center;
             line-height: 65px;
             transition: 0.3s;
             cursor: pointer;

        }.portrait::before{
            content:'';
            display:block;
            width: 250px;
            height: 200px;
            border-radius: 50%;
            transform:translate(0px, -30px);
            background-image:url('fish.jpeg');
            background-size:auto;
            border:10px solid rgb(58, 141, 189)

        }.information{
            width: 220px;
            background-color: rgb(146, 68, 32);
            transform: translate(20px,-40px);
            border-radius: 10px;
            padding: 20px;
            line-height:0;
            height: 0;
            transition: .3s;
            opacity: 0;

        } .button :hover{
            background-color: #d15a39;

        } .button li:hover{
             background-color: #ffb29d;
             
        }.button ul li{
            height: 0;
            transition: .2s;
            opacity: 0;
            transform: translateY(-65px);
            background-color: #e07a5f;
        }
        .button:hover li{
            height: 55px;
            opacity: 1;
            transform: translateY(0);
        }

        .portrait:hover .information{
            opacity: 1;
            line-height: 55px;
            transform: translate(-20px,-10px);
            height: auto;
        }
    </style>
</head>
<body>
    <!-- <h1>Welcome to the Fish R shopping</h1> -->
    <div class = "container">
    <ul class="shell">
        <li class="button">
            <span>Product</span>
            <ul>
                <li ><a href="home.php">Fish type</a></li>
                <li ><a href="fishfood.php">Fish food</a></li>
            </ul>
        </li>

        <li class="button">
            <span>Question Page</span>
            <ul>
                <li ><a href="FAQ.php">FAQ</a></li>
            </ul>
            

        </li>
        <li class="portrait">
            <ul class="information">
                <li> Order List </li>
                <li> Saved Items </li>
            </ul>
        </li>
        
        <li class="button">
            <span>Register</span>
            <ul>
            <li ><a href="registeration.html">Sign up</a></li>
            </ul>
        </li>

        <li class="button">
            <span>Log-on</span>
            <ul>
            <li ><a href="login.html">Sign in</a></li>
            <li ><a href="cart.php">Cart</a></li>
            </ul>
        </li>   
    </ul>
<!-- sub-container element -->
<?php

require_once "Mysql_Login.php";

    $conn = new mysqli($hn,$un,$pw,$db);
    if($conn -> connect_error) die($conn -> connect_error);

    $query = "SELECT * FROM fish_food";

    $result = $conn -> query($query);
    if(!$result) die(mysqli_error($conn));


    $numRows = $result -> num_rows;
       for($j = 0; $j < $numRows; ++$j){
           $row = $result -> fetch_array(MYSQLI_ASSOC);
           if($j == 0){
               $fishfood1 = $row['Name'];
               $price1 = $row['Price'];
            }
            if($j == 1){
            $fishfood2 = $row['Name'];
            $price2= $row['Price'];
            }if($j == 2){
                $fishfood3 = $row['Name'];
                $price3 = $row['Price'];
            }if($j == 3){
                $fishfood4 = $row['Name'];
                $price4 = $row['Price'];
            }
    }



    echo <<< _END
    <div class="grid-container">
        
        <div class="grid-item">
            <a href="product1view.php" >
                <li>
                    <img src= Picture1.png width="200" height="200">
                    <br>
                    <h1>$fishfood1</h1>
                    <br>
                    <h1 class = "price">Price:$price1</h1>
                </li>
            </a>
        </div>

        <div class="grid-item">
            <a href="product2view.php">
                <li>
                    <img src= Picture2.png width="200" height="200">
                    <br>
                    <h1>$fishfood2</h1>
                    <br>
                    <h1 class = "price" >Price:$price2</h1>
                </li>
            </a>
        </div>
        <div class="grid-item">
            <a href="product3view.php">
                <li>
                    <img src= Picture3.png width="200" height="200">
                    <br>
                    <h1>$fishfood3</h1>
                    <br>
                    <h1 class = "price">Price:$price3</h1>
                </li>
            </a>
        </div>  
        <div class="grid-item">
            <a href="product4view.php">
                <li class = "fish4">
                    <img src= Picture4.png width="200" height="200">
                    <br>
                    <h1>$fishfood4</h1>
                    <br>
                    <h1 class = "price">Price:$price4</h1> 
                </li>
            </a>
        </div>  
    </div>
    

</div>
</body>
</html>
_END;
?>
