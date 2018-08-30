<?php 
	require_once 'Classes/Connection.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Data</title>
 </head>
 <body>
 	<style>
 		.tutorial-table {
 			margin-top: 40px;
 			font-size: 0.8em;
 			border-collapse: collapse;
 			width: 100%;
 		}
 		.tutorial-table th {
 			background: #f0f0f0;
    		border-bottom: 1px solid #dddddd;
			padding: 8px;
			text-align: left;
 		}
 	</style>
 	<?php 

 		$sql = "SELECT * FROM employees";
 		$stmt = $conn->query($sql);
 		$rowCount = $stmt->rowCount();
 		if ($rowCount > 0) {
 	 ?>
 	 <table class="tutorial-table">
 	 	<thead>
 	 		<tr>
 	 			<th>Name</th>
 	 			<th>Email</th>
 	 			<th>Phone</th>
 	 			<th>Company</th>
 	 			<th>Date</th>
 	 		</tr>
 	 	</thead>
 	 	<?php 
 	 		while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
 	 	 ?>
 	 	 <tbody>
 	 	 	<tr>
 	 	 		<td><?php  echo $row['fname']." ".$row['lname']; ?></td>
	            <td><?php  echo $row['email']; ?></td>
	            <td><?php  echo $row['phone']; ?></td>
	            <td><?php  echo $row['company']; ?></td>
	            <td>
	            	<?php 
	            		$emp_date = new DateTime($row['date']);
	            		$format = date_format($emp_date,'M d Y - H:i:s A');
	            		echo $format;
	            	 ?>
	            </td>
 	 	 	</tr>
 	 	 <?php } ?>
 	 	 </tbody>
 	 </table>
 	<?php } ?>
 </body>
 </html>