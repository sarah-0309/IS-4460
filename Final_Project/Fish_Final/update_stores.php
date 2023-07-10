<?php
    require_once "Mysql_Login.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['Name'])) {
    $Name = $_GET['Name'];
    print_r($Name);
    $query = "SELECT * FROM store WHERE Name='$Name'";
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

        echo <<<_END
        <form action='update_stores.php' method='post'>


        <pre>
        Name: <input type='text' name='Name' value='$row[Name]'>
        Address: <input type='text' name='Address' value='$row[Address]'>
        Open_hour: <input type='text' name='Open hour' value='$row[Open_hour]'>
        Phone: <input type='text' name='Phone'  value='$row[Phone]'>
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
    $Address = $_POST['Address'];
    $Open_hour = $_POST['Open_hour'];
    $Phone = $_POST['Phone'];

    // $available = $_POST['available'];
    // $available = $available == 1 ? 1 : 0;
    // require_once "Mysql_Login.php";
    // $conn = new mysqli($hn, $un, $pw, $db);
    // if($conn->connect_error) die($conn->connect_error);

    $query = "UPDATE store SET Address='$Address', Open_hour='$Open_hour', Phone='$Phone' WHERE Name='$Name'";
    $result = $conn->query($query);
    if(!$result) die($conn->error);
    header("Location: view_stores.php");

}
$conn->close();
?>
