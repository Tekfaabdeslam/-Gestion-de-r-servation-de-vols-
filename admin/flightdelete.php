<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['admin'])){
   header("Location: adminpage.html");
}else{
    $user = $_SESSION['admin'];	
    $id = $_POST["idf"];
    $delete1 = "DELETE FROM class WHERE number = '$id'";
    pg_query($dbconn,$delete1);
	$delete = "DELETE FROM flight WHERE number = '$id'";
	if(pg_query($dbconn,$delete)){
		 header("Location: upd.php");
	}else{
		echo "Erreur";
	}

}


?>