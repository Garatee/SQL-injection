<?php
	function queryDB($query){
		if(isset($_ENV["DATABASE_URL"])){
			extract(parse_url($_ENV["DATABASE_URL"]));
			$dbUrl = "user=$user password=$pass host=$host dbname=" . substr($path, 1);
		}
		else{
			include_once('include/password.php');
			$password = myPassword();
			$dbUrl = "host=localhost port=5432 dbname=sql-injection user=postgres password='$password'";
		}
		$pg_conn = pg_connect($dbUrl);
		$result = pg_query($pg_conn, $query); // add @ before pg_query to suppress warnings
		if(!$result){
			
			// die ("  <br>
				// <div class='alert alert-danger w-50'>
					// <strong>Failure: </strong> Error connecting the database
				// </div>
			// ");
			// echo pg_last_error ($pg_conn);
		}
		return $result;
	}
?>