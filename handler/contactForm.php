<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }

    if(isset($_POST['email'])) {
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $NAME = $_POST['name'];
        $EMAIL = $_POST['email'];
        $MESSAGE = $_POST['message'];
        
        echo $EMAIL;

        $query = "INSERT INTO FORMS(NAME, EMAIL, MESSAGE, SDATE) VALUES('".addslashes($NAME)."', '".addslashes($EMAIL)."', '".addslashes($MESSAGE)."', NOW());";
        echo $query;
        $result = $conn->query($query);
        header("location: ..");
    }

?>