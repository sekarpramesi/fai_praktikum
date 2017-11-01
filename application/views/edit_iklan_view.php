<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Edit Iklan</b></h1>
		<?php
			echo form_open('Home/index');
			echo form_submit('btnBack','Back');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<?php
			echo form_open('Home/iklan');
			echo form_hidden('idIklan',$idIklan);
			echo "Judul Iklan: <br>";
			echo form_input('judulIklan',$judulIklan);
			echo "<br>";
			echo "Isi Iklan :  <br>";
			echo form_textarea('isiIklan',$isiIklan);
			echo "<br>";
			echo form_submit('btnGantiIklan','Ganti');
			echo "<br/> <br/>";
			echo validation_errors();
			echo form_close();
			
		?>
	</body>
</html>