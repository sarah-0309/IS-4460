<?php



require_once "Mysql_Login.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){
 
 
 $username  = $_POST['username'];
 $query = "DELETE from user1 where username='$username' "; 
 
 $result = $conn->query($query);
 if(!$result) die($conn->error);


 header("Location: view_users.php");
}
$conn->close(); 
 
?>