<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<link href="http://localhost/6478/resources/this.css" rel="stylesheet">
</head>
	<body>

			<div class="right">
		<?php
			echo form_open('User/index');
			echo "Selamat Datang ".$user[0]['NAME_USER']."<br>";
			echo form_submit('btnLogout','Log Out');
			echo form_submit('btnBackUser','Back');
			echo "<br/> <br/>";
			echo form_close();
		?>
	</div>
			<h1><b>Change Password Page</b></h1>
		<?php
		$attribute=array('autocomplete'=>'off');
			echo form_open('User/changePassword');
			echo "Old Password <br>";
			echo form_input('txtOldPassword',$oldPassword,$attribute);
			echo "<br>";
			echo "New Password <br>";
			echo form_input('txtNewPassword',$newPassword,$attribute);
			echo "<br>";
			echo "Confirm Password <br>";
			echo form_input('txtConfPassword',$confPassword,$attribute);
			echo "<br>";
			echo form_submit('btnChange','Change Password');
			echo "<br/> <br/>";
			echo validation_errors();
			echo form_close();
			
		?>
	</body>
</html>