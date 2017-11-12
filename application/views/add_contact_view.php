

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
  <?php $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open('Contact/sendContact',$attribute);?>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="subjectContact" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('subjectContact','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Isi<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <textarea name="isiContact" autocomplete="off" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"></textarea>
    <?php echo form_error('isiContact','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" name="btnSendContact" class="btn btn-success">Send Contact</button>
    </div>
  </div>

  <?php echo form_close();
     if($this->session->flashdata('msg') != ""){
     echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>';
            echo $this->session->flashdata('msg');
    }?>
			</div>
	</div>

</div>	
