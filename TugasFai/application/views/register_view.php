<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
	</head>

	<body>
		<div>
		Register
			<?php
				echo form_open('Home/register');
					echo "Name: ".form_input('txtName',$name)."<br/>";
					echo "Username : ".form_input('txtUsername',$username)."<br/>";
					echo "Email : ".form_input('txtEmail',$email)."<br/>";
					echo "Password : ".form_password('txtPassword',$password)."<br/>";
					echo "Confirm Password : ".form_password('txtConfPassword',$password)."<br/>";
					echo form_submit('btnRegister','Register')."<br/>";
					echo form_submit('btnHome','Back to Home')."<br/>";
					echo form_input('dataUser',$dataUser);
					echo validation_errors();
				echo form_close();
			?>
		</div>
	</body>
</html>