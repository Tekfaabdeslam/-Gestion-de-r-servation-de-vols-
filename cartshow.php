<?php
// Start the session
session_start();


?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Panier</title>
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


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Panier</h1>





<?php

include_once 'dbconnect.php';


if(!isset($_SESSION['user'])){
    header("Location: customersignin.html");
}else{
    $user = $_SESSION['user'];	


$sql = "SELECT FL.number AS FLnumber, company, type, B.ID AS bookid, time,  departure,d_time,d_date, arrival, a_time, a_date, C.name AS classname, capacity, price
            FROM flight FL,  class C, airplane AP , book B ,reserve R
            WHERE (FL.number = C.number) AND (B.flightno = c.number) AND (classtype = C.name) AND (FL.airplane_id = AP.ID)AND (R.id = B.ID) 
            AND  R.username = '$user' AND paid = '0'
            ORDER BY time";


$result = pg_query($dbconn,$sql);
$rowcount = pg_num_rows($result);

    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>Rien dans le panier.</strong></div>";
    }
    else{
    echo "<div class='alert alert-info'>Dans le panier :</div>";



    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Heure</th>
            <th>Vol</th>
            <th>Avion</th>
            <th>Départ</th>
            <th>heure de départ</th>
            <th>date de départ</th>
            <th>Arrivée</th>
            <th>Heure d'arrivée</th>
             <th>date d'arrivée</th>
            <th>Classe</th>
            <th>Prix</th>
            <th>Payer</th>
          </tr>
          </thead>";
    while($row = pg_fetch_array($result)) {
        echo "<tbody><tr>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['flnumber'] . "</td>";
        echo "<td>" . $row['company']." ".$row['type']. "</td>";
        echo "<td>" . $row['departure'] . "</td>";
        echo "<td>" . $row['d_time'] . "</td>";
        echo "<td>" . $row['d_date'] . "</td>";
        echo "<td>" . $row['arrival'] . "</td>";
        echo "<td>" . $row['a_time'] . "</td>";
        echo "<td>" . $row['a_date'] . "</td>";
        echo "<td>" . $row['classname'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        
       
            //calculer le nombre de sièges restants
            $seatreserved = "SELECT flightno, classtype, COUNT(*)
                        FROM book B
                        WHERE   B.flightno = '".$row['flnumber']."'AND B.classtype ='".$row['classname']."' AND paid=1
                        GROUP BY flightno, classtype";
            $reserved = pg_query($dbconn, $seatreserved);   
            $reservedNumber = pg_fetch_array($reserved);
            
            $capacity = pg_query($dbconn, "SELECT capacity FROM class C WHERE C.number='".$row['flnumber']."' AND C.name= '".$row['classname']."'");
            $capacityNumber = pg_fetch_array($capacity);


            if(pg_num_rows($reserved)>0){            
                $availableNumber = $capacityNumber['capacity'] - $reservedNumber['count'];
            }else{
                $availableNumber = $capacityNumber['capacity'];
            }
        
     
        
        if($availableNumber>0){
        echo '<td>
            <form action="cartdelete.php" method="post">
            <input type="hidden" name="bookid" value="'.$row['bookid'].'" >
            <button type="submit" class="btn btn-danger">Supprimer</button></div>
            </form>        
            </td>';
        }else{
            echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Pas de siège Disponible</button></td>";
        }
        
		$sum = pg_query($dbconn,"SELECT SUM(price)
							            FROM book B, class C,reserve R
							            WHERE R.username = '$user' AND paid = '0'
							            AND classtype=C.name AND flightno = C.number");

		$t = pg_fetch_array($sum);
		$total = $t['sum'];



        echo "</tr>";
    }
    echo " </tbody></table>";
    echo " <form action='pay.php' method='post'>";
    echo "<div class='row'>
			  <div class='col-sm-4'></div>
			  <div class='col-sm-4'><p class='lead'>Total: <span id='total'>€".$total."</span></p></div>
			  <div class='col-sm-4'><button type='submit' class='btn btn-primary'>Payer</button></div>
			</div>";
    
    echo "</form>";
    echo "<br>";

    }
}

pg_close($dbconn);


?>

    </div>
    
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