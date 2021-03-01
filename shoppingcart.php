<?php
// Start the session
session_start();

include_once 'dbconnect.php';

$type = $_POST["type"];
date_default_timezone_set("Europe/Paris");
$t=time();
$time = date("Y-m-d h:i:s");


if(!isset($_SESSION['user'])){
    header("Location: customersignin.html");
}else{
    $user = $_SESSION['user'];


	if($type =="all" || $type =="onewaynonstop" ){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	

	$sql = "INSERT INTO book (time, flightno, classtype, paid) 
			VALUES ('$time', '$flightno', '$class', '0')";;
	$result = pg_query($dbconn,$sql);
	$result1=pg_query($dbconn,"SELECT id FROM book where time='$time'AND flightno='$flightno'");
	$row1=pg_fetch_array($result1);
	$id=$row1['id'];
	$sql1 = "INSERT INTO reserve (id, username) 
			VALUES ('$id','$user')";;
	$result4 = pg_query($dbconn,$sql1);


    header("Location: cartshow.php");
	}

	

	
	if($type =="roundtrip"){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	


	$flightno2 = $_POST["flightno2"];
	$class2 = $_POST["classtype2"];
	$price2 = $_POST["price2"];

	$returndate = $_POST["date2"];

	$sql = "INSERT INTO book (time, flightno, classtype, paid) 
			VALUES ('$time', '$flightno', '$class', '0')";;

	$result = pg_query($dbconn,$sql);
$result1=pg_query($dbconn,"SELECT id FROM book where time='$time'AND flightno='$flightno'");
	$row1=pg_fetch_array($result1);
	$id=$row1['id'];
	$sql1 = "INSERT INTO reserve (id, username) 
			VALUES ('$id','$user')";;
	$result4 = pg_query($dbconn,$sql1);

	$sql2 = "INSERT INTO book (time, flightno, classtype, paid) 
			VALUES ('$time', '$flightno2', '$class2', '0')";;

	$result2 = pg_query($dbconn,$sql2);
	$result1=pg_query($dbconn,"SELECT id FROM book where time='$time'AND flightno='$flightno'");
	$row1=pg_fetch_array(result1);
	$sql1 = "INSERT INTO reserve (id, username) 
			VALUES (" . $row1['id'] . ",'$user')";;
	$result4 = pg_query($dbconn,$sql1);
    header("Location: cartshow.php");
	}


    echo "Erreur d'ajout au panier..";

}
pg_close($dbconn);


?>



