
<?php
    //echo $_FILES["fileToUpload"]["tmp_name"];
    $time = time();
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $filesize = $_FILES["fileToUpload"]["size"];
    $filehash = hash('adler32', $time.$filename.$filesize);
    $ext = pathinfo($filename);
    $filepath = $filehash.'.'.$ext['extension'];
    
    
    $target_dir = "../res/uploads/";

    $target_file = $target_dir . $filepath;
    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "<H1>File is an image - " . $check["mime"] . ".</H1>";
            $uploadOk = 1;
        } else {
            echo "<H1>File is not an image.</H1>";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<H1>Sorry, file already exists.</H1>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<H1>Sorry, your file is too large.<BR>Try files lesss that 500KB of size.</H1>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<H1>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</H1>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<H1>Sorry, your file was not uploaded.</H1>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<H1>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</H1>";
            $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
            $query = "INSERT INTO IMGS(FNAME, SIZE, UTIME) VALUES('$filepath', $filesize, NOW());";
            $conn->query($query);
        } else {
            echo "<H1>Sorry, there was an error uploading your file.</H1>";
        }
    }

        
    

    //header("location: ..");
    header( "refresh:10;url=.." );
?>
