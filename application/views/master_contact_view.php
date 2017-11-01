<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Master Contact Form</b></h1>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang,Admin ";
			echo form_submit('btnBack','Go Back');
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
		<?php echo form_open('Home/barang');?>
		Search Filter : <?php echo form_input('txtFilter','filter');?><?php echo form_submit('btnFilter','Filter');?>
		<br>
		<?php echo form_close();?>
		<table border ='1'>
			<tr>
				<th>ID Contact</th>
				<th>Nama User</th>
				<th>Subject</th>
				<th>Isi</th>
				<th>Timestamp</th>
			</tr>
		<?php for($i=0;$i<count($contact);$i++){?>
			<tr>
				<td><?php echo $contact[$i]["ID_CONTACT"];?></td>
				<td><?php echo $contact[$i]["ID_USER"];?></td>
				<td><?php echo $contact[$i]["SUBJECT_CONTACT"];?></td>
				<td><?php echo $contact[$i]["ISI_CONTACT"];?></td>
				<td><?php echo $contact[$i]["TIMESTAMP"];?></td>
			</tr>
		<?php } ?>

		</table>
	</body>
</html>