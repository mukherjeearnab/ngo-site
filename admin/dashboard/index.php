<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: ../login.php"); // Redirecting To Home Page 
    }
  
    //GETTING REQUIRED USER PROFILE DATA
    $username = $_SESSION['login_user'];
    $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
    $query = "SELECT * FROM PROFILE WHERE USERNAME = '$username'";
    $ses_sql = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($ses_sql); 
    $row['USERNAME'];
    $cookie_name = "user";
    $cookie_value = $username;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    echo $username;
?>