<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
        <h2>Tambah Barang</h2>
        <div class="clearfix"></div>
</div>
<div class="x_content">
  <br>
  <?php
   $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open_multipart('Barang/tambahBarang',$attribute);
  echo form_label("Upload Gambar :").form_upload("gbr")."<br>";?>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="txtNama" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('txtNama','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Barang <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" name="txtHarga" autocomplete="off" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
    <?php echo form_error('txtHarga','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="middle-name" name="txtJumlah" autocomplete="off" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
    <?php echo form_error('txtJumlah','<span class="help-block">','</span>')?>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

    <button type="submit" name="btnTambah" class="btn btn-success">Tambah Barang</button>
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