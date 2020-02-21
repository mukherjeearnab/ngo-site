<?php
    
    if(isset($_GET['id'])) {
        $ID = $_GET['id'];
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $QUERY = "SELECT * FROM FORMS WHERE ID='$ID';";
        $ROW =  $conn->query($QUERY);
        $row = $ROW->fetch_assoc();
        //echo $ID;
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Contact Form Viewer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="res/css/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <section class="section1">
            <div class="row">
                <p class="newp" id="pasteTitle1"><b>Sender :</b> <?PHP echo $row['NAME'] ?></p>
                <p class="newp" id="dateSH"><b>E-mail:</b> <?PHP echo $row['EMAIL'] ?></p>
                <p class="newp" id="LANGU"><b>Date:</b> <?PHP echo $row['SDATE'] ?></p>
                <p class="newp" id="LANGU"><b>Subject:</b> <input class="pastedata" value="<?PHP echo $row['SUBJECT'] ?>"></p>
                <p class="newp"><b>Message</b></p>
                <textarea type="text" readonly class="pastedata" rows="19" id="pasteData1" placeholder="Paste or type your stuff here."><?PHP echo $row['MESSAGE'] ?></textarea>
            </div>
        </section>
        <script>
            
        </script>
    </body>
</html>








