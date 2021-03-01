<?php
// Start the session
session_start();

?>
<html>
<head>
	<title>AJOUTER UN VOL</title>
	<style >
		body{

		}
		input{

			width: 50%;
			height: 5%;
			border: 1px;
			border-radius: 5px;
			padding: 8px 15px 8px 15px;
			margin: 10px 0px 15px 0px;  
			box-shadow: 1px 2px 2px 1px grey;
		}
		select{

			width: 50%;
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
	<div class="text-center">
		<h1>AJOUTER UN VOL</h1> 
	</div>
<div id = "add">
		<form name="form1" method="post" action="Adminadd.php">
			<div class="form-group">
				<label class="control-label col-sm-2" for="flightno2">Numéro de vol.</label>
				<div class="col-sm-6">
					<input type="flightno"  name="flightno">
					
				</div>
				
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="airplaneid2">Avion </label>
				<div class="col-sm-6">
						<select class="form-control" id="airplaneid" name="airplaneid">
		      		<?php
		      			include("dbconnect.php");
						$sql1 = "SELECT * FROM airplane;";
						$result1 = pg_query($dbconn,$sql1);

						if (pg_num_rows($result1)>0)
						{
							while(($row1 = pg_fetch_row($result1))!=null)
							{
						
								echo("<option     value='". $row1[0] ."'>". $row1[0] . ",". $row1[1] . ", ". $row1[2] ."</option>");
							}
						}
					?>  
				 </select>
				</div>
				
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="departure">Aéroport de départ</label>
				<div class="col-sm-6">		
				 <select class="form-control" id="departure" name="departure">
		      		<?php
		      			include("dbconnect.php");
						$sql1 = "SELECT name,city, country FROM airport;";
						$result1 = pg_query($dbconn,$sql1);

						if (pg_num_rows($result1)>0)
						{
							while(($row1 = pg_fetch_row($result1))!=null)
							{
						
								echo("<option     value='". $row1[0] ."'>". $row1[1] . ", ". $row1[2] ."</option>");
							}
						}
					?>  
				 </select>
				</div>
				
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ddate">Heure de départ</label>
				<div class="col-sm-6">
					<input type=time  name="dtime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ddate">date de départ </label>
				<div class="col-sm-6">
					<input type=date  name="ddate">
				</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="arrival">Aéroport d'arrivée</label>
				<div class="col-sm-6">
					
					 <select class="form-control" id="arrival" name="arrival">
		      	<?php
		      	include("dbconnect.php");
				$sql1 = "SELECT name, city, country FROM airport;";
				$result1 = pg_query($dbconn,$sql1);

				if (pg_num_rows($result1)>0)
				{
					while(($row1 = pg_fetch_row($result1))!=null)
					{
						
						echo("<option     value='". $row1[0] ."'>". $row1[1] . ", ". $row1[2] ."</option>");
					}
				}
				?>  
		    </select>
				</div>
				
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="atime">Heure d'arrivée</label>
				<div class="col-sm-6">
					<input type=time  name="atime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="adate">Date d'arrivée</label>
				<div class="col-sm-6">
					<input type=date  name="adate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ecapacity">Capacité de  calsse Économie</label>
				<div class="col-sm-6">
					<input type="number"  name="ec">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="eprice">Prix classe Économie</label>
				<div class="col-sm-6">
					<input type="number"  name="ep">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="bcapacity">Capacité classe Affaire</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="bcapacity2" placeholder="" name="bc">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="bprice">Prix classe Affaire</label>
				<div class="col-sm-6">
					<input type="number"class="form-control" id="bprice2" placeholder="" name="bp">
				</div>
			</div>
			
			<br />
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-6">
					
					<input type="submit" name="AJOUTER" value="AJOUTER" />
				</div>
			</div>
		</form>
		</div>
		</body>
</html>