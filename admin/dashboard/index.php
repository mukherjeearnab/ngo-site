<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }
  
    $username = $_SESSION['login_user'];

    $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");

    $BQuery1 = "SELECT COUNT(*)'COUNT' FROM BLOGS WHERE ACTIVE = 1;";
    $BQuery2 = "SELECT COUNT(*)'COUNT' FROM BLOGS WHERE ACTIVE = -1;";
    $BQuery3 = "SELECT CDATE FROM BLOGS ORDER BY CDATE DESC LIMIT 1;";
    $bReply1 = mysqli_fetch_assoc(mysqli_query($conn, $BQuery1))['COUNT'];
    $bReply2 = mysqli_fetch_assoc(mysqli_query($conn, $BQuery2))['COUNT'];
    $bReply3 = mysqli_fetch_assoc(mysqli_query($conn, $BQuery3))['CDATE'];

    $GQuery1 = "SELECT COUNT(*)'COUNT' FROM IMGS;";
    $GQuery2 = "SELECT SUM(SIZE)'SUM' FROM IMGS;";
    $GQuery3 = "SELECT UTIME FROM IMGS ORDER BY UTIME DESC LIMIT 1;";
    $gReply1 = mysqli_fetch_assoc(mysqli_query($conn, $GQuery1))['COUNT'];
    $gReply2 = mysqli_fetch_assoc(mysqli_query($conn, $GQuery2))['SUM'];
    $gReply3 = mysqli_fetch_assoc(mysqli_query($conn, $GQuery3))['UTIME'];

    $CQuery1 = "SELECT SDATE FROM FORMS ORDER BY SDATE DESC LIMIT 1;";
    $CQuery2 = "SELECT COUNT(*)'COUNT' FROM FORMS;";
    $cReply1 = mysqli_fetch_assoc(mysqli_query($conn, $CQuery1))['SDATE'];
    $cReply2 = mysqli_fetch_assoc(mysqli_query($conn, $CQuery2))['COUNT'];
    
    $AQuery1 = "SELECT COUNT(*)'COUNT' FROM USERS;";
    $aReply1 = mysqli_fetch_assoc(mysqli_query($conn, $AQuery1))['COUNT'];

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
        <H1 class="header"><i class="fas fa-digital-tachograph"></i>  <b>SiteManager</b> Dashboard</H1>
        <section class="section1">
            <div class="row">
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box blogm" onclick="location.href='blog'">
                    <h2 class="box-header"><i class="fas fa-blog"></i>  Blog Manager</h2>
                    <p class="box-content"><b>Active Posts</b> : <?php echo $bReply1; ?></p>
                    <p class="box-content"><b>Draft</b> : <?php echo $bReply2; ?></p>
                    <p><b>Latest Post</b> : <?php echo $bReply3; ?></p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box ram" onclick="location.href='gallery'">
                    <h2 class="box-header"><i class="fas fa-images"></i>  Gallery Manager</h2>
                    <p class="box-content"><b>Total Images</b> : <?php echo $gReply1; ?></p>
                    <p class="box-content"><b>Media Size</b> : <?php echo $gReply2/(1024*1024)." MB"; ?></p>
                    <p class="box-content"><b>Last Upload</b> : <?php echo $gReply3; ?></p>
                </div>
                
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box ter" onclick="location.href='contact'">
                    <h2 class="box-header"><i class="fab fa-wpforms"></i>  Contact Forms</h2>
                    <p>Check & Manage Contact Forms.</p>
                    <p class="box-content"><b>Last Submit</b> : <?php echo $cReply1; ?></p>
                    <p class="box-content"><b>Total Forms</b> : <?php echo $cReply2; ?></p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box hdd"  onclick="location.href='account'">
                    <h2 class="box-header"><i class="fas fa-users"></i>  Accounts Manager</h2>
                    <p class="box-content"><b>Current User</b> : <?php echo $username; ?></p>
                    <p class="box-content"><b>Total Accounts</b> : <?php echo $aReply1; ?></p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box reb" onclick="location.href='sett'">
                    <h2 class="box-header"><i class="fas fa-cogs"></i>  Settings</h2>
                    <p>Modify settings for the site.</p>
                    <p><i class="fas fa-exclamation-triangle"></i> Proceed with caution.</p>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box sdn" onclick="location.href='../logout.php'">
                    <h2 class="box-header"><i class="fas fa-sign-out-alt"></i>  Logout</h2>
                    <p></p>
                    <p>Logout of <b>SiteManager</b> Dashboard.</p>
                </div>
            </div>
        </section>
    </body>
</html>