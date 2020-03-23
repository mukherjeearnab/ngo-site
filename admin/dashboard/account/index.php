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
        <H1 class="header"><i class="fas fa-digital-tachograph"></i>  Account Manager</H1>
        <section class="section1">
            <div class="row">
                <a class="new-post" style="float: left;" href=".."><i class="fas fa-arrow-circle-left"></i> Dashboard</a>
            </div>
            <div class="row">
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box blogm" id="toggle1">
                    <h2 class="box-header"><i class="fas fa-key"></i>  Change Password</h2>
                    <form class="target1" method="POST" id="passForm" action="handler/updatePass.php" style="display: none;">
                        <p class="para"><b>Old Password</b> : <input  class="textInp" name="OLD" type="password" placeholder="Old Password Here"></p>
                        <p class="para"><b>New Password</b> : <input  class="textInp" name="NEW" type="password" placeholder="New Password Here"></p>
                        <input class="btn2" type="submit" value="Update Password">
                    </form>
                </div>
                <div class="col-md-5 px-5 my-3 mx-auto col-xs-12 box ram" id="toggle2">
                    <h2 class="box-header"><i class="fas fa-user-plus"></i>  Add User</h2>
                    <form class="target2" method="POST" id="passForm" action="handler/addUser.php" style="display: none;">
                        <p class="para"><b>Username</b> : <input  class="textInp" name="user" type="text" placeholder="Username"></p>
                        <p class="para"><b>Password</b> : <input  class="textInp" name="pass" type="text" placeholder="Password"></p>
                        <input class="btn2" type="submit" value="Add User">
                    </form>
                </div>
            </div>
            <div class="row">
                <table id="ACCOUNTS">
                    <tr>
                        <th>SL</Th>
                        <th>USERNAME</th> 
                    </tr>
                    <?php
                        $serial = 1;
                        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
                        $QUERY = "SELECT * FROM USERS ORDER BY USERNAME;";
                        $ROW =  $conn->query($QUERY);

                        if ($ROW->num_rows > 0) {
                            // output data of each row
                            while($row = $ROW->fetch_assoc()) {

                                echo "<tr><td>" . $serial . "</td><td class='title'>" . $row['USERNAME'] . "</td></tr>";
                                
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
                $("#toggle1").click(function(){
                    $(".target1").show("slow");
                });
            });
            $(document).ready(function() {
                $("#toggle2").click(function(){
                    $(".target2").show("slow");
                });
            });
        </script>
    </body>
</html>