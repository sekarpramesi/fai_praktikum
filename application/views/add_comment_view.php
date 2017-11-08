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
			echo"Selamat Datang ".$user[0]['NAME_USER'];
			echo form_submit('btnLogout','Log Out');
			echo form_submit('btnBackUser','Back');
			echo "<br/> <br/>";
			echo form_close();
		?>
		</div>
		<br>
		<h2><b>Add comment for <?php echo $namaBarang;?></b></h2>
		<br>
		<?php
		$attribute=array('autocomplete'=>'off');
			echo form_open('Comment/addComment');
			echo form_textarea('isiComment','Isi Comment',$attribute);
			echo "<br>";
			echo form_submit('btnSendComment','Send');
			echo form_close();
		?>
		<br>
		<?php for($i=0;$i<count($comment);$i++){
			echo $comment[$i]['NAME_USER']." ";
			echo $comment[$i]['TIMESTAMP']." WIB";
			echo "<br><hr>";
			echo $comment[$i]['ISI_COMMENT'];
			echo "<br><hr>";
		 } ?>

		</table>
	</body>
</html>