<?php

include_once 'dbconnect.php';

$username = $_POST['username'];

$result=pg_query($dbconn,"SELECT username FROM users WHERE username = '$username'");

	 while($row = pg_fetch_array($result)) {
		if( $row['username']) {
			echo 1;
		}
		else {
			echo 0;
		}
	 }
pg_close($conn);
?>