<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['admin'])){
    header("Location: Adminpage.html");
}else{
    $admin = $_SESSION['admin'];	
    $bookid = $_POST["bookid"];
    pg_query($dbconn,"DELETE FROM reserve WHERE ID = '$bookid'");
	$delete = "DELETE FROM book WHERE ID = '$bookid'";
	if(pg_query($dbconn,$delete)){
		 header("Location: adminbook.php");
	}else{
		echo "Erreur";
	}

}


?>