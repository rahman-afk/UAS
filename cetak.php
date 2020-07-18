<html>
<body>
 
 
	<?php 
	include 'config.php';
	?>
 
 <table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>wilayah</th>
            <th>positif</th>
            <th>dirawat</th>
            <th>sembuh</th>
            <th>meninggal</th>
        
		</tr>

	
		<?php 
		$no = 1;
		$sql = mysqli_query($mysqli,"SELECT * from tbl_covid ORDER BY id DESC");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['wilayah']; ?></td>
			<td><?php echo $data['positif']; ?></td>
            <td><?php echo $data['dirawat']; ?></td>
            <td><?php echo $data['sembuh']; ?></td>
            <td><?php echo $data['meninggal']; ?></td>
           
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>