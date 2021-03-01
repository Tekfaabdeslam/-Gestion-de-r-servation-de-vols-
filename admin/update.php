
<?php

session_start();
include_once 'dbconnect.php';

$id = $_POST["id"];

$result = pg_query($dbconn, "SELECT * FROM flight fl WHERE 
fl.number='$id'");
$result1 = pg_query($dbconn, "SELECT capacity ,price FROM class c
WHERE c.number = '$id' AND name = 'Économie'");
$result2 = pg_query($dbconn, "SELECT capacity ,price FROM class c 
WHERE c.number = '$id' AND name = 'Affaire'");

while($row = pg_fetch_array($result))
{
$flightno = $row['number'];
$airplaneid = $row['airplane_id'];
$departure = $row['departure'];
$dtime = $row['d_time'];
$arrival = $row['arrival'];
$atime = $row['a_time'];
$ddate = $row['d_date'];
$adate = $row['a_date'];

}

while($row1 = pg_fetch_array($result1)){
$ec = $row1['capacity'];
$ep = $row1['price'];
}
while($row2 = pg_fetch_array($result2)){
	$bc = $row2['capacity'];
	$bp = $row2['price'];

}

pg_close($dbconn);
?>

<!DOCTYPE html>
<html>
	<head>	
	<title>Modifier les données</title>
	<style >
		body{

			background-color:whitesmoke;
		}
		input{

			width: 200%;
			height: 5%;
			border: 1px;
			border-radius: 5px;
			padding: 8px 15px 8px 15px;
			margin: 10px 0px 15px 0px;  
			box-shadow: 1px 2px 2px 1px grey;


		}

	</style>
</head>

<body>
	<center>
		<h1>Modifier le vol </h1>
	<a href="upd.php">retour</a>
	<br><br>
	
	<form name="form1" method="post" action="Adminupdate.php">
		<table border="0">
			<tbody><tr> 
 <td>Numéro de vol</td>
 <td><input type="text" name="flightno" value="<?php echo $flightno;?>"></td>
</tr>
<tr> 
<td>Avion</td>
 <td><input type="text" name="airplaneid" value="<?php echo $airplaneid;?>"></td>
</tr>
<tr> 
 <td>Aéroport de départ </td>
<td><input type="text" name="departure" value="<?php echo $departure;?>"></td>
</tr>
<tr>
<td>Heure de départ </td>
 <td><input type="time" name="dtime" value="<?php echo $dtime;?>"></td>
</tr>
<tr>
<td>date de départ  </td>
 <td><input type="date" name="ddate" value="<?php echo $ddate;?>"></td>
</tr>
<tr> 
<td>Aéroport d'arrivée</td>
 <td><input type="text" name="arrival" value="<?php echo $arrival;?>"></td>
</tr>
<tr> 
 <td>Heure d'arrivée </td>
<td><input type="time" name="atime" value="<?php echo $atime;?>"></td>
</tr>
<tr> 
 <td>Date d'arrivée </td>
<td><input type="date" name="adate" value="<?php echo $adate;?>"></td>
</tr>
<tr> 
 <td>Capacité de  calsse Économie </td>
<td><input type="number" name="ec" value="<?php echo $ec;?>"></td>
</tr>
<tr> 
 <td>Prix classe Économie </td>
<td><input type="number" name="ep" value="<?php echo $ep;?>"></td>
</tr>
<tr> 
 <td>Capacité classe Affaire</td>
<td><input type="number" name="bc" value="<?php echo $bc;?>"></td>
</tr>
<tr> 
 <td>Prix classe Affaire</td>
<td><input type="number" name="bp" value="<?php echo $bp;?>"></td>
</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_POST["id"];?>></td>
				<td><input type="submit" name="Modifier" value="Modifier"></td>
			</tr>
		</table>
	</form>
	</center>
	</body>
</html>
