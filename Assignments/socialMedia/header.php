<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Social Media</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>
	<nav>
		<ul class="nav nav-tabs justify-content-center">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<?php
			if(isset($_SESSION['loggedin']) === true && $_SESSION['loggedin'] === true )
			{
			?>	
				<li class="nav-item">
					<a class="nav-link" a href="logout.php">Logout</a>
				</li>
			<?php
			}
			else {
			?>
				<li class="nav-item">
					<a class="nav-link" a href="loginlanding.php">Login</a>

				</li>
			<?php
			}
			
			?>
			<li class="nav-item">
				<a class="nav-link" a href="">Create Post</a>
			</li>
		
		</ul>
	</nav>
<div class="container">
<!-- Script 3.2 - header.html -->