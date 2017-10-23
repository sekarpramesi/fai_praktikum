<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<div id="container">
		MAIN MENU<HR>
		<?php
			echo form_open('Home/index');
				echo form_submit('btnRegister','Register') . "<BR><BR>";
				echo form_submit('btnLogin','Login');
			echo form_close();
		?>
	</div>
</body>
</html>