<?php   
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $filepath = '../res/uploads/'.$id;
        
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $query = "DELETE FROM IMGS WHERE FNAME='$id';";
        $conn->query($query);
        unlink($filepath);
        header("location: ..");
    }

?>