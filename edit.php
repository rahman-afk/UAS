<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

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



	} 
	
	
	else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE tbl_covid SET wilayah='$wilayah',positif='$positif',dirawat='$dirawat',sembuh='$sembuh',meninggal='$meninggal' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tbl_covid WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$wilayah = $res['wilayah'];
	$positif = $res['positif'];
	$dirawat = $res['dirawat'];
	$sembuh = $res['dirawat'];
	$meninggal = $res['meninggal'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			
		
		<tr> 
				<td>Wilayah</td>
				<td><input type="text" name="wilayah" value="<?php echo $wilayah;?>"></td>
			</tr>
			<tr> 
				<td>Positif</td>
				<td><input type="text" name="positif" value="<?php echo $positif;?>"></td>
			</tr>
			<tr> 
				<td>Sembuh</td>
				<td><input type="text" name="sembuh" value="<?php echo $sembuh;?>"></td>
			</tr>
			<tr> 
				<td>Dirawat</td>
				<td><input type="text" name="dirawat" value="<?php echo $dirawat;?>"></td>
			</tr>
			<tr> 
				<td>Meninggal</td>
				<td><input type="text" name="meninggal" value="<?php echo $meninggal;?>"></td>
			</tr>



			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
