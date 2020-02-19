<?php
    session_start(); // Starting Session 
    $error = ''; // Variable To Store Error Message 
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
            $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
            
            // SQL query to fetch information of registerd USERS and finds user match. 
            $query = "SELECT USERNAME, PASSWORD FROM USERS where USERNAME=? AND PASSWORD=? LIMIT 1"; 
            // To protect MySQL injection for Security purpose 
            $stmt = $conn->prepare($query); 
            $stmt->bind_param("ss", $username, $password); 
            $stmt->execute(); 
            $stmt->bind_result($username, $password); 
            $stmt->store_result(); 
            if($stmt->fetch()) //fetching the contents of the row { 
            $_SESSION['login_user'] = $username; // Initializing Session
            if($username == 'admin') { 
                $cookie_name = "user";
                $cookie_value = $username;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                header("location: admin"); // Redirecting To Profile Page
            }
            else
                echo $username;//header("location: home.php");
        } 
        mysqli_close($conn); // Closing Connection 
    } 
?>