<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<body>
		<h1><b>Master Barang</b></h1>
		<?php
			echo form_open('Home/index');
			echo"Selamat Datang,Admin ";
			echo form_submit('btnBack','Go Back');
			echo form_submit('btnLogout','Log Out');
			echo "<br/> <br/>";
			echo form_close();
		?>
		<br>
		<?php echo form_open('Home/barang');?>
		Search Filter : <?php echo form_input('txtFilter','filter');?><?php echo form_submit('btnFilter','Filter');?>
		<br>
		<?php echo form_close();?>
		<table border ='1'>
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Jumlah</th>
				<th>Hot Item</th>
				<th>Action</th>
			</tr>
		<?php for($i=0;$i<count($barang);$i++){?>
			<tr>
				<td><?php echo $barang[$i]["ID_BARANG"];?></td>
				<td><?php echo $barang[$i]["NAMA_BARANG"];?></td>
				<td><?php echo $barang[$i]["HARGA_BARANG"];?></td>
				<td><?php echo $barang[$i]["JUMLAH_BARANG"];?></td>
				<td><?php if($barang[$i]["HOT_BARANG"]==1){
						echo "HOT";
					}else if ($barang[$i]["HOT_BARANG"]==0) {
						echo "Standard";
					}?>
				</td>
				
				<td>
				<?php echo form_open('Home/barang');?>
					<?php echo form_submit('btnEdit','Edit');?>
					<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
					<?php echo form_submit('btnDelete','Delete');?>
				<?php echo form_close();?>
					<?php echo form_open('Home/comment');?>
					<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
					<?php echo form_submit('btnViewComment','View Comment');?>
				<?php echo form_close();?>
				<?php echo form_open('Home/admin');?>
					<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
					<?php echo form_hidden('hotBarang',$barang[$i]["HOT_BARANG"]);?>
					<?php echo form_submit('btnHotToggle','Toggle Hot Item');?>
				<?php echo form_close();?>
				
				</td>
			</tr>
		<?php } ?>

		</table>
		<br>
		<br>

		<?php
			echo form_open('Home/barang');
			echo "Nama Barang : ".form_input("txtNamaBarang",$namaBarang);
			echo "<br>";
			echo "Harga : ".form_input("txtHargaBarang",$hargaBarang);
			echo "<br>";
			echo "Jumlah : ".form_input("txtJumlahBarang",$jumlahBarang);
			echo "<br>";
			echo form_hidden("jmlData",count($barang));
			echo form_submit("btnTambah","Tambah Barang");			
			echo form_close();
		?>

		<br><br>
		<?php if($comment !=""){
			for($i=0;$i<count($comment);$i++){
			echo $comment[$i]['ID_USER']." ";
			echo $comment[$i]['TIMESTAMP']." WIB";
			echo "<br><hr>";
			echo $comment[$i]['ISI_COMMENT'];
			echo "<br><hr>";
		 }
		}?>
	</body>
</html>