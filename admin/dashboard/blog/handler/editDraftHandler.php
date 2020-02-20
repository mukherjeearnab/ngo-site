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

        if($_POST['ID'] == 'null') {
            $query = "INSERT INTO BLOGS(ID, HEADING, BODY, CDATE, AUTHOR, ACTIVE) VALUES(SHA2('".addslashes($BODY.$HEADING)."', 256), '".addslashes($HEADING)."', '".addslashes($BODY)."', NOW(), '$AUTHOR', -1);";
            $result = $conn->query($query);
            header("location: ..");
        }
    }
?>