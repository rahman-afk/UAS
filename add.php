<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$wilayah = mysqli_real_escape_string($mysqli, $_POST['wilayah']);
	$positif = mysqli_real_escape_string($mysqli, $_POST['positif']);
	$dirawat = mysqli_real_escape_string($mysqli, $_POST['dirawat']);
	$sembuh = mysqli_real_escape_string($mysqli, $_POST['sembuh']);
	$meninggal = mysqli_real_escape_string($mysqli, $_POST['meninggal']);
		
	// checking empty fields
	if(empty($id) || empty($wilayah) || empty($positif)  || empty($dirawat)  || empty($sembuh)  || empty($meninggal)) {
				
		if(empty($id)) {
			echo "<font color='red'>id field is empty.</font><br/>";
		}
		
		if(empty($wilayah)) {
			echo "<font color='red'>wilayah field is empty.</font><br/>";
		}
		
		if(empty($positif)) {
			echo "<font color='red'>positif field is empty.</font><br/>";
		}

		if(empty($dirawat)) {
			echo "<font color='red'>dirawat field is empty.</font><br/>";
		}

		if(empty($sembuh)) {
			echo "<font color='red'>sembuh field is empty.</font><br/>";
		}

		
		if(empty($meninggal)) {
			echo "<font color='red'>meninggal field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO tbl_covid (id,wilayah,positif,dirawat,sembuh,meninggal) VALUES('$id','$wilayah','$positif','$dirawat','$sembuh','$meninggal')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='beranda.php'>View Result</a>";
	}
}
?>
</body>
</html>
