<?php
    session_start(); // Starting Session 
    $error = ''; // Variable To Store Error Message 
    //echo "testing";
    if (isset($_POST['submit'])) { 
        if (empty($_POST['username']) || empty($_POST['password'])) { 
            $error = "Username or Password is invalid"; 
        } 
        else{ 
            // Define $username and $password 
            $username = $_POST['username']; 
            $password = $_POST['password']; 
            
            // mysqli_connect() function opens a new connection to the MySQL server.
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', "admin");
            define('DB_PASSWORD', 'ASad1234*');
            define('DB_DATABASE', 'sitedb');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
            
            // SQL query to fetch information of registerd USERS and finds user match. 
            $query = "SELECT USERNAME FROM USERS where USERNAME='$username' AND PASSWORD=SHA2('$password', 256);"; 
            // To protect MySQL injection for Security purpose 
            $reply =  $conn->query($query);
            //$reply = $reply->fetch_assoc();
            
            echo $reply->num_rows;
            if($reply->num_rows > 0) //fetching the contents of the row { 
                $_SESSION['login_user'] = $username; // Initializing Session
            else
                echo $username;//header("location: home.php");
        } 
        mysqli_close($conn); // Closing Connection 
    } 
?>