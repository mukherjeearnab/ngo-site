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
        <H1 class="header"><i class="fab fa-wpforms"></i>  Contact Forms</H1>
        <section class="section1">
            <div class="row">
                <a class="new-post" style="float: left;" href=".."><i class="fas fa-arrow-circle-left"></i> Dashboard</a>
            </div>
            <div class="row">
                <table id="GALLERY">
                    <tr>
                        <th>SL</Th>
                        <th>NAME</th> 
                        <th>E-MAIL</th>
                        <th>SUBJECT</th>
                        <th>DATE</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                        session_start();
                        if(!isset($_SESSION['login_user'])){ 
                            header("location: .."); // Redirecting To Home Page 
                        }

                        $serial = 1;
                        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
                        $QUERY = "SELECT * FROM FORMS ORDER BY SDATE DESC;";
                        $ROW =  $conn->query($QUERY);

                        if ($ROW->num_rows > 0) {
                            // output data of each row
                            while($row = $ROW->fetch_assoc()) {

                                $L2 = '<a class="del-link" target="blank" value="'.$row['ID'].'" onclick="deleteFRM(\''.$row['ID'].'\');"><i class="fas fa-trash-alt"></i></a>';
                                $SP = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                $LINK = '<a class="img-link" target="blank" href="viewC.php?id='.$row['ID'].'" /><i class="fas fa-eye"></i></a>'.$SP.$L2;
                                
                                echo "<tr><td>" . $serial . "</td><td class='title'>" . $row['NAME'] . "</td><td class='title'>" . $row["EMAIL"] . "</td><td class='title'>" . $row["SUBJECT"] . "</td><td>" . $row['SDATE'] . "</td><td>" . $LINK . "</td></tr>";
                                
                                ++$serial;
                            }
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
                </table>
            </div>
        </section>

        <script>
            function deleteFRM(frm) {
                var url = 'handler/delFRM.php?id=' + frm;

                var r = confirm("Are you sure you want to DELETE the Contact Form?");
                if (r == true)
                    window.location.href = url;
                //console.log(url);
            }
        </script>
    </body>
</html>