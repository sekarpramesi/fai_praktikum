

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Etalase Barang <small>Lihat Iklan yang diposting user lain</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
					<div class="col-sm-12">
						<div id="datatable_filter" class="dataTables_filter">
							<?php echo form_open('Barang/search');?>
							<label>Search:<?php
								if($this->session->userdata('searchItem')!=""){
								$attribute=array('id'=>'search','autocomplete'=>'off','class'=>'form-control input-sm','aria-controls'=>'datatable');
								}else{
								$attribute=array('autocomplete'=>'off','class'=>'form-control input-sm','aria-controls'=>'datatable');
								}
							echo form_input('txtSearch','',$attribute);?>
							<?php echo form_submit('btnSearch','Search');?></label>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID</th>
						<th> - </th>
						<th>Nama Barang</th>
						<th>Harga Jual</th>
						<th>Jumlah</th>
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
				    <td>'.$barang[$i]['JUMLAH_BARANG'].'</td>';
					echo form_open('Comment/addComment').'<td>';

						echo form_hidden('idBarang',$barang[$i]['ID_BARANG']);
						echo form_hidden('namaBarang',$barang[$i]['NAMA_BARANG']);
						//echo form_submit('btnResetBarang','Reset');
						echo form_submit('btnAddComment','Add Comment');
					 echo "</td>.";
					echo form_close().'</tr>';
					  } ?>
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
