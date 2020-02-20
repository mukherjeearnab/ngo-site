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

        <link rel="stylesheet" href="res/css/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <H1 class="header"><i class="fas fa-digital-tachograph"></i>  <b>SiteManager</b> Dashboard</H1>
        <section class="section1">
            <div class="row">
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box blogm" onclick="location.href='blog'">
                    <h2 class="box-header"><i class="fas fa-blog"></i>  Blog Manager</h2>
                    <p class="box-content"><b>Active Posts</b> : </p>
                    <p class="box-content"><b>Draft</b> : </p>
                    <p><b>Latest Post</b> : </p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box ram">
                    <h2 class="box-header"><i class="fas fa-images"></i>  Gallery Manager</h2>
                    <p class="box-content"><b>Total Images</b> : </p>
                    <p class="box-content"><b>Media Size</b> : </p>
                    <p class="box-content"><b>Last Upload</b> : </p>
                </div>
                
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box ter">
                    <h2 class="box-header"><i class="fab fa-wpforms"></i>  Contact Forms</h2>
                    <p>Check & Manage Contact Forms</p>
                    <p class="box-content"><b>Last Submit</b> : </p>
                    <p class="box-content"><b>Total Forms</b> : </p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box hdd">
                    <h2 class="box-header"><i class="fas fa-users"></i>  Accounts Manager</h2>
                    <p class="box-content"><b>Current User</b> : <?php echo $username; ?></p>
                    <p class="box-content"><b>Last Edit</b> : </p>
                    <p class="box-content"><b>Total Accounts</b> : </p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box reb" onclick="reboot();">
                    <h2 class="box-header"><i class="fas fa-cogs"></i>  Settings</h2>
                    <p>Modify settings for the site.</p>
                    <p><i class="fas fa-exclamation-triangle"></i> Proceed with caution.</p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box sdn" onclick="location.href='../logout.php'">
                    <h2 class="box-header"><i class="fas fa-sign-out-alt"></i>  Logout</h2>
                    <p></p>
                    <p>Logout of <b>SiteManager</b> Dashboard</p>
                </div>
            </div>
        </section>
    </body>
</html>