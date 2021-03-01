<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['admin'])){
    header("Location: adminpage.html");
}else{
   $user = $_SESSION['user'];	
    $usr= $_POST["iduser"];

	$delete = "DELETE FROM users WHERE username = '$usr'";
	if(pg_query($dbconn,$delete)){
		 header("Location: adminuser.php");
	}else{
		echo "Erreur";
	}

}

