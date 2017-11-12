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
						<th>Items List</th>
					</tr>

					<?php for($i=0;$i<count($hotBarang);$i++){?>
					<tr>
						<td><?php echo $hotBarang[$i]['NAMA_BARANG'];?></td>
					</tr>
					<?php }?>

				</table>				
			</div>
		</div>
	</div>
</div>