<?php 

/** Include PHPExcel and MySQL PDO */

require_once 'Classes/Connection.php';
require_once 'Classes/PHPExcel.php';

// $filename = $_FILES['file']['name'];

$targetPath = 'uploads/'.$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
/** Create a new PHPExcel object */
$objPHPExcel = PHPExcel_IOFactory::load($targetPath);

$dataArr = array();

foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) 
{
	$worksheetTitle 	= $worksheet->getTitle();
	$highestRow			= $worksheet->getHighestRow(); # e.g 10
	$highestColumn		= $worksheet->getHighestColumn(); # e.g 'F'
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

	for ($row = 4; $row <= $highestRow ; ++ $row) { 
		for ($col = 0; $col < $highestColumnIndex ; ++ $col) { 
			$cell = $worksheet->getCellByColumnAndRow($col, $row);
			$val = $cell->getValue();
			$dataArr[$row][$col] = $val;
		}
	}
}

unset($dataArr[4]); # since in our example the first row is blank and the sencond to fourth is the header and not the actual data

foreach($dataArr as $val){
	$stmt = $conn->prepare("INSERT INTO employees (fname, lname, email, phone, company) VALUES (:fname, :lname, :email, :phone, :company)");
	$stmt->bindValue(':fname', $val['1'], PDO::PARAM_STR);
	$stmt->bindValue(':lname', $val['2'], PDO::PARAM_STR);
	$stmt->bindValue(':email', $val['3'], PDO::PARAM_STR);
	$stmt->bindValue(':phone', $val['4'], PDO::PARAM_STR);
	$stmt->bindValue(':company', $val['5'], PDO::PARAM_STR);
	$stmt->execute();
}

 header("location:data.php");