<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript" src="http://localhost/6478/resources/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="http://localhost/6478/resources/jqueryui/jquery-ui.js"></script>
	<link href="http://localhost/6478/resources/this.css" rel="stylesheet">

</head>
	<body>
<h1><b>HOT ITEMS NOW!!</b></h1>
	<table>
	<tr>
		<th>Items List</th>
	</tr>
	
	<?php for($i=0;$i<count($hotBarang);$i++){?>
	<tr>
		<td><?php echo $hotBarang[$i]['NAMA_BARANG'];?></td>
	</tr>
	<?php }?>

	</table>

	<br>
	<br>
	<h1><b>IKLAN BARIS</b></h1>
	<?php for($i=0;$i<count($iklan);$i++){
	echo $iklan[$i]['JUDUL_IKLAN']." ";
		echo $iklan[$i]['TIMESTAMP']." WIB";
		echo "<br><hr>";
		echo $iklan[$i]['ISI_IKLAN'];
		echo "<br><hr>";
 	} ?>

 	<br><br>


	</body>
</html>