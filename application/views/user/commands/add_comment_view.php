

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
				<?php $attribute=array('data-parsley-validate'=>'','class'=>'form-horizontal form-label-left','novalidate'=>'');
				  echo form_open_multipart('Comment/addComment',$attribute);
				  echo form_label("Upload Gambar :").form_upload("gbr")."<br>";?>
				  <div class="form-group">
				    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subject<span class="required">*</span>
				    </label>
				    <div class="col-md-6 col-sm-6 col-xs-12">
				    <textarea name="isiComment" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12"></textarea>
				    <?php echo form_error('isiComment','<span class="help-block">','</span>')?>
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
				<div class="row">
                  <ul class="list-unstyled msg_list">
                  	<?php for($i=0;$i<count($comment);$i++){?>
                    <li>
                      <a>
                        <span>
                          <span><b><h3><?php echo $comment[$i]['NAME_USER'];?></h3><b></span>
                          <span class="time"> <?php echo $comment[$i]['TIMESTAMP'];?></span>
                        </span>
                        <span class="message"><h4>
                          <?php echo $comment[$i]['ISI_COMMENT'];?></h4>
                        </span>
                        <span class="image">
                          <img src="http://localhost/6478/uploads/comment/<?php echo $comment[$i]['COMMENT_FILE'];?>" alt=" ">
                        </span>
                      </a>
                    </li>
                    <?php }?>
                  </ul>
                 </div>
				
			</div>
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
