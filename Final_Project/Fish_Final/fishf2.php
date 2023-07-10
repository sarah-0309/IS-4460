
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
        /* h1{
            font-size: 400;
            font-weight: bold;
            color: #fbc2eb;
            text-decoration: blue underline wavy;
            align-items: center;

        } */
        body{
            height: 100vh;
            display: flex;
            align-items: top;
            justify-content: center;
            background-image: linear-gradient(to right,  rgb(140, 210, 163), #fbc2eb);
        }
        .container{
            display: flex;
            flex-Direction:column;
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
        }
        .portrait::before{
            content:'';
            display:block;
            width: 250px;
            height: 200px;
            border-radius: 50%;
            transform:translate(0px, -30px);
            background-image:url('image1.png');
            background-size:auto;
            border:10px solid rgb(58, 141, 189)
        }
        .information{
            width: 220px;
            background-color: rgb(146, 68, 32);
            transform: translate(20px,-40px);
            border-radius: 10px;
            padding: 20px;
            line-height:0;
            height: 0;
            transition: .3s;
            opacity: 0;

        }
         .button :hover{
            background-color: #d15a39;
        } 
        .button li:hover{
             background-color: #ffb29d;
        }
        .button ul li{
            height: 0;
            transition: .2s;
            opacity: 0;
            transform: translateY(-65px);
            background-color: #e07a5f;
        }
        .button:hover li{
            height: 65px;
            opacity: 1;
            transform: translateY(0);
        }
        .portrait:hover .information{
            opacity: 1;
            line-height: 65px;
            transform: translate(-20px,-10px);
            height: auto;
        }
        .shoppingList{
            display: flex;
            flex-Direction: row;
            padding-top: 350px;
        }
        .image1{
            width: 400px;
            height: 600px;
            margin-top:400px;
        }
        .checkout li{
            width:250px;
            height:400px;
        }
        .text1{
            padding-right: 100px;
        }
        h1{
            position:absolute;
            height: 400px;
            margin-left: 400px;
            top: 400px;
        }
        .Buy{
            height: 400px;
            width: 100px;
            background-color: rgb(184, 224, 243);
            position: absolute;
            right: 100px;
            top: 400px;
        }
        h2{
            font-size: 500;
            font-weight: bold;
            color: red;  
        }
        .text2{
            margin-top: 130px;
            text-align:left;
            font-style: italic;
            font-weight:lighter;
        }
    </style>

</head>
<body>
    <!-- <h1>Welcome to the Fish R shopping</h1> -->
    <div class="container">
    <ul class="shell">
        <li class="button">
            <span>Product</span>
            <ul>
                 <li>Fish type</li>
            </ul>
        </li>

        <li class="button">
            <span>Q&A</span>
            <li></li>
        </li>
        <li class="portrait">
            <ul class="information">
                <li>Order List</li>
                <li>Saved Items</li>
            </ul>
        </li>
        
        <li class="button">
            <span>Register</span>
            <ul>
                 <li>Sign-up</li>
            </ul>
        </li>

        <li class="button">
            <span>Log-on</span>
            <ul>
                 <li>Sign-in</li>
            </ul>
        </li>

    </ul>

    <ul class="checkout">
        <a>
            <li class="image1">
                <img style="width: 130%;" src= "arrow.png" alt="">
            </li>
        </a>
            
        <a>
            <li class="text1" >
                <h1 style="width: 400px; font-family:serif; font-weight: lighter; font-size: 20px;" >
                    <span style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 25px; font-weight: bold;">
                        
                    <br> 
                    <?php
                            require_once "Mysql_Login.php";
                            $conn = new mysqli($hn,$un,$pw,$db);
                            if($conn -> connect_error) die($conn -> connect_error);

                            $query = "SELECT * FROM Fish_type";
                            $result = $conn -> query($query);
                            if(!$result) die(mysqli_error($conn));

                            $numRows = $result -> num_rows;
                            for($j = 0; $j < $numRows; ++$j){
                                $row = $result -> fetch_array(MYSQLI_ASSOC);
                                if($j == 1){
                                    $fish2 = $row['Name'];
                                    echo $fish2;
                                }
                            }
                            ?>
                    <br>
                    <br> Price:
                    <a style="color: red;">
                    <?php
                            require_once "Mysql_Login.php";
                            $conn = new mysqli($hn,$un,$pw,$db);
                            if($conn -> connect_error) die($conn -> connect_error);

                            $query = "SELECT * FROM Fish_type";
                            $result = $conn -> query($query);
                            if(!$result) die(mysqli_error($conn));

                            $numRows = $result -> num_rows;
                            for($j = 0; $j < $numRows; ++$j){
                                $row = $result -> fetch_array(MYSQLI_ASSOC);
                                if($j == 1){
                                    $price2 = $row['Price'];
                                    echo '$'.$price2;
                                }
                            }
                        ?>
                    </a> 
                    </span>
                    <br>
                    <br>
                    <br>Description
                    Omega One Frozen Blood Worms Pouch is the easiest, cleanest way to feed frozen food! This resealable pouch contains 30 single-serving quick-thaw pods, each filled with a delicious treat for your fish. Omega One Blood Worms are genuine bloodworms, not mosquito larvae, which means their color enhancing ability is superb. Their high protein content makes them particularly effective as a conditioning food for breeding fish. These premium, bacteria-free bloodworms are an excellent treat for many freshwater and saltwater species.
                    </h1>
            </li>
        </a>

        <a>
            <li class="Buy">
                <h2><?php
                            require_once "Mysql_Login.php";
                            $conn = new mysqli($hn,$un,$pw,$db);
                            if($conn -> connect_error) die($conn -> connect_error);

                            $query = "SELECT * FROM Fish_type";
                            $result = $conn -> query($query);
                            if(!$result) die(mysqli_error($conn));

                            $numRows = $result -> num_rows;
                            for($j = 0; $j < $numRows; ++$j){
                                $row = $result -> fetch_array(MYSQLI_ASSOC);
                                if($j == 1){
                                    $price2 = $row['Price'];
                                    echo '$'.$price2;
                                }
                            }
                        ?>
                </h2>
                <br>
                <h3>FREE DELIVERY: Tuesday,Dec 12
                    <br>
                    <br>Quantity
                    <select name="order" size="1"> 
                    <option selected="selected">Choose one</option>
                      <?php
                        Require_once "Mysql_Login.php";

                        $conn = new mysqli($hn,$un,$pw,$db);
                        if($conn -> connect_error) die($conn -> connect_error);
                        $query = "SELECT Available FROM Inventory WHERE ProductID = 6";
                        $result = $conn -> query($query);
                        if(!$result) die(mysqli_error($conn));
                        $numRows = $result -> num_rows;
                        $row = $result -> fetch_array(MYSQLI_ASSOC);
                        for($j = 1; $j <= $row['Available']; ++$j){
                            echo "<option value='strtolower($j)'>$j</option>";
                        }
                      ?>
                    </select>
                    <br>
                    <br>Delivery
                    <select name="order" size="0">
                    <option selected="selected">Choose one</option>
                      <?php
                        Require_once "Mysql_Login.php";
                        $conn = new mysqli($hn,$un,$pw,$db);
                        if($conn -> connect_error) die($conn -> connect_error);
 
                        $query = "SELECT method FROM delivery";
                        
                        $result = $conn -> query($query);
                        print_r($result);
                        if(!$result) die(mysqli_error($conn));
 
                        $numRows = $result -> num_rows;
                        for($j = 0; $j <$numRows; ++$j){
                          $row = $result -> fetch_array(MYSQLI_ASSOC);
                          $m = $row['method'];
                          echo "<option value='strtolower($m)'>$m</option>";
                        }
                      ?>
                    </select>
                    <br>
                    <input type="submit" value="AddtoCart" style="width:100px;position: absolute;left: 75px;margin-top: 45px;">
                    <!-- <input type="submit" value="Buy" style="width:100px;position: absolute;left: 75px;margin-top: 75px;"> -->
                    
                </h3>
                <div class="text2">
                    <span>Return policy:No refund!
                        Ships from and sold by FishUs.com
                    </span>
                </div>


            </li>
        </a>

    </ul>
</div>
</body>
</html>
