<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "H@rsh@123";
        $db = "exp4";
        $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        return $conn;
    }
    function CloseCon()
    {
        $conn->close();
    }
?>