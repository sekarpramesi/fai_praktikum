<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		Selamat Datang, Admin <br/>
		<?php
			echo form_open('Home/index');
				echo form_submit('btnMasterBarang','Master Barang')."<br/>";
				echo form_submit('btnMasterUser','Master User')."<br/>";
			echo form_close();
		?>
	</body>
</html>