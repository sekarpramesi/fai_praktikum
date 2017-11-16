<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
        <h2>Tambah Iklan</h2>
        <div class="clearfix"></div>
</div>
<div class="x_content">
  <br>
  <?php
   $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open_multipart('Iklan/addIklan',$attribute);
  echo form_label("Upload Gambar :").form_upload("gbr")."<br>";?>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Iklan<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="txtJudul" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('txtJudul','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Isi Iklan<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="txtIsi" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('txtIsi','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

    <button type="submit" name="btnTambah" class="btn btn-success">Tambah Iklan</button>
    </div>
  </div>
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