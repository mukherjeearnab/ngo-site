<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }
  
    $username = $_SESSION['login_user'];

    if(isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "INSERT INTO USERS(USERNAME, PASSWORD) VALUES('$user', SHA2('$pass', 256));";
        echo $query;
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $conn->query($query);

        header("location: ..");
    }

?>