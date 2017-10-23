<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang ".$user[0]['NAME_USER']." ";
			echo form_hidden('nameUser',$user[0]['USERNAME_USER']);
			echo form_hidden('idUser',$user[0]['ID_USER']);
			echo form_submit('btnChangePassword','Change Password');
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
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

				<?php echo form_open('Home/index');?>
				<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
				<td><?php echo form_submit('btnAddComment','Add Comment');?></td>
				<?php echo form_close();?>
			</tr>
		<?php } ?>

		</table>
	</body>
</html>