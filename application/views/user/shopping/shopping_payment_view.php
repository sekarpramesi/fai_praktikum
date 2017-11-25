<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
        <h2>Bayar</h2>
        <div class="clearfix"></div>
</div>
<div class="x_content">
  <br>
  <?php
   $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
  echo form_open('Shopping/payment',$attribute);?>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <h4>Total yang harus dibayar : Rp.<?php echo $this->cart->format_number($this->cart->total());?></h4>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <h4>Total barang yang dibeli : <?php echo $this->cart->total_items();?></h4>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" name="btnKonfBayar" class="btn btn-success">Konfirmasi Pembayaran</button>
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
</div>