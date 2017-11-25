  <?php
   $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open('Admin/addCreditUser',$attribute);?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
        <h2>Add Credit&nbsp<span><?php echo $nameUser;?></span></h2>
        <div class="clearfix"></div>
</div>
<div class="x_content">
  <br>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Nominal: <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select class="form-control col-md-7 col-xs-12" name="nominalCredit" autocomplete="off" id="first-name">
          <option value="15000">Rp.15.000,-</option>
          <option value="25000">Rp.25.000,-</option>
          <option value="50000">Rp.50.000,-</option>
          <option value="100000">Rp.100.000,-</option>
      </select>
    <?php echo form_error('txtNama','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

    <button type="submit" name="btnAddCredit" class="btn btn-success">Tambah Credit</button>
    </div>
  </div>
  <?php echo form_hidden('idUser',$idUser);?> 
   <?php echo form_close();?>

  <?php
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