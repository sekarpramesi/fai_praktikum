<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Master User</b></h1>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang,Admin ";
			echo form_submit('btnBack','Go Back');
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<table border ='1'>
			<tr>
				<th>Username</th>
				<th>Nama User</th>
				<th>Email</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		<?php for($i=0;$i<count($barang);$i++){?>
			<tr>
				<td><?php echo $user[$i]["USERNAME_USER"];?></td>
				<td><?php echo $user[$i]["NAME_USER"];?></td>
				<td><?php echo $user[$i]["EMAIL_USER"];?></td>
				<td><?php echo $user[$i]["STATUS_USER"];?></td>
				<?php echo form_open('Home/index');?>
				<td><?php echo form_submit('btnToggle','Toggle Status');?></td>
					<?php echo form_hidden('idUser',$user[$i]["ID_USER"]);?>
					<?php echo form_hidden('statusUser',$user[$i]["STATUS_USER"]);?>
				<?php echo form_close();?>
			</tr>
		<?php } ?>

		</table>
	</body>
</html>