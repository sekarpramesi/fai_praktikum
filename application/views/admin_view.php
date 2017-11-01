<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		Selamat Datang, Admin <br/>
		<?php
			echo form_open('Home/admin');
			echo form_hidden('nameUser','admin');
			echo form_hidden('idUser','admin');
			echo form_close();
			echo form_open('Home/index');
			echo form_submit('btnLogout','Log Out')."<br/>";
			echo form_close();
			echo form_open('Home/admin');
				echo form_submit('btnMasterBarang','Master Barang')."<br/>";
				echo form_submit('btnMasterUser','Master User')."<br/>";
				echo form_submit('btnMasterContact','Master Contact')."<br/>";
				echo form_submit('btnMasterIklan','Master Iklan')."<br/>";
			echo form_close();
		?>
	</body>
</html>