<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Recherche de vols</title>
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
  <link rel="stylesheet" type="text/css" href="css/Search.css">
  <script src="js/notavailable.js"></script>
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
    <h1>Résultats de la recherche</h1>

<?php

include_once 'dbconnect.php';




$from = $_POST["from"];
$to = $_POST["to"];
$departdate = $_POST["depart"];
$class = $_POST["class"];



    $sql1 = "SELECT FL.number AS FLnumber, company, type, departure, d_time,d_date, arrival, a_time,a_date, C.name AS classname, capacity, price
            FROM flight FL,  class C, airplane AP 
            WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) AND( C.name = '$class') AND            
           (departure = '$from') AND (FL.arrival='$to') AND (FL.d_date='$$departdate')
           ORDER BY FL.number";
    $result = pg_query($dbconn,$sql1);

    $rowcount = pg_num_rows($result);


    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>Résultats de la recherche: </strong>".$rowcount." resultat(s)</div>";
    }
    else{
    echo "<div class='alert alert-info'><strong>Résultats de la recherche: </strong>".$rowcount." resultat(s)</div>";

    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
         <tr>
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
            <th>Sièges restants</th>
        <th>Réservez</th>
      </tr>
          </thead>";
    while($row = pg_fetch_array($result)) {
        echo "<tbody><tr>";
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
                        WHERE B.flightno = '".$row['flnumber']."'AND B.classtype ='".$row['classname']."' AND paid=1
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
        
            echo "<td>".$availableNumber."</td>";
        
        if($availableNumber>0){
        echo '<td>
            <form action="shoppingcart.php" method="post">
            <input type="hidden" name="flightno" value="'.$row['flnumber'].'">
            <input type="hidden" name="classtype" value="'.$row['classname'].'">
            <input type="hidden" name="price" value="'.$row['price'].'">
            <input type="hidden" name="date" value="'.$departdate.'">
            <input type="hidden" name="type" value="onewaynonstop">
            <button type="submit" class="btn btn-primary">Ajoutez au panier</button>
            </form>
            </td>';
        }else{
            echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Non disponible</button></td>";
        }
        
        echo "</tr>";
    }
    echo " </tbody></table>";

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