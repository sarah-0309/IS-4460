<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Store</title>
</head>
<body>
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
            <span>Users</span>
            <ul>
                <li><a href="view_users.php">View Users</a></li>
            </ul>
        </li>

        <li class="button">
            <span>Stores</span>
            <ul>
                <li ><a href="view_stores.php">Store Info</a></li>
            </ul>
        </li>
        <li class="portrait">
            <ul class="information">
                <li> Weclome,Admin </li>
            </ul>
        </li>
        
        <li class="button">
            <span>Orders</span>
            <ul>
            <li ><a href="view_orders.php">Order Info</a></li>
            </ul>
        </li>

        <li class="button">
            <span>Inventory</span>
            <ul>
            <li ><a href="view_inventory.php">Product Inventory</a></li>
            </ul>
        </li>   
    </ul>
</body>
</html>

<?php
    require_once "Mysql_Login.php";
    
    echo "<table class='gt_table' style='font-size:12px;margin:auto;border: 1px solid #000; margin-top:300px ;'>
        <thead>
            <th style='border: 1px solid #000;'>Name</th>
            <th style='border: 1px solid #000;'>Price</th>
            <th style='border: 1px solid #000;'>Type</th>
            <th style='border: 1px solid #000;'>Available</th>
            <th style='border: 1px solid #000;'>ProductID</th>
         </tr>
        </thead>
        <tbody>";
?>

<?php
    $conn = new mysqli($hn,$un,$pw,$db);
    if($conn -> connect_error) die($conn -> connect_error);
    $query = 'SELECT * FROM Inventory';
    $result = $conn->query($query);

    if(!$result) die($conn -> connect_error);
    $numsRows = $result -> num_rows;
    
    for($i = 0; $i < $numsRows; $i++){
        $row = $result -> fetch_array(MYSQLI_ASSOC);
        // echo $row;
        echo "<tr>";
        echo  "<th style='border: 1px solid #000;'><a href = 'update_inventory.php?Name=$row[Name]'>" .$row['Name']. "</a></th>";
        echo  "<th style='border: 1px solid #000;'>".$row['Price']."</th>";
        echo  "<th style='border: 1px solid #000;'>".$row['Type']."</th>";
        echo  "<th style='border: 1px solid #000;'>".$row['Available']."</th>";
        echo  "<th style='border: 1px solid #000;'>".$row['ProductID']."</th>";
        echo "</tr>";
    }
?>
 <?php echo "</tbody></table>";?>
