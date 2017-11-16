

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Daftar User</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID</th>
						<th> - </th>
						<th>Nama</th>
						<th>Username</th>
						<th>Password</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php for($i=0;$i<count($user);$i++){
				    echo
				    '<tr>
				    <td>'.$user[$i]['ID_USER'].'</td>
				    <td><img src="http://localhost/6478/uploads/user/'.$user[$i]['FILE_USER'].'" width="100px" height="100px" />&nbsp;</td>
				    <td>'.$user[$i]['NAME_USER'].'</td>
				    <td>'. $user[$i]['USERNAME_USER'].'</td>
				    <td>'.$user[$i]['PASSWORD_USER'].'</td>
				    <td>'.$user[$i]['EMAIL_USER'].'</td>
				    <td>'.$user[$i]['STATUS_USER'].'</td>';

				echo '<td>';?>
					<?php echo form_open('User/editGambar');?>
						<?php echo form_hidden('idUser',$user[$i]["ID_USER"]);?>
						<?php echo form_submit('btnEdit','Edit Gambar');?>
					<?php echo form_close();?>	
				</td>
				</tr>
				<?php }?>
				  </tbody>
				</table>
				
			</div>
	</div>

</div>	
