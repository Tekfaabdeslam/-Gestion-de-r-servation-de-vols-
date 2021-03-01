<?php
// Start the session
session_start();


?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <title>Airprice Company</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/forcompany.css">
    <link rel="stylesheet" href="../cssAdminSignin.css">
    <script  src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/Admin.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
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
      <h1>liste des  réservations</h1>


<?php

include_once 'dbconnect.php';



$sql = "SELECT *
            FROM flight FL,  class C, airplane AP , book B,reserve R
            WHERE (FL.number = C.number) AND (B.flightno = c.number) AND (classtype = C.name) AND (FL.airplane_id = AP.ID) AND (R.ID= B.ID) 
            ORDER BY time;";
$sql1="SELECT COUNT(*)
            FROM flight FL,  class C, airplane AP , book B,reserve R
            WHERE (FL.number = C.number) AND (B.flightno = c.number) AND (classtype = C.name) AND (FL.airplane_id = AP.ID) AND (R.ID= B.ID) ";            


$result = pg_query($dbconn,$sql);
$rowcount = pg_num_rows($result);
$result1 = pg_query($dbconn,$sql1);
$rowcount1 = pg_fetch_array($result1);

    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>Aucune réservation</strong></div>";
    }
    else{
    
        echo "<div class='alert alert-info'><strong>Nombre Des Réservations" . $rowcount1 ['count']." </strong></div>";


    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>nom d'utilisateur</th>
            <th>heure de réservation</th>
            <th>numéro de réservation </th>
            <th>Avion</th>
            <th>Départ</th>
            <th>Heure de Départ</th>
             <th>date de Départ</th>
            <th>Arrivée</th>
            <th>Heure d'Arrivée</th>
            <th>date d'Arrivée</th>
            <th>Classe</th>

            <th>Prix</th>

            <th></th>
          </tr>
          </thead>";
    while($row = pg_fetch_array($result)) {
        echo "<tbody><tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['company']." ".$row['type']. "</td>";
        echo "<td>" . $row['departure'] . "</td>";
        echo "<td>" . $row['d_time'] . "</td>";
         echo "<td>" . $row['d_date'] . "</td>";
        echo "<td>" . $row['arrival'] . "</td>";
        echo "<td>" . $row['a_time'] . "</td>";
         echo "<td>" . $row['a_date'] . "</td>";
        echo "<td>" . $row['classtype'] . "</td>";

        echo "<td>" . $row['price'] . "</td>";
        
       
           
        
        echo '<td>
            <form action="bookdelete.php" method="post">
            <input type="hidden" name="bookid" value="'.$row['id'].'" >
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