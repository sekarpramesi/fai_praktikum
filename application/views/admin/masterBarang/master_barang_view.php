

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Etalase Barang</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID</th>
						<th> - </th>
						<th>Nama Barang</th>
						<th>Harga Jual</th>
						<th>Jumlah</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php for($i=0;$i<count($barang);$i++){
				    echo
				    '<tr>
				    <td>'.$barang[$i]['ID_BARANG'].'</td>
				    <td><img src="http://localhost/6478/uploads/barang/'.$barang[$i]['BARANG_FILE'].'" width="100px" height="100px" />&nbsp;</td>
				    <td>'.$barang[$i]['NAMA_BARANG'].'</td>
				    <td>'. $barang[$i]['HARGA_BARANG'].'</td>
				    <td>'.$barang[$i]['JUMLAH_BARANG'].'</td>
					<td>';

					if($barang[$i]["HOT_BARANG"]==1){
						echo "HOT";
					}else if ($barang[$i]["HOT_BARANG"]==0) {
						echo "Standard";
					}

				'</td>';?>
				<td>
					<?php echo form_open('Barang/barang');?>
						<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
						<?php echo form_submit('btnEdit','Edit');?>
					<?php echo form_close();?>	
					<?php echo form_open('Barang/barang');?>
						<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
						<?php echo form_submit('btnDelete','Delete');?>
					<?php echo form_close();?>
					<?php echo form_open('Comment/viewComment');?>
					<?php echo form_hidden('namaBarang',$barang[$i]["NAMA_BARANG"]);?>
						<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
						<?php echo form_submit('btnViewComment','View Comment');?>
					<?php echo form_close();?>
					<?php echo form_open('Barang/barang');?>
						<?php echo form_hidden('idBarang',$barang[$i]["ID_BARANG"]);?>
						<?php echo form_hidden('hotBarang',$barang[$i]["HOT_BARANG"]);?>
						<?php echo form_submit('btnHotToggle','Toggle Hot Item');?>
					<?php echo form_close();?>
				</td>
				</tr>
				<?php }?>
				  </tbody>
				</table>
				
			</div>
	<div class="col-sm-5">
		<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div>
	</div>
	<div class="col-sm-7">
		<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
			<?php echo $links;?>
		</div>
	</div>
	</div>

</div>	
