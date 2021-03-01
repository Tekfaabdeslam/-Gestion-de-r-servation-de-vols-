<?php
$flightno = $_POST['flightno'];
$airplaneid = $_POST['airplaneid'];
$departure = $_POST['departure'];
$dtime = $_POST['dtime'];
$arrival = $_POST['arrival'];
$atime = $_POST['atime'];
$ddate = $_POST['ddate'];
$adate = $_POST['adate'];
$ec = $_POST['ec'];
$ep = $_POST['ep'];
$bc = $_POST['bc'];
$bp = $_POST['bp'];

include_once 'dbconnect.php';

$sql = "UPDATE flight SET  airplane_id = '$airplaneid', departure = '$departure', d_time = '$dtime', arrival = '$arrival', a_time = '$atime', d_date = '$ddate', a_date = '$adate' WHERE number = '$flightno'";
if(! pg_query($dbconn, $sql))
{
	echo "\nErrormessage: ".pg_error($dbconn)."\n";
}
$sql = "UPDATE class SET capacity = '$ec', price = '$ep' WHERE number = '$flightno' AND name = 'Economy'";
if(! pg_query($dbconn, $sql))
{
	echo "\nErrormessage: ".pg_error($dbconn)."\n";
}
$sql = "UPDATE class SET capacity = '$bc', price = '$bp' WHERE number = '$flightno' AND name = 'Business'";
if(! pg_query($dbconn, $sql))
{
	echo "Errormessage: ".pg_error($dbconn)."\n";
}
echo '<script type="text/javascript"> alert ("data Update")</script>' ;
header("Location: upd.php");

pg_close($dbconn);

?>