<?php
// Start the session
session_start();



?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Airprice </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/forcompany.css">
	<link rel="stylesheet" href="css/homepage.css">
	<link rel="stylesheet" href="css/AdminSignin.css">
	<script src="js/login.js"> </script>
	<script src="js/jump.js"> </script>
</head>
<body>
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
						  <li><a href="signup.html">S'inscrire</a></li>
						  
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
		<h1><b>Recherche de vols</b></h1>
		<br />
		<p><b>Choisissez votre option de vol</b></p>
		<div class="btn-group btn-group-justified">			
			<div class="btn-group">
			<button id="button1" type="button" href="#oneway" class="btn btn-primary">Aller simple</button>
			</div>
			<div class="btn-group">
			<button id="button2" type="button" href="#roundtrip" class="btn btn-primary">Aller-retour</button>
			</div>
			<div class="btn-group">
			<button id="button3" type="button" href="#all" class="btn btn-primary">Recherchez tous les vols</button>
			</div>
		</div>
		<hr />

	<div id="oneway">

		<form role="form" action="SearchResultOneway.php" method="post">
		
		  <div class="row">
		  <div class="col-sm-6">
		    <label for="from">DE:</label>
		       <select class="form-control" id="from" name="from">
		      	<?php
		      	include("dbconnect.php");
				$sql1 = "SELECT name, city, country FROM airport;";
				$result1 = pg_query($dbconn,$sql1);

				if (pg_num_rows($result1)>0)
				{
					while(($row1 = pg_fetch_row($result1))!=null)
					{
						
						echo("<option     value='". $row1[0] ."'>". $row1[1] . ", ". $row1[2] .", ". $row1[3] ."</option>");
					}
				}
				?>  
		    </select>
		  </div>
		  <div class="col-sm-6">
		    <label for="to">A:</label>
		      <select class="form-control" id="to" name="to">
		      	<?php
		      	include("dbconnect.php");
				$sql1 = "SELECT name, city, country FROM airport;";
				$result1 = pg_query($dbconn,$sql1);

				if (pg_num_rows($result1)>0)
				{
					while(($row1 = pg_fetch_row($result1))!=null)
					{
						
						echo("<option     value='". $row1[0] ."'>". $row1[1] . ", ". $row1[2] .", ". $row1[3] ."</option>");
					}
				}
				?> 
		    </select>
		  </div>
		  </div>
		  <hr >
		  <div class="row">
			  <div class="col-sm-6">
			    <label for="depart">Départ:</label>
			    <input type="date" class="form-control" id="depart" name="depart" required>
			  </div>
		  </div>   
		   <div class="row">
		   <hr >
		  <div class="col-sm-6">
		    <label for="class">Classe:</label>
		    <select class="form-control" name="class">
			      <option value="Économie">Économie</option>
			      <option value="Affaire">Affaire</option>
			    </select>
		  </div> 
		  </div> 
		  <br>
		 
		 
		  <div class="btn-group btn-group-justified">	
				<div class="btn-group">
					<button type="submit" class="btn btn-success">Soumettre</button>
				</div>
				<div class="btn-group">
					<button type="reset"  class="btn btn-info" value="Reset">Réinitialiser</button>
				</div>
		  </div>
		</form>
	</div>


	<div id="roundtrip">
		<form role="form" action="SearchResultRoundtrip.php" method="post">
			 <div class="row"> 
			  <div class="col-sm-6">
			    <label for="from">De:</label>
			    <select class="form-control" id="from" name="from">
		      	<?php
		      	include("dbconnect.php");
				$sql1 = "SELECT name, city, country FROM airport;";
				$result1 = pg_query($dbconn,$sql1);

				if (pg_num_rows($result1)>0)
				{
					while(($row1 = pg_fetch_row($result1))!=null)
					{
						
						echo("<option     value='". $row1[0] ."'>". $row1[1] . ", ". $row1[2] .", ". $row1[3] ."</option>");
					}
				}
				?>
		    </select>
			  </div>
			  <div class="col-sm-6">
			    <label for="to">À:</label>
			    <select class="form-control" id="to" name="to">
		      <?php
		      	include("dbconnect.php");
				$sql1 = "SELECT name, city, country FROM airport;";
				$result1 = pg_query($dbconn,$sql1);

				if (pg_num_rows($result1)>0)
				{
					while(($row1 = pg_fetch_row($result1))!=null)
					{
						
						echo("<option     value='". $row1[0] ."'>". $row1[1] . ", ". $row1[2] .", ". $row1[3] ."</option>");
					}
				}
				?>
		    </select>
			  </div>
			 </div>
			 <hr >
			<div class="row">  
			  <div class="col-sm-6">
			    <label for="depart">Départ:</label>
			    <input type="date" class="form-control" id="depart" name="depart" required>
			  </div>  
			  <div class="col-sm-6">
			    <label for="return">Retour:</label>
			    <input type="date" class="form-control" id="return" name="return" required>
			  </div>
			 </div>
			 <hr >
			 <div class="row">   
			  <div class="col-sm-6">
			    <label for="class">Classe:</label>
			    <select class="form-control" name="class">
			      <option value="Économie">Économie</option>
			      <option value="Affaires">Affaires</option>
			    </select>
			  </div> 
			 </div>
			 <br>
			  
			  <div class="btn-group btn-group-justified">	
				<div class="btn-group">
					<button type="submit" class="btn btn-success">Soumettre</button>
				</div>
				<div class="btn-group">
					<button type="reset"  class="btn btn-info" value="Reset">Réinitialiser</button>
				</div>
		  	  </div>
			</form>
	</div>
	<div id="all">
		<form role="form" action="SearchResultAll.php" method="post">
			 <div class="row"> 
			  <div class="col-sm-6">
			  <label for="selectdate">Sélectionnez une date :</label>
			  <input type="date" class="form-control" id="selectdate" name="selectdate" required>
			  </div>
			 </div>
			 <br>
			<div class="row">   
			  <div class="col-sm-6">
			  <button type="submit" class="btn btn-primary">Afficher TOUS</button>
			  </div>
			</div> 
			</form>

	</div>	

	</div>	

	
	<footer class="container-fluid text-center">
		<a href="#signUpPage" title="To Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a>
		<p>Airprice.com</p>		
	</footer>
</body>
</html>