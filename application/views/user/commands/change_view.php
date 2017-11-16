<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<div class="clearfix"></div>
</div>
<div class="x_content">
  <br>

  <?php $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open('User/changePassword',$attribute);?>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Password <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="txtOldPassword" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('txtOldPassword','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="txtNewPassword" autocomplete="off" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('txtNewPassword','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="middle-name" name="txtConfPassword" autocomplete="off" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
    <?php echo form_error('txtConfPassword','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" name="btnChange" class="btn btn-success">Change Password</button>
    </div>
  </div>

  <?php echo form_close();
       if($this->session->flashdata('msg') != ""){
         echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>';
                echo $this->session->flashdata('msg');
        echo '</div>';
      }else
       if($this->session->flashdata('msgSuccess') != ""){
         echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>';
                echo $this->session->flashdata('msgSuccess');
        }
  ?>

</div>
</div>
</div>