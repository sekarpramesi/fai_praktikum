<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Hot Items <small>Item yang paling dicari saat ini</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table>
					<tr>
						<th>HOT</th>
						<th>HOT</th>
						<th>HOT</th>
						<th>HOT</th>
						<th>HOT</th>
					</tr>

					
					<tr>
						<?php for($i=0;$i<count($hotBarang);$i++){
							echo '<td>';
							 echo '<img src="http://localhost/6478/uploads/barang/'.$hotBarang[$i]['BARANG_FILE'].'" width="100px" height="100px" />&nbsp;<br>';
							 echo $hotBarang[$i]['NAMA_BARANG'].'<br>'.'Rp.'.$hotBarang[$i]['HARGA_BARANG'].'
							 </td>';
						 }?>
					</tr>
					

				</table>				
			</div>
		</div>
	</div>
</div>