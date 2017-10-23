<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang ".$user[0]['NAME_USER']." ";
			echo form_hidden('nameUser',$user[0]['USERNAME_USER']);
			echo form_hidden('idUser',$user[0]['ID_USER']);
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
		<h2><b>Add comment for <?php echo $barang[0]['NAMA_BARANG'];?></b></h2>
		<br>
		<?php
			echo form_open('Home/index');
			echo form_textarea('isiComment','Isi Comment','required');
			echo "<br>";
			echo form_hidden('idBarang',$barang[0]['ID_BARANG']);
			echo form_hidden('idUser',$user[0]['ID_USER']);
						echo form_hidden("jmlComment",count($comment));
			echo form_submit('btnSendComment','Send');
			echo form_close();
		?>
		<br>
		<?php for($i=0;$i<count($comment);$i++){
			echo $comment[$i]['ID_USER']." ";
			echo $comment[$i]['TIMESTAMP']." WIB";
			echo "<br><hr>";
			echo $comment[$i]['ISI_COMMENT'];
			echo "<br><hr>";
		 } ?>

		</table>
	</body>
</html>