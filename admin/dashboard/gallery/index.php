<!DOCTYPE html>
<html>
    <head>
        <title>[SERVER NAME] Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="res/css/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <H1 class="header"><i class="fas fa-images"></i>  Gallery Manager</H1>
        <section class="section1">
            <div class="row">
                <a class="new-post" style="float: left;" href=".."><i class="fas fa-arrow-circle-left"></i> Dashboard</a>
                <a class="new-post" id="uToggle"><i class="fas fa-upload"></i> Upload Image</a>
                <form style="float: right;" action="handler/imgUpload.php" id="uploadF" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            </div>
            <div class="row">
                <table id="GALLERY">
                    <tr>
                        <th>SL</Th>
                        <th>IMAGE</th> 
                        <th>SIZE (KB)</th>
                        <th>UPLOAD DATE</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                        session_start();
                        if(!isset($_SESSION['login_user'])){ 
                            header("location: .."); // Redirecting To Home Page 
                        }

                        $serial = 1;
                        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
                        $QUERY = "SELECT * FROM IMGS ORDER BY UTIME DESC;";
                        $ROW =  $conn->query($QUERY);

                        if ($ROW->num_rows > 0) {
                            // output data of each row
                            while($row = $ROW->fetch_assoc()) {
                                $IMG = '<img class="image-v" src="res/uploads/'.$row['FNAME'].'" />';

                                $row['SIZE'] = $row['SIZE']/1024 . ' KB';
                                $LINK = '<a class="img-link" target="blank" href="res/uploads/'.$row['FNAME'].'" /><i class="fas fa-external-link-alt"></i></a>';

                                echo "<tr><td>" . $serial . "</td><td>" . $IMG . "</td><td>" . $row["SIZE"] . "</td><td>" . $row["UTIME"] . "</td><td>" . $LINK . "</td></tr>";
                                
                                ++$serial;
                            }
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
                </table>
            </div>
        </section>

        <script>
            $(document).ready(function() {
                $("#uToggle").click(function(){
                    $("#uploadF").toggle("slow");
                });
            });
        </script>
    </body>
</html>