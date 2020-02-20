<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }

    if(isset($_POST['ID'])) {
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $ID = $_POST['ID'];
        $HEADING = $_POST['HEADING'];
        $BODY = $_POST['BODY'];
        $AUTHOR = $_SESSION['login_user'];
        $ACTIVE = $_POST['ACTIVE'];

        if(true) {
            $query = "UPDATE BLOGS SET HEADING='$HEADING', BODY='$BODY', ACTIVE=0 WHERE ID='$ID';";
            $result = $conn->query($query);
            header("location: ..");
        }
    }
?>