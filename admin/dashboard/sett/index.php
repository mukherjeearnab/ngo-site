<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }
  
    $username = $_SESSION['login_user'];
    
    //echo $username;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>[SERVER NAME] Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="res/css/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <H1 class="header"><i class="fas fa-cogs"></i>  Site Settings</H1>
        <section class="section1">
            <div class="row">
                <a class="new-post" style="float: left;" href=".."><i class="fas fa-arrow-circle-left"></i> Dashboard</a>
            </div>
            <div class="row">
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box blogm" id="toggle1">
                    <h2 class="box-header"><i class="fas fa-key"></i>  Set Site Background</h2>
                    <form  action="handler/imgUpload.php" id="uploadF" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                </div>
            </div>
        </section>

        <script>
            $(document).ready(function() {
                $("#toggle1").click(function(){
                    $("#uploadF").show("slow");
                });
            });
        </script>
    </body>
</html>