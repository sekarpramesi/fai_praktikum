<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang ".$name." ";
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_input('dataUser',$dataUser);
			echo form_close();
		?>
		<table border ='1'>
			<tr>
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Jumlah</th>
			</tr>
		<?php //foreach(){?>

		<?php //} ?>

		</table>
	</body>
</html>