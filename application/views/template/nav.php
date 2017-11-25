
       <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">

                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="http://localhost/6478/<?php echo $this->session->userdata['photo'];?>" alt="http://localhost/6478/resources/user.png"><?php echo $this->session->userdata['name'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="http://localhost/6478/index.php/Contact/index"><i class="fa fa-phone pull-right"></i> Contact Us</a></li>
                    <!--<li><a href="http://localhost/6478/index.php/User/changePassword"><i class="fa fa-user pull-right"></i> Change Password</a></li>-->
                    <li><a href="http://localhost/6478/index.php/User/Logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <li "">
                  <a href="http://localhost/6478/index.php/Shopping/index">
                     <span>Lihat Cart</span>
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge bg-green"><?php echo $this->cart->total_items();?></span>
                  </a>
                </li>
                <li "">
                  <a href="">
                    <i class="fa fa-money"></i>
                    <span>Credit : Rp.<?php echo $this->session->userdata['credit'];?>&nbsp &nbsp</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>