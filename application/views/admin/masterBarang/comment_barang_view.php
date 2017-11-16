

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Komentar <small> <?php echo $namaBarang;?></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
              </div>
</div>	
