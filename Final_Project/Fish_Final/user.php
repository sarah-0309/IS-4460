<?php
require_once 'Mysql_Login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);

	//get password from DB w/ SQL
	$query = "SELECT password FROM user1 WHERE username = '$tmp_username'";
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo '<script>alert("Successfully log in")</script>';
        session_start();
        $_SESSION['username'] = $tmp_username;
        echo "<a href='home.php'> Continue </a>";
	}
	else
	{	
		echo '<script>alert("Password doesn‘t match your username, please check it")</script>';	
		echo "<a href='login.html'> Back to login page </a>";
	}
	
}
$conn->close();

//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>