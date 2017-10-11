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
			echo form_open('Home/login');
				echo "Username: " . form_input('txtUsername', $username) . "<br/>";
				echo "Password : " . form_password('txtPassword', $password) . "<br/><br/>";
				echo form_submit('btnLogin','Login');
				echo form_input('dataUser', $dataUser);
			echo form_close();
			echo validation_errors();
		?>
	</div>
</body>
</html>