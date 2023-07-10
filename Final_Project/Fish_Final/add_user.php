<?php
    require_once "Mysql_Login.php";
    print_r($_POST);
    
    if(isset($_POST['username'])){
        $conn = new mysqli($hn,$un,$pw,$db);
        if($conn -> connect_error) die($conn -> connect_error);

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $username = $_POST['username'];
        $temp = $_POST['password1'];
        $password = password_hash($temp,PASSWORD_DEFAULT);

        // echo( $firstname . ' ' . $lastname . ' '. $email . ' '. $birthday . ' '. $username . ' ');
        $query = "INSERT INTO user1(firstname,lastname,birthday,email,username,password) VALUES('$firstname','$lastname','$birthday','$email','$username','$password')";
        print_r($query);
        $result = $conn -> query($query);
        if(!$result)die(mysqli_error($conn));
    }

    header("Location:login.html");
      
?>
