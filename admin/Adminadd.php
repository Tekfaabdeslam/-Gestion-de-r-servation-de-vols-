<?php

$flightno = $_POST['flightno'];
$airplaneid = $_POST['airplaneid'];
$departure = $_POST['departure'];
$dtime = $_POST['dtime'];
$ddate = $_POST['ddate'];
$arrival = $_POST['arrival'];
$atime = $_POST['atime'];
$adate = $_POST['adate'];
$ec = $_POST['ec'];
$ep = $_POST['ep'];
$bc = $_POST['bc'];
$bp = $_POST['bp'];
include_once 'dbconnect.php';
$sql = "INSERT INTO flight VALUES( '$flightno', '$airplaneid', '$departure', '$dtime', '$arrival', '$atime', '$ddate', '$adate' )";
if(! pg_query($dbconn, $sql))
{
	
	echo "Message d'erreur: ".pg_error($dbconn)."\n";
}
$sql = "INSERT INTO class VALUES( '$flightno', 'Économie', '$ec', '$ep')";
if(! pg_query($dbconn, $sql))
{
	echo "Message d'erreur: ".pg_error($conn)."\n";
}
$sql = "INSERT INTO class VALUES('$flightno', 'Affaire', '$bc', '$bp')";
if(! pg_query($dbconn, $sql))
{
	echo "Message d'erreur: ".pg_error($dbconn)."\n";
}
 echo '<script type="text/javascript"> alert ("données ajouter")</script>' ;
 echo header("Location: upd.php");

pg_close($dbconn);

?>