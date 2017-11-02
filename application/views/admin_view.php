<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	
	<body>
		Selamat Datang, Admin <br/>
		<?php
			echo form_open('Admin/index');
			echo form_submit('btnLogout','Log Out')."<br/>";
				echo form_submit('btnMasterBarang','Master Barang')."<br/>";
				echo form_submit('btnMasterUser','Master User')."<br/>";
				echo form_submit('btnMasterContact','Master Contact')."<br/>";
				echo form_submit('btnMasterIklan','Master Iklan')."<br/>";
			echo form_close();
		?>
	</body>
</html>