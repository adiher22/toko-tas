 <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('admin/dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>CM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-shopping-basket"></i><b> Toko</b>Ransel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="fa fa-user-circle"></i>
            <?php
            $query = $this->db->query("select count(status_pelanggan) as stts from pelanggan where status_pelanggan='Baru'");
            foreach ($query->result_array() as $tampil) {
              $status = $tampil['stts'];
            }
            ?>
            <?php
            if ($status>"0") { ?>
            <span class="label label-danger"><?php echo $status;?></span>  
            <?php
            }
            else { ?>
              <span class="label label-danger"></span> 
            <?php
            }
            ?>
            
            </a>
            <ul class="dropdown-menu extended inbox">
             
              <li class="external">
                <a href="<?php echo base_url();?>admin/user/pelanggan"><i class="fa fa-users text-red"></i> Lihat Data Pelanggan Baru</a>
              </li>
            </ul>
          </li>
            <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="fa fa-bell-o"></i>
            <?php
            $query = $this->db->query("select count(status_bayar) as stts from header_transaksi where status_bayar='Belum'");
            foreach ($query->result_array() as $tampil) {
              $status = $tampil['stts'];
            }
            ?>
            <?php
            if ($status>"0") { ?>
            <span class="label label-warning"><?php echo $status;?></span>  
            <?php
            }
            else { ?>
              <span class="label label-warning"></span> 
            <?php
            }
            ?>
            
            </a>
            <ul class="dropdown-menu extended inbox">
             
              <li class="external">
                <a href="<?php echo base_url();?>admin/transaksi"><i class="fa fa-shopping-cart text-yellow"></i> Lihat Data Transaksi Baru</a>
              </li>
            </ul>
          </li>
          
          <li class="dropdown user user-menu">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url(); ?>assets/upload/image/default.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url(); ?>assets/upload/image/default.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php echo $this->session->userdata('nama'); ?> - <?php echo $this->session->userdata('akses_level'); ?>
                  <small><?php echo date('d M Y'); ?></small>
                </p>
              </li>
              
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>