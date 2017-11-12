
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Iklan Baris <small>Lihat Iklan yang diposting user lain</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-6">
						<div class="dataTables_length" id="datatable_length">
							Pilih jumlah hasil : 
							<?php echo form_open("User/index");
								echo '<select name="datatable_length" aria-controls="datatable" class="form-control input-sm" type="submit" onchange="this.form.submit()">';
										$x=array("5","10","15");
										for($i=0;$i<count($x);$i++){
											if($allowed == $x)$selected="selected";else $selected=" ";
											echo "<option value='".$x[$i]."' ".$selected.">".$x[$i]."</option>";
										}
								
								echo "</select>";
								echo form_close();
							?>
						</div>
					</div>
				</div>
				<table class="table table-striped projects">
				  <thead>
				    <tr>
				    <th>Waktu Pengiriman</th>
				    <th>Judul</th>
				    <th>Isi Iklan</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php foreach($results as $iklan){
				    echo
				    '<tr>
				    <td>'.
				      $iklan->TIMESTAMP." WIB".'
				    </td>
				    <td>'.
				      $iklan->JUDUL_IKLAN.'
				    </td>
				    <td>'.
				      $iklan->ISI_IKLAN.'
				    </td>
				    </tr>';
				  } ?>
				  </tbody>
				</table>
				
			</div>
	<div class="col-sm-5">
		<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div></div>
	<div class="col-sm-7">
		<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
			<?php echo $links;?>
		</div>

	</div>
	</div>

</div>
