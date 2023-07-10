<?php

require 'Mysql_Login.php';
require 'itemsInformation.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);



// $conn->query($query);
// if(!result) die($conn->error);
$total = $_COOKIE['total'];
for ($i = 0; $i < $total; $i++) {
    $itemID=$_COOKIE["item$i"];
    $quantity=$_COOKIE[$itemID];
    $item_arr=explode('_',$itemID);
    $item = array($item_arr[0], $quantity, $item_arr[1]);
    $items[] = $item;

}

// for ($i = 1; $i <= $totalItems; $i++) {
//     for ($j = 1; $j <= $totalDM; $j++) {
//         if (isset($_COOKIE['product' . $i . '_quantity' . $j]) && $_COOKIE['product' . $i . '_quantity' . $j] > 0) {
//             $quantity = $_COOKIE['product' . $i . '_quantity' . $j];
//             // echo "<script>console.log('quantity:".$quantity."')</script>";
//             $item = array($i, $quantity, $j);
//             $items[] = $item;
//         }
//     }
// }
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (sizeof($items) == 0) {
        echo "<script>alert('Add item first.')</script>";
        echo "<script>self.location='home.php'</script>";
        exit;
    }
    foreach ($items as $item) {
        $query = "INSERT INTO `order`(username,ProductID,Quantity,delivery) VALUE('$username','$item[0]','$item[1]','$item[2]')";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
    }
    echo "<script>alert('You have successfully checked out!.')</script>";
    echo "<script>self.location='home.php'</script>";
    // for ($i = 1; $i <= $totalItems; $i++) {
    //     for ($j = 1; $j <= $totalDM; $j++) {
    //         if (isset($_COOKIE['product' . $i . '_quantity' . $j]) && $_COOKIE['product' . $i . '_quantity' . $j] > 0) {
    //             setcookie('product' . $i . '_quantity' . $j);
    //         }
    //     }
    // }
    setcookie('total');
    for ($i = 0; $i < $total; $i++) {
        $itemID=$_COOKIE["item$i"];
        setcookie("item$i");
        setcookie($itemID);
    }
} else {
    header('Location: login.html');
}
$conn->close();
