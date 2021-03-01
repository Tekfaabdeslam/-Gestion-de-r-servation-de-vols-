<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user'])){
    header("Location: customersignin.html");
}else{
    $user = $_SESSION['user'];	
    $bookid = $_POST["bookid"];
    pg_query($dbconn,"DELETE FROM reserve WHERE ID = '$bookid'");
	$delete = "DELETE FROM book WHERE ID = '$bookid'";
	if(pg_query($dbconn,$delete)){
		 header("Location: cartshow.php");
	}else{
		echo "Error";
	}

}


?>