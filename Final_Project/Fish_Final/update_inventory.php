<?php
    require_once "Mysql_Login.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

//Fetch all the value from database using get method and display on the text bar
if(isset($_GET['Name'])) {
    $Name = $_GET['Name'];
    // print_r($Name);
    $query = "SELECT * FROM Inventory WHERE Name='$Name'";
    $result = $conn->query($query);
    if(!$result) die("no result");
    $rows = $result->num_rows;
    for($j = 0; $j < $rows; $j++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        // print_r($row);

    //     $available = $row['available'];

    //     $checked = "";
    //     if($available == 1) {
    //         $checked = 'checked';
    //     }
    //     echo $available; //0 or 1 show at the left-top of that page
    // needs to be a form, once submitted the modified data will be store in the database
        echo <<<_END
        <form action='update_inventory.php' method='post'>

        <pre>
        Name: <input type='text' name='Name' value='$row[Name]'>
        Price: <input type='text' name='Price' value='$row[Price]'>
        Type: <input type='text' name='Type' value='$row[Type]'>
        Available: <input type='text' name='Available' value='$row[Available]'>
        ProductID: <input type='text' name='ProductID' value='$row[ProductID]'>

        </pre>
            <input type='hidden' name='update' value='false'>
            <input type='hidden' name='Name' value='$row[Name]'>
            <input type='submit' value='UPDATE RECORD'>	
        </form>
_END;
    }
}

// if(!input($_POST["email"]) == $_POST["Name"]) {
//     $email = test_input($_POST["email"]);
//     $Name = test_input($_POST["Name"]);

if(isset($_POST['update'])) {

    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Type = $_POST['Type'];
    $Available = $_POST['Available'];
    $ProductID = $_POST['ProductID'];

    // $available = $_POST['available'];
    // $available = $available == 1 ? 1 : 0;
    // require_once "Mysql_Login.php";
    // $conn = new mysqli($hn, $un, $pw, $db);
    // if($conn->connect_error) die($conn->connect_error);

    $query = "UPDATE Inventory SET Name='$Name', Price='$Price', Type='$Type', Available= '$Available',ProductID= '$ProductID' WHERE Name='$Name'";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    header("Location: view_inventory.php");
}
$conn->close();
?>