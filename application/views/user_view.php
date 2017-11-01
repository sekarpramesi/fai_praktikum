<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang ".$user[0]['NAME_USER']." ";
			echo form_hidden('nameUser',$user[0]['USERNAME_USER']);
			echo form_hidden('idUser',$user[0]['ID_USER']);
			echo form_hidden('nama',$user[0]['NAME_USER']);
			echo form_submit('btnChangePassword','Change Password');
			echo form_submit('btnLogout','Log Out');
			echo form_close();
			echo form_open('Home/contact');
			echo form_hidden('nameUser',$user[0]['USERNAME_USER']);
			echo form_hidden('idUser',$user[0]['ID_USER']);
			echo form_hidden('nama',$user[0]['NAME_USER']);
			echo form_submit('btnContactUs','Contact Us');
			echo "<br/> <br/>";
			echo form_close();
		?>
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
		<?php
			if($confirmation!=null){
				echo "<hr>";
				echo $confirmation;
				echo "<hr>";
			}
		?>
		<br>
		<?php echo form_open('Home/index');?>
		Search Filter : <?php echo form_input('txtFilter','filter');?><?php echo form_submit('btnFilter','Filter');?>
		<br>
		<?php echo form_close();?>
		<table border ='1'>
			<tr>
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Jumlah</th>
				<th>Action</th>
			</tr>
		<?php for($i=0;$i<count($barang);$i++){?>
			<tr>
				<td><?php echo $barang[$i]["NAMA_BARANG"];?></td>
				<td><?php echo $barang[$i]["HARGA_BARANG"];?></td>
				<td><?php echo $barang[$i]["JUMLAH_BARANG"];?></td>

				<?php echo form_open('Home/comment');?>
				<?php echo form_hidden('nameUser',$user[0]['USERNAME_USER']);?>
				<?php echo form_hidden('idUser',$user[0]['ID_USER']);?>
				<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
				<?php echo form_hidden('nama',$user[0]['NAME_USER']);?>
				<td><?php echo form_submit('btnAddComment','Add Comment');?></td>
				<?php echo form_close();?>
			</tr>
		<?php } ?>

		</table>

	</body>
</html>