<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Omnifood is a premium food delivery system with the mission to bring affordable and healthy meals to as many people as possible">

        <link rel="stylesheet" type="text/css" href="ven/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="ven/css/grid.css">
        <link rel="stylesheet" type="text/css" href="ven/css/animate.css">
        <link rel="stylesheet" type="text/css" href="ven/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="res/css/style.css">
        <link rel="stylesheet" type="text/css" href="res/css/queries.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">

        <title>Omnifood</title>

        <meta name="theme-color" content="#ffffff">
     
        <script src="https://kit.fontawesome.com/84ef880659.js" crossorigin="anonymous"></script>     
    </head>
    <body>
        <header>
            <nav>
                <div class="row">
                    <img src="res/img/logo-white.png" alt="omnifood logo" class="logo">
                    <img src="res/img/logo.png" alt="omnifood logo" class="logo-black">
                    <ul class="main-nav js--main-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#mission">Project&nbsp;&nbsp;&&nbsp;&nbsp;Mission</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                    <a class="mobile-nav-icon"><i class="fas fa-bars js--nav-icon"></i></a>
                </div>
            </nav>
            <div class="hero-text-box">
                <h1>You Make a Difference…<br>We Make It Easier.</h1>
                <a class="btn btn-full js--scroll-to-plans" href="#">Projects</a>
                <a class="btn btn-ghost js--scroll-to-start" href ="#">Donate</a>    
            </div>
        </header>

        <section class="section-mission" id="mission">
            <div class="row">
                <h2>Project&nbsp;&nbsp;&&nbsp;&nbsp;Mission</h2>
            </div>
            <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Nunc congue nisi vitae suscipit tellus. Porta nibh venenatis cras sed. Egestas sed tempus urna et pharetra pharetra massa. Et netus et malesuada fames. Mauris augue neque gravida in fermentum et sollicitudin. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Pellentesque eu tincidunt tortor aliquam nulla. Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Ipsum consequat nisl vel pretium. Sit amet nisl suscipit adipiscing bibendum est ultricies integer.</p>
            </div>
        </section>

        <section class="section-gallery2" id="gallery2">
            <div class="row">
                <h2>Gallery</h2>
            </div>
            <div class="row">
                <div id="slider">
                    <ul class="slides">
                        <?php 
                            $conn = mysqli_connect("localhost", "admin", "ASad1234*", "sitedb");
                            $QUERY = "SELECT * FROM IMGS ORDER BY UTIME DESC LIMIT 10;";
                            $ROW =  $conn->query($QUERY);
    
                            if ($ROW->num_rows > 0) {
                                // output data of each row
                                while($row = $ROW->fetch_assoc()) {
                                    $IMG = '<img src="./admin/dashboard/gallery/res/uploads/'.$row['FNAME'].'" />';
                                    echo "<li class=\"slide\">" . $IMG;
                                }
                            } else { echo "0 results"; }
                            $conn->close();
                        ?>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section-about" id="about">
            <div class="row">
                <h2>About Us</h2>
            </div>
            <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Nunc congue nisi vitae suscipit tellus. Porta nibh venenatis cras sed. Egestas sed tempus urna et pharetra pharetra massa. Et netus et malesuada fames. Mauris augue neque gravida in fermentum et sollicitudin. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Pellentesque eu tincidunt tortor aliquam nulla. Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Ipsum consequat nisl vel pretium. Sit amet nisl suscipit adipiscing bibendum est ultricies integer.</p>
            </div>
        </section>

        <section class="section-gallery">
            <ul class="gallery-showcase clearfix">
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/1.png">
                    </figure>
                </li>
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/2.png">
                    </figure>
                </li>
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/3.png">
                    </figure>
                </li>
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/4.png">
                    </figure>
                </li>
            </ul>
            <ul class="gallery-showcase clearfix">
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/5.png">
                    </figure>
                </li>
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/6.png">
                    </figure>
                </li>
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/7.png">
                    </figure>
                </li>
                <li>
                    <figure class="gallery-photo">
                        <img src="res/img/8.png">
                    </figure>
                </li>
            </ul>
        </section>

        <section class="section-form" id="contact">
            <div class="row">
                <h2>We're happy to hear from you!</h2>
            </div>
            <div class="row">
                <form method="POST" action="./handler/contactForm.php" class="contact-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Name</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="name" id="name" placeholder="Please enter your name." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Please enter your email." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Drop us a line?</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="message" placeholder="your message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Send it!">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <footer>
            <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav ">
                        <li><a href="#">About Us</a></li>
                        <li><a href="admin" target="blank">Login</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-links">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p>
                    Copyright &copy; 2020 by OrganizationName. All rights reserved.
                </p>
            </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="ven/js/respond.min.js"></script>
        <script src="ven/js/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr.js"></script>
        <script src="res/js/script.js"></script>


    </body>
</html>

<!--
    
Navigation:
1. About us
2. Blog
3. Press
4. iOS App
5. Android App

Also include links to facebook, twitter, google+ and Instagram accounts.
-->