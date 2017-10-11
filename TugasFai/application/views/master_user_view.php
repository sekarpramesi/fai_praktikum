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
			echo form_input('dataUser',$dataUser);
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
		<?php
			$data = explode("_",$dataUser); 
			foreach($data as $r){
				$user = explode("-",$r);?>
			<td><?= $user[0];?></td>
			<td><?= $user[3];?></td>
			<td><?= $user[4];?></td>
			<td><?= $user[2];?></td>
			<td>
				<?= form_open('Home/toggle');
					echo form_submit('btnToggle','Toggle Status');
				form_close();?>
			</td>
		<?php } ?>

		</table>
	</body>
</html>