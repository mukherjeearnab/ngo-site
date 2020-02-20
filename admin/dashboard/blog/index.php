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
        <H1 class="header"><i class="fas fa-blog"></i>  Blogs Manager</H1>
        <section class="section1">
            <div class="row">
                <a class="new-post"><i class="fas fa-plus-circle"></i> New Post</a>
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
                        $serial = 1;
                        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
                        $QUERY = "SELECT * FROM BLOGS ORDER BY CDATE DESC;";
                        $ROW =  $conn->query($QUERY);

                        if ($ROW->num_rows > 0) {
                            // output data of each row
                            while($row = $ROW->fetch_assoc()) {
                                $ACTION = "Hihi";

                                echo "<tr><td>" . $serial . "</td><td>" . $row["HEADING"]. "</td><td>" . $row["AUTHOR"] . "</td><td>" . $row["CDATE"] . "</td><td>" . $row["ACTIVE"] . "</td><td>" . $ACTION . "</td></tr>";
                                
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