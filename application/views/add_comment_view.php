

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Tambah Komen <small>Tambah Komen untuk Barang</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
<?php $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open('Comment/index',$attribute);?>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <textarea name="isiComment" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12"></textarea>
    <?php echo form_error('subjectContact','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" name="btnSendComment" class="btn btn-success">Send Comment</button>
    </div>
  </div>
  <?php echo form_close();?>

				</div>
				<div class="clearfix"></div>
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>Nama User</th>
						<th>Waktu Comment</th>
						<th>Isi Comment</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php for($i=0;$i<count($comment);$i++){
				    echo
				    '<tr>
				    <td>'.$comment[$i]['NAME_USER'].'</td>
				    <td>'.$comment[$i]['TIMESTAMP'].' WIB </td>
				    <td>'.$comment[$i]['ISI_COMMENT'].'</td>
				    </tr>';
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
