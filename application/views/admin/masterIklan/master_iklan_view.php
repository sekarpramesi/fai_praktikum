

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>List Iklan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID</th>
						<th>File</th>
						<th>Judul</th>
						<th>Isi</th>
						<th>Waktu Dibuat</th>
						<th>Action</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php for($i=0;$i<count($iklan);$i++){
				    echo
				    '<tr>
				    <td>'.$iklan[$i]['ID_IKLAN'].'</td>
				    <td><img src="http://localhost/6478/uploads/iklan/'.$iklan[$i]['FILE_IKLAN'].'" width="100px" height="100px" />&nbsp;</td>
				    <td>'.$iklan[$i]['JUDUL_IKLAN'].'</td>
				    <td>'.$iklan[$i]['ISI_IKLAN'].'</td>
				    <td>'.$iklan[$i]['TIMESTAMP'].'</td>';
				echo '<td>';?>
					<?php echo form_open('Iklan/editIklan');?>
						<?php echo form_hidden('judul',$iklan[$i]["JUDUL_IKLAN"]);?>
						<?php echo form_hidden('isi',$iklan[$i]["ISI_IKLAN"]);?>
						<?php echo form_hidden('idIklan',$iklan[$i]["ID_IKLAN"]);?>
						<?php echo form_submit('btnEdit','Edit');?>
					<?php echo form_close();?>	
					<?php echo form_open('Iklan/deleteIklan');?>

						<?php echo form_hidden('idIklan',$iklan[$i]["ID_IKLAN"]);?>
						<?php echo form_submit('btnDelete','Delete');?>
					<?php echo form_close();?>
				</td>
				</tr>
				<?php }?>
				  </tbody>
				</table>
				
			</div>
	</div>

</div>	
