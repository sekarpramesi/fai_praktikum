

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>List Contact</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID</th>
						<th>File</th>
						<th>Nama User</th>
						<th>Judul Pesan</th>
						<th>Isi Pesan</th>
						<th>Waktu Kirim</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php for($i=0;$i<count($contact);$i++){
				    echo
				    '<tr>
				    <td>'.$contact[$i]['ID_CONTACT'].'</td>
				    <td><img src="http://localhost/6478/uploads/contact/'.$contact[$i]['CONTACT_FILE'].'" width="100px" height="100px" alt=" " />&nbsp;</td>
				    <td>'.$contact[$i]['NAME_USER'].'</td>
				    <td>'. $contact[$i]['SUBJECT_CONTACT'].'</td>
				    <td>'.$contact[$i]['ISI_CONTACT'].'</td>
				    <td>'.$contact[$i]['TIMESTAMP'].'</td>';
					echo '</tr>';
				 }?>
				  </tbody>
				</table>
				
			</div>
	</div>

</div>	
