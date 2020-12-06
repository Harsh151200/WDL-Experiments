<?php
    include 'dbconn.php';
    $conn = OpenCon();
    session_start();
    if(!isset($_SESSION['email'])){
        echo "<script type='text/javascript'>
        alert('You need to Login first');";
        echo 'window.location= "login.html"';
        echo "</script>";
    }
    $email = $_SESSION["email"];
    $get_name = "select Name from users  where Email ='$email'";
    $query = mysqli_query($conn, $get_name);
    $row = mysqli_fetch_array($query);
    $Uname = $row['Name'];

    //update password
 
?>

<!DOCTYPE html>
<html>
<head>
 <title>Update Password</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <br>
<?php
        echo "<h1 style = 'text-align:center;'>Welcome $Uname !!</h1>";
      ?>
 <div class="col-lg-6 m-auto">
 
 <form method="post" action="action.php">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Update Password </h1>
 </div><br>

 <label><b>Password:</b></label>
 <input type="password" placeholder="Password" name="psw" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
 <label for="psw-repeat"><b>Repeat Password</b></label>
<input type="password" placeholder="Repeat Password" name="psw-repeat" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
	<br>  
 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>