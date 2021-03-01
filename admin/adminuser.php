<?php
// Start the session
session_start();


?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>users</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/forcompany.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/AdminSignin.css">
    <script src="../js/login.js"> </script>
    <script src="../js/jump.js"> </script>
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
                <a class="navbar-brand" href="adminpage.html"><span class="glyphicon glyphicon-home"></span> Accueil</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="logoutadmin.php"><span class="glyphicon glyphicon-user"> Déconnexion&nbsp;</span></a>
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="jumbotron text-center">
        <h1>Airprice.com</h1> 
        <p>Nous sommes spécialisés dans votre plan aérien!</p> 
</div>


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 
      <h1>liste des utilisateurs </h1>


<?php

include_once 'dbconnect.php';

$sql = "SELECT *  FROM users,passanger WHERE email=username";


$result = pg_query($dbconn,$sql);
$rowcount = pg_num_rows($result);

    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>aucun utilisateur </strong></div>";
    }
    else{
        $sql = "SELECT COUNT(*)  FROM users";
        $result1 = pg_query($dbconn,$sql);
            $rowcount1 = pg_fetch_array($result1);
    echo "<div class='alert alert-info'>Nombre d'utilisateurs: ".$rowcount1 ['count']."</div>";



    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>nom d'utilisateur</th>
            <th>mot de passe </th>
            <th>prénom</th>
            <th>deuxième prénom</th>
            <th>nom de famille</th>
            <th>email</th>
            <th>sexe</th>
            <th>date d'anniversaire</th>
            <th>téléphone</th>

          </tr>
          </thead>";
    while($row = pg_fetch_array($result)) {
        echo "<tbody><tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['middlename'] . "</td>";
        echo "<td>" . $row['lastname']." </td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['birthday'] . "</td>";
         echo "<td>" . $row['cellphone'] . "</td>";
    
         
        echo '<td>
            <form action="userdelete.php" method="post">
            <input type="hidden" name="iduser" value= "'.$row['username'].'" >
            <button type="submit" class="btn btn-danger">Supprimer</button></div>
            </form>        
            </td>';
        
        
	
        echo "</tr>";
    }
  
 }

pg_close($dbconn);

?>

    </div>
    
  </div>
</div>


</body>
</html>