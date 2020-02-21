<?php   
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $query = "DELETE FROM FORMS WHERE ID='$id';";
        $conn->query($query);
        header("location: ..");
    }

?>