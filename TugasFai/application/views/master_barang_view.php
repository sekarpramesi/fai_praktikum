<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Master Barang</b></h1>
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
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Jumlah</th>
				<th>Action</th>
			</tr>
		<?php //foreach(){?>

		<?php //} ?>

		</table>
		<br/><br/>
		<?php
			echo form_open('Home/actionBarang');
			echo "Nama Barang : ".form_input("txtNamaBarang",$namaBarang);
			echo "Harga : ".form_input("txtHargaBarang",$hargaBarang);
			echo "Jumlah : ".form_input("txtJumlahBarang",$jumlahBarang);
			echo form_submit("btnTambahBarang","Tambah Barang");
			echo form_submit("btnEditBarang","Edit Barang");			
			echo form_close();
		?>
	</body>
</html>