<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			echo form_open('User/index');
			echo "Selamat Datang ".$user[0]['NAME_USER']."<br>";
			echo form_submit('btnLogout','Log Out');
			echo form_submit('btnBackUser','Back');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
		<h2><b>CONTACT US</b></h2>
		<br>
		<?php
		$attribute=array('autocomplete'=>'off');
			echo form_open('Contact/sendContact');
			echo form_input('subjectContact','Subject',$attribute)."<br>";
			echo form_textarea('isiContact','Complaints :',$attribute)."<br>";
			echo "<br>";
			echo form_submit('btnSendContact','Send');
			echo validation_errors();
			echo $this->session->flashdata('msg');
			echo form_close();
		?>
	</body>
</html>