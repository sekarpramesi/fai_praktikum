<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			echo form_open('Home/index');
			echo "Selamat Datang ".$user[0]['NAME_USER']."<br>";
			echo form_hidden('nameUser',$user[0]['USERNAME_USER']);
			echo form_hidden('idUser',$user[0]['ID_USER']);
			echo form_hidden('nama',$user[0]['NAME_USER']);
			echo form_submit('btnLogout','Log Out');
			echo form_submit('btnBackUser','Back');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
		<h2><b>CONTACT US</b></h2>
		<br>
		<?php
			echo form_open('Home/contact');
			echo form_input('subjectContact','Subject','required')."<br>";
			echo form_textarea('isiContact','Complaints :','required')."<br>";
			echo "<br>";
			echo form_hidden('idUser',$user[0]['ID_USER']);
			echo form_hidden('nama',$user[0]['NAME_USER']);
			echo form_hidden('nameUser',$user[0]['USERNAME_USER']);
			echo form_submit('btnSendContact','Send');
			echo form_close();
		?>
	</body>
</html>