<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript" src="http://localhost/6478/resources/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="http://localhost/6478/resources/jqueryui/jquery-ui.js"></script>
<script type="text/javascript">
	var items =[];  
	items = <?php echo json_encode($this->session->userdata('searchItem'));?>;
	$(document).ready(function() {
	    //autocomplete
	    $("#search").autocomplete({
	        source: items,
	        minLength: 3,
	        delay: 0,
	    });            

	});
</script>
</head>
	<body>
		<div class="right">
		<?php

			echo form_open('User/index');
			echo"Selamat Datang ".$user[0]['NAME_USER']." ";
			echo form_submit('btnChangePassword','Change Password');
			echo form_submit('btnLogout','Log Out');
			echo form_submit('btnContactUs','Contact Us');
			echo "<br/> <br/>";
			echo form_close();
		?>
	</div>
		<br>
		<br>
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
		<h2><b>Etalase Barang</b></h2>
		<br>
		<?php echo $this->session->flashdata('msg');?>
		<br>
		<?php echo form_open('Barang/search');?>
		Search : <?php
		if($this->session->userdata('searchItem')!=""){
			$attribute=array('id'=>'search','autocomplete'=>'off');
		}else{
			$attribute=array('autocomplete'=>'off');
		}
		 echo form_input('txtSearch','',$attribute);?><?php echo form_submit('btnSearch','Search');?>
		<br>
		<?php echo form_close();?>
		<table border ='1'>
			<tr>
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Jumlah</th>
				<th>Action</th>
			</tr>
		<?php
			for($i=0;$i<count($barang);$i++){?>
			<tr>
				<td><?php echo $barang[$i]["NAMA_BARANG"];?></td>
				<td><?php echo $barang[$i]["HARGA_BARANG"];?></td>
				<td><?php echo $barang[$i]["JUMLAH_BARANG"];?></td>

				<?php echo form_open('Comment/index');?>
				<td><?php
				echo form_hidden('idBarang',$barang[$i]['ID_BARANG']);
				echo form_hidden('namaBarang',$barang[$i]['NAMA_BARANG']);
				 echo form_submit('btnResetBarang','Reset');
				 echo form_submit('btnAddComment','Add Comment');?>
				 </td>
				<?php echo form_close();?>
			</tr>
		<?php } ?>

		</table>

	</body>
</html>