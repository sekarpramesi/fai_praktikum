<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Master Iklan</b></h1>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang,Admin ";
			echo form_submit('btnBack','Go Back');
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
		<?php echo form_open('Home/iklan');?>
		Search Filter : <?php echo form_input('txtFilter','filter');?><?php echo form_submit('btnFilter','Filter');?>
		<br>
		<?php echo form_close();?>
		<table border ='1'>
			<tr>
				<th>ID Iklan</th>
				<th>Judul Iklan</th>
				<th>Isi Iklan</th>
				<th>Waktu Pasang</th>
				<th>Action</th>
			</tr>
		<?php for($i=0;$i<count($iklan);$i++){?>
			<tr>
				<td><?php echo $iklan[$i]["ID_IKLAN"];?></td>
				<td><?php echo $iklan[$i]["JUDUL_IKLAN"];?></td>
				<td><?php echo $iklan[$i]["ISI_IKLAN"];?></td>
				<td><?php echo $iklan[$i]["TIMESTAMP"];?></td>					
				<td>
				<?php echo form_open('Home/iklan');?>
					<?php echo form_hidden('idIklan',$iklan[$i]["ID_IKLAN"]);?>
					<?php echo form_submit('btnEdit','Edit');?>
					<?php echo form_submit('btnDelete','Delete');?>
				<?php echo form_close();?>
				</td>
			</tr>
		<?php } ?>

		</table>
		<br>
		<br>

		<?php
			echo form_open('Home/iklan');
			echo "Judul Iklan: ".form_input("txtJudulIklan",$judulIklan);
			echo "<br>";
			echo "Isi Iklan : ".form_textarea("txtIsiIklan",$isiIklan);
			echo "<br>";
			echo form_submit("btnPasang","Pasang Iklan");			
			echo form_close();
		?>

		<br><br>
	</body>
</html>