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
        //$ACTIVE = $_POST['ACTIVE'];

        echo $ID;

        if($ID == 'null') {
            $query = "INSERT INTO BLOGS(ID, HEADING, BODY, CDATE, AUTHOR, ACTIVE) VALUES(SHA2('$BODY.$HEADING', 256), '$HEADING', '$BODY', NOW(), '$AUTHOR', 1);";
            echo $query;
            $result = $conn->query($query);
            //header("location: ..");
        }
        else {
            $query = "UPDATE BLOGS SET HEADING='$HEADING', BODY='$BODY' WHERE ID='$ID';";
            $result = $conn->query($query);
            echo $query;
            //header("location: ..");
        }
    }

?>