<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loginregister";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("<script>alert('Connection failed')</script>");
    }
    
?>