<?php
require_once 'Mysql_Login.php';
// print_r($_POST);

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
// $password = password_hash('admin',PASSWORD_DEFAULT);
// $query1 = "INSERT INTO `Admin1` (`firstname`, `lastname`, `email`, `username`,`password`) VALUES ('Jiarui', 'Wang', 'jr@gmail.com', 'jr@gmail.com','$password');";
// $result1 = $conn->query($query1);  This is a hacker way to add a admin user into the database
// if(!$result1) die($conn->error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);

	//get password from DB w/ SQL
	$query = "SELECT password FROM Admin1 WHERE username = '$tmp_username'";
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
        echo "<a href='view_stores.php'> Welcome Admin! </a>";
	}
	else
	{	
		echo '<script>alert("Password doesn‘t match your username, please check it")</script>';	
		echo "<a href='adminlogin.html'> Back to Admin login page </a>";
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