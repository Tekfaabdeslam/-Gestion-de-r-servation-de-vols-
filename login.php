<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

// if(isset($_POST['btn-login']))
// {
	
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$res=pg_query($dbconn,"SELECT * FROM users WHERE username='$username'");
	$row=pg_fetch_array($res);
	echo "string",$row;
	if($row['password']==$pwd)
	{
		$_SESSION['user']=$row['username'];
		header("Location: index.php");
	}
	else
	{
	
	

	echo '
			<head>
			<title>Connexion de lutilisateur</title>
			<meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		    <link rel="stylesheet" href="css/homepage.css">
		    <link rel="stylesheet" href="css/forcompany.css">
		    <link rel="stylesheet" href="css/AdminSignin.css">
		    <script src="js/login.js"> </script>
			<script src="js/jump.js"> </script>


			<meta http-equiv="refresh" content="3;url=customersignin.html">
			</head>
			<body >
			<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a>				
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					
					<li id = "cart">
						<a class="navbar-brand" href="cartshow.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a>
					</li>


					<li class="dropdown" id = "new">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> se connecter&nbsp;</span><span class="caret"></span>
						</a>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
						  <li><a href="signup.html">Sinscrire</a></li>
						  
						  <li class="dropdown-submenu">
							<a tabindex="-1" href="#">se connecter</a>
							<ul class="dropdown-menu">
							  <li><a tabindex="-1" href="admin/Adminsingin.html">Connexion Manager</a></li>
							  <li><a href="customersignin.html">Connexion client</a></li>
							  </li>
						
					
							</ul>
						  </li>
						
						</ul>
					</li>
					  <li class="dropdown" id = "old">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="glyphicon glyphicon-user" id="wuser">Bienvenue!</span>
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">							
							<li><a href="#" id="logout">Déconnexion</a></li>
						</ul>
						</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="jumbotron text-center">
		<h1>Airprice.com</h1> 
		<p>Nous sommes spécialisés dans votre plan aérien !</p> 
	</div>
	
	<div class="container" id="homepage">
		<h1>Opps</h1>
		<p>Mauvais nom dutilisateur ou mauvais mot de passe, attendez 3s ou <a href="customersignin.html">cliquez sur le bouton retour!</a></p>
	</div>
	<footer class="container-fluid text-center">
		<a href="#signUpPage" title="To Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a>
		<p>Airprice.com</p>		
	</footer>	
		</body>';
			
		
	}
//}


pg_close($dbconn);
?>