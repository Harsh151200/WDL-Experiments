<?php
include "dbconn.php";
$conn = OpenCon();


// Submitting registration details
if(isset($_POST['submit-reg']))
{
	
$name = $_POST['name'];
$email = $_POST['email'];
$passwrd = $_POST['psw'];
$RePasswrd = $_POST['psw-repeat']; 
if($passwrd==$RePasswrd)
{
	$check = mysqli_query($conn,"select * from users where  Email ='" . $email . "'");

	if (mysqli_num_rows($check) < 1){
		
		$sql="INSERT INTO `users` (`id`, `Name`, `Email`, `Password`) VALUES(NULL,'$name','$email','$passwrd')";
		mysqli_query($conn,$sql);
		echo "succesful registration";
		header('Location:http://localhost/wdl-exp/exp4/login.html');
	}
	else{
			echo "<script type='text/javascript'>
						alert('User exists!');";
						echo'window.location= "registration.html"';
				echo "</script>";
		}
}
else
{
	//echo "Passwords didn't match";
	 echo "<script type='text/javascript'>
                alert('Invalid details!!!');";
				echo'window.location= "registration.html"';
           echo "</script>";
}
}

// Login
if (isset($_POST['submit-log'])) {
	session_start();
	$email = $_POST['email'];
	$password = $_POST['psw'];
	$sql = "select * from users where Email='" . $email . "' AND Password='" . $password . "'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$_SESSION["email"] = $email;

		header('Location:profile.php');
		exit();
	} else {
		//echo "You have entered invalid details";
		echo "<script type='text/javascript'>
                alert('Invalid details!!!');";
		echo 'window.location= "login.html"';
		echo "</script>";
		exit();
	}
}

// update password redirect
if(isset($_POST['update-password'])){
	header('Location:Password_Update.php');
}

if(isset($_POST['done'])){
	session_start();
	$email = $_SESSION['email'];
	$passwrd = $_POST['psw'];
	$RePasswrd = $_POST['psw-repeat']; 
	if($passwrd==$RePasswrd){
	
		$q = " UPDATE `users` SET `Password` = '" . $passwrd . "' WHERE `users`.`Email` = '" . $email . "' ";
		$query = mysqli_query($conn,$q);
	    echo "<script type='text/javascript'>
	    alert('Record updated successfully');";
	    echo'window.location= "profile.php"';
	   echo "</script>";
	echo "record updated successfully";
	}
	else{
		echo "<script type='text/javascript'>
		alert('Passwords didn't match');";
		echo'window.location= "Password_Update.php"';
	   echo "</script>";
	}
}

//logout
if(isset($_POST['logout'])){
	session_start();
	unset($_SESSION['email']);
	session_destroy();
	header("Location:login.html");
	exit;
}


?>