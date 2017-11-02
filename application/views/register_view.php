<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
	</head>

	<body>
		<div>
		Register
			<?php
			$attribute=array('autocomplete'=>'off');
				echo form_open('Home/register');
					echo "Name: ".form_input('txtName',$name,$attribute)."<br/>";
					echo "Username : ".form_input('txtUsername',$username,$attribute)."<br/>";
					echo "Email : ".form_input('txtEmail',$email,$attribute)."<br/>";
					echo "Password : ".form_password('txtPassword',$password,$attribute)."<br/>";
					echo "Confirm Password : ".form_password('txtConfPassword',$confPassword,$attribute)."<br/>";
					echo form_submit('btnSendRegistration','Register')."<br/>";
					echo form_submit('btnHome','Back to Home')."<br/>";
					echo validation_errors();
					echo $this->session->flashdata('msg');
				echo form_close();
			?>
		</div>
	</body>
</html>