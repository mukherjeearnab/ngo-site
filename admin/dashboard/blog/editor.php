<?php
    session_start();
    if(!isset($_SESSION['login_user'])){ 
        header("location: .."); // Redirecting To Home Page 
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM BLOGS WHERE ID='$id';";
        $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        //echo $result['ID'];
    }
    else {

    }
    
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
        <H1 class="header"><i class="fas fa-edit"></i>  Blogs Editor</H1>
        <section class="section1">
            <div class="row">
                <a class="save-post" onclick="document.getElementById('editorDump').submit();"><i class="far fa-save"></i> Save & Publish</a>
                <?php if(!isset($_GET['id'])) echo '<a class="draft-post" onclick="draftPost();"><i class="fab fa-firstdraft"></i> Save As Draft</a>';?>
                <?php if(isset($_GET['id'])) echo '<a class="delete-post" onclick="binPost();"><i class="far fa-trash-alt""></i> Send to Bin</a>';?>
            </div>
            <div class="row">
                <form class="submitF" id="editorDump" method="POST" action="handler/editSaveHandler.php">
                    <input class="text-inp" id="ID" type="hidden" value="<?php if(isset($_GET['id'])) echo $result['ID']; else echo 'null'; ?>" name="ID" required>
                    <input class="text-inp" id="HEADING" type="text" value="<?php if(isset($_GET['id'])) echo $result['HEADING']; ?>" name="HEADING" placeholder="Blog Title here ...." required>
                    <textarea class="body-text" id="REASON" name="BODY" cols="110" rows="18" maxlength="4999" placeholder="Blog Post Body here...." required><?php if(isset($_GET['id'])) echo $result['BODY']; ?></textarea>
                </form>
            </div>
        </section>

        <script>
            function draftPost(){
                document.getElementById('editorDump').action = "handler/editDraftHandler.php";
                document.getElementById('editorDump').submit();
            }
            function binPost(){
                document.getElementById('editorDump').action = "handler/editBinHandler.php";
                document.getElementById('editorDump').submit();
            }
        </script>
    </body>
</html>