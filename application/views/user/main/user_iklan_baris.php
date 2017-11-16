
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Iklan Baris <small>Lihat Iklan yang diposting user lain</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <ul class="list-unstyled msg_list">
                    <?php for($i=0;$i<count($iklan);$i++){?>
                    <li>
                      <a>
                        <span>
                          <span><b><h3><?php echo $iklan[$i]['JUDUL_IKLAN'];?></h3><b></span>
                          <span class="time"> <?php echo $iklan[$i]['TIMESTAMP'];?></span>
                        </span>
                        <span class="message"><h4>
                          <?php echo $iklan[$i]['ISI_IKLAN'];?></h4>
                        </span>
                        <span class="image">
                          <img src="http://localhost/6478/uploads/iklan/<?php echo $iklan[$i]['FILE_IKLAN'];?>" alt=" " height="50px" width="50px">
                        </span>
                      </a>
                    </li>
                    <?php }?>
                  </ul>
        
      </div>
                </div>
              </div>
</div>	

				
			</div>
	</div>

</div>
