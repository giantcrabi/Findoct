<!-- menu profile quick info -->
<div class="profile">
  <div class="profile_pic">
    <img src="<?php echo base_url('uploads/user.png'); ?>" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info" style="padding-top:17px">
    <span>Selamat datang,</span>
    <h2><strong>
      <!-- <?php
      if ($_SESSION['name'] != NULL)
      {
        echo $_SESSION['name'];
        ?>
        <br>
        <?php
        echo $namainstitusi;
      }
      ?> -->
      Gian
    </strong></h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <div class="clearfix"></div>

      <ul class="nav side-menu">
        <li><a>Dokter<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#">Lihat Dokter</a></li>
          <li><a href="#">Add Dokter</a></li>
        </ul></li>
        <li><a>Tempat Praktek<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#">Lihat Tempat Praktek</a></li>
          <li><a href="#">Add Tempat Praktek</a></li>
        </ul></li>
        <li><a href="#">Assign Jadwal Praktek</a></li>
        <!-- <?php
        if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
          foreach ($usedmpg as $rowmpg) {
            echo
            "<li><a> ".$rowmpg->masterprivilegegroupname." <span class=\"fa fa-chevron-down\"></span></a>";
            if ($rowmpg->masterprivilegegroupid == 1) {
              echo "<ul class=\"nav child_menu\">";
            }
            foreach ($usedpg as $rowpg) {
              if($rowpg->masterprivilegegroupid == $rowmpg->masterprivilegegroupid) {
                if ($rowpg->masterprivilegegroupid == 1) {
                  echo
                  "<li><a> ".$rowpg->privilegegroupname." <span class=\"fa fa-chevron-down\"></span></a>";
                }
                echo "<ul class=\"nav child_menu\" style=\"display: none\">";
                foreach ($listdp as $rowdp) {
                  if($rowdp->idprivilegegroup == $rowpg->idprivilegegroup) {
                    echo "<li><a href=".base_url($rowdp->pageurl).">".$rowdp->menuname."</a></li>";
                  }
                }
                echo "</ul></li>";
              }
            }
            if ($rowmpg->masterprivilegegroupid == 1) {
              echo "</ul></li>";
            }
          }
        }
        elseif ($_SESSION['role'] == 3) {
          foreach ($listdp as $rowdp) {
            echo "<li><a href=".base_url($rowdp->pageurl).">".$rowdp->menuname."</a></li>";
          }
        }
        ?> -->
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

</div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url('uploads/user.png'); ?>" alt="" style="float: left">
            <!-- <?php
            if ($_SESSION['name'] != NULL)
            {
              echo $_SESSION['name'];
            }
            ?> -->
            <h5 style="color: white; float: left">Gian</h5>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Profile</a></li>
            <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
