<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }
  
    $username = $_SESSION['login_user'];

    if(isset($_POST['OLD']) && isset($_POST['NEW'])) {
        $OLD = $_POST['OLD'];
        $NEW = $_POST['NEW'];
        $query = "UPDATE USERS SET PASSWORD= IF(PASSWORD=SHA2('$OLD', 256), SHA2('$NEW', 256), PASSWORD) WHERE USERNAME='$username';";
        echo $query;
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $conn->query($query);

        header("location: ../../../logout.php");
    }

?>