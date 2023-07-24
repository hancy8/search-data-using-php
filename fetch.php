<?php
$connect = mysqli_connect("localhost", "root", "", "market");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM suppliers 
	WHERE supplier_name LIKE '%".$search."%'
	
	";
}
else
{
	$query = "
	SELECT * FROM  suppliers ORDER BY supplier_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Customer Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Postal Code</th>
							<th>Country</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["supplier_name"].'</td>
				<td>'.$row["supplier_phone"].'</td>
				<td>'.$row["supplier_address"].'</td>
				<td>'.$row["products"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>