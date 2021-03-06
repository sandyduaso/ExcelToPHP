<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Importing Excel File</title>
</head>
<body>
	<style>
	body {
		font-family: Arial;
		width: 550px;
	}

	.outer-container {
		background: #F0F0F0;
		border: #e0dfdf 1px solid;
		padding: 40px 20px;
		border-radius: 2px;
	}

	.btn-submit {
		background: #333;
		border: #1d1d1d 1px solid;
	    border-radius: 2px;
		color: #f0f0f0;
		cursor: pointer;
	    padding: 5px 20px;
	    font-size:0.9em;
	}

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

	.tutorial-table td {
	    background: #FFF;
		border-bottom: 1px solid #dddddd;
		padding: 8px;
		text-align: left;
	}

	#response {
	    padding: 10px;
	    margin-top: 10px;
	    border-radius: 2px;
	    display:none;
	}

	.success {
	    background: #c7efd9;
	    border: #bbe2cd 1px solid;
	}

	.error {
	    background: #fbcfcf;
	    border: #f3c6c7 1px solid;
	}

	div#response.display-block {
	    display: block;
	}
	</style>

	<h2>Import Excel File into MySQL using PHP</h2>

	<div class="outer-container">
		<form action="import.php" method="POST" enctype="multipart/form-data">
			<div>
				<label>Choose Excel File</label>
				<input type="file" name="file" id="file" accept=".xls, .xlsx, .csv">
				<button type="submit" id="submit" name="import" class="btn-submit">Import</button>
			</div>
		</form>
	</div>
</body>
</html>