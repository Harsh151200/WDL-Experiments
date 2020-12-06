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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .btn-div{
            margin: 10vh 0vw 10vh 35vw;
        }

        button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 20%;
                opacity: 0.9;
                }
        button:hover{
            background-color: orangered;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1 style = 'text-align:center;'>Welcome $Uname !!</h1>";
      ?>
      <div class="btn-div">
<!--         
        <button type="submit" class="signupbtn" name="update-pass">
            <a href="Password_Update.html" style="text-decoration: none; color:white;">Update Password</a> 
        </button> -->
        <form action="action.php" method="POST">
        <button type="submit" class="signupbtn" name="update-password">Update Password</button>
        <button type="submit" class="signupbtn" name="logout">Logout</button>
        </form>

      </div>
     
</body>
</html>