<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Log In</title>
</head>
<body>
	<div id="container">
		LOG IN<HR>
		<?php
		$attribute=array('autocomplete'=>'off');
			echo form_open('Home/login');
				echo "Username: " . form_input('txtUsername', $username,$attribute) . "<br/>";
				echo "Password : " . form_password('txtPassword', $password,$attribute) . "<br/><br/>";
				echo form_submit('btnLogin','Login');
				echo form_submit('btnHome','Back to Home');
			echo form_close();
			echo $this->session->flashdata('msg');
		?>
	</div>
</body>
</html>