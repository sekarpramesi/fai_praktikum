<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Change Password Page</b></h1>
		<?php
			echo form_open('User/index');
			echo form_hidden('username',$user[0]['USERNAME_USER']);
			echo form_hidden('name',$user[0]['NAME_USER']);
			echo form_submit('btnBackUser','Back');
			echo "<br/> <br/>";
			echo form_close();
		?>
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