<?php
    // mysqli_connect() function opens a new connection to the MySQL server. 
    $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb"); 
    session_start();// Starting Session 
    
    // Storing Session 
    $user_check = $_SESSION['login_user']; 

    // SQL Query To Fetch Complete Information Of User 
    $query = "SELECT USERNAME FROM USERS WHERE USERNAME = '$user_check'"; 
    $ses_sql = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($ses_sql); 
    $login_session = $row['USERNAME'];
?>