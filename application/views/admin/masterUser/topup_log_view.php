

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>TopUp Log</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID Topup</th>
						<th>Nama User</th>
						<th>Nominal</th>
						<th>Tanggal</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php for($i=0;$i<count($topup);$i++){
				    echo
				    '<tr>
				    <td>'.$topup[$i]['ID_TOPUP'].'</td>
				    <td>'.$topup[$i]['NAME_USER'].'</td>
				    <td>'. $topup[$i]['NOMINAL'].'</td>
				    <td>'.$topup[$i]['TIMESTAMP'].'</td>';
				    ?>	
					</tr>
				<?php }?>
				  </tbody>
				</table>
				
			</div>
	</div>

</div>	
