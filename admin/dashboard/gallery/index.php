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
        <H1 class="header"><i class="fas fa-images"></i>  Gallery Manager</H1>
        <section class="section1">
            <div class="row">
                <a class="new-post" style="float: left;" href=".."><i class="fas fa-arrow-circle-left"></i> Dashboard</a>
                <a class="new-post" href="editor.php"><i class="fas fa-plus-circle"></i> New Post</a>
            </div>
            <div class="row">
                <table id="BLOGS">
                    <tr>
                        <th>SL</Th>
                        <th>TITLE</th> 
                        <th>AUTHOR</th> 
                        <th>DATE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                        session_start();
                        if(!isset($_SESSION['login_user'])){ 
                            header("location: .."); // Redirecting To Home Page 
                        }

                        $serial = 1;
                        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
                        $QUERY = "SELECT * FROM BLOGS ORDER BY CDATE DESC;";
                        $ROW =  $conn->query($QUERY);

                        if ($ROW->num_rows > 0) {
                            // output data of each row
                            while($row = $ROW->fetch_assoc()) {
                                $id = $row['ID'];
                                $ACTION = '<a href="editor.php?id='.$id.'"><i class="fas fa-edit"></i> Edit Post</a>';

                                if($row['ACTIVE'] == 1) 
                                    $row['ACTIVE'] = '<a style="color: #4CAF50"><i class="fas fa-check-circle"></i> Published</a>';
                                elseif ($row['ACTIVE'] == 0)
                                    $row['ACTIVE'] = '<a style="color: #f44336"><i class="fas fa-dumpster-fire"></i> Bin</a>';
                                else
                                    $row['ACTIVE'] = '<a style="color: #FF9800"><i class="fab fa-firstdraft"></i> Draft</a>';

                                echo "<tr><td>" . $serial . "</td><td class='title'>" . $row["HEADING"]. "</td><td>" . $row["AUTHOR"] . "</td><td>" . $row["CDATE"] . "</td><td>" . $row["ACTIVE"] . "</td><td>" . $ACTION . "</td></tr>";
                                
                                ++$serial;
                            }
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
                </table>
            </div>
        </section>
    </body>
</html>