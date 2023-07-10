<?php
    require_once "Mysql_Login.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['username'])) {
    $username = $_GET['username'];



    $query = "SELECT * FROM user1 WHERE username='$username'";


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
        <form action='update_users.php' method='post'>


        <pre>
        
        username: <input type='text' name='username' value='$row[username]'>
    
        firstname: <input type='text' name='firstname' value='$row[firstname]'>
        lastname: <input type='text' name='lastname' value='$row[lastname]'>
        birthday: <input type='text' name='birthday'  value='$row[birthday]'>
    
        email: <input type='text' name='email'  value='$row[email]'>
        password: <input type='text' name='password'  value='$row[password]'>
    
        
        </pre>
    
            <input type='hidden' name='update' value='yes'>
            <input type='hidden' name='username' value='$row[username]'>
            <input type='submit' value='UPDATE RECORD'>	
        </form>
_END;
    }
}

// if(!input($_POST["email"]) == $_POST["username"]) {
//     $email = test_input($_POST["email"]);
//     $username = test_input($_POST["username"]);

if(isset($_POST['update'])) {

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    // $available = $_POST['available'];
    
    // $available = $available == 1 ? 1 : 0;

    // require_once "Mysql_Login.php";

    // $conn = new mysqli($hn, $un, $pw, $db);
    // if($conn->connect_error) die($conn->connect_error);

    $query = "UPDATE user1 SET firstname='$firstname', lastname='$lastname', birthday='$birthday', email='$email' WHERE username='$username'";


    $result = $conn->query($query);
    if(!$result) die($conn->error);

    header("Location: view_users.php");

    

}
$conn->close();







?>
