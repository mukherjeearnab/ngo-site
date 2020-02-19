<?php
include('login_auth.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
	if($_SESSION['login_user'] == 'admin') { 
		$cookie_name = "user";
		$cookie_value = $username;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		header("location: admin"); // Redirecting To Profile Page
	}
	else
		header("location: home.php"); // Redirecting To Profile Page
}
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="res/css/login.css">
		<script src="https://kit.fontawesome.com/84ef880659.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="login">
				<div class="label">
					<span class="lbh">Login<i class="fa fa-fw fa-sign-in"></i></span>
				</div>
				<form method="POST" action="">
					<input class="loginText" type="text" name="username" placeholder="Username">
					<input class="loginText" type="password" name="password" placeholder="Password">
               		<input class="loginBtn" type="submit" name="submit" placeholder="Login" value="Login">
               		<span><?php echo $error; ?></span> 
				</form>
			</div>
			<button id="myBtn" class="btnL"><i class="fa fa-fw fa-info-circle"></i></button>
			<!-- The Modal -->
			<div id="myModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<h1><span class="gh"><i class="fa fa-fw fa-info-circle"></i> About</span></h1>
					<h2>Binary SiteManager</h3>
					<h3>Version 1.0</h3>
					<p></p>
					<p>Made with <span class="rH"><i class="fa fa-fw fa-heart"></i></span> by <b><a target="blank" href="https://arnabm.tk/about" style="text-decoration: none;">Arnab Mukherjee</a>.</b></p>
				</div>
			</div>

		</div>

		<script>
			// Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
				modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
	</body>
</html>