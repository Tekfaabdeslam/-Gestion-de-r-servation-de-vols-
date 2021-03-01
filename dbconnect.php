<?php
$conn_string = "host=localhost port=5432 dbname=airline1 user=postgres password=azeRTY10@";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
  if ($stat === PGSQL_CONNECTION_OK) {
      //echo 'Connexion ok';
  } else {
      echo 'Connexion erronée';}



?>