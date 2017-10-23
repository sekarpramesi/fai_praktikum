<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Change Password Page</b></h1>
		<?php
			echo form_open('Home/changePassword');
			echo form_hidden('idUser',$idUser);
			echo form_hidden('nameUser',$nameUser);
			echo "Old Password <br>";
			echo form_input('txtOldPassword',$oldPassword);
			echo "<br>";
			echo "New Password <br>";
			echo form_input('txtNewPassword',$newPassword);
			echo "<br>";
			echo "Confirm Password <br>";
			echo form_input('txtConfPassword',$confPassword);
			echo "<br>";
			echo form_submit('btnChange','Change Password');
			echo "<br/> <br/>";
			echo validation_errors();
			echo form_close();
			
		?>
	</body>
</html>