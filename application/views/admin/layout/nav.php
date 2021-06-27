  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
    <!-- MENU DASHBOARD -->
		<li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>
       <!-- MENU PRODUK -->
        <li class="treeview">
          <a href="#">
          <!-- MENU PRODUK -->
            <i class="fa fa-sitemap"></i> <span>PRODUK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/produk'); ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?= base_url('admin/produk/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
            <li><a href="<?= base_url('admin/kategori'); ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
          </ul>
        </li>

        <!-- MENU REKENING -->
        <li><a href="<?= base_url('admin/rekening'); ?>"><i class="fa fa-credit-card text-aqua"></i> <span>DATA REKENING</span></a></li>
        <!-- MENU REKENING -->
        <li><a href="<?= base_url('admin/ongkir'); ?>"><i class="fa fa-truck"></i> <span>DATA ONGKIR</span></a></li>
        <!-- MENU USER -->
        <li class="treeview">
          <a href="#">

            <i class="fa fa-user"></i> <span>PENGGUNA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/user'); ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
             <li><a href="<?= base_url('admin/user/pelanggan'); ?>"><i class="fa fa-user"></i> Data Pelanggan</a></li>
            <li><a href="<?= base_url('admin/user/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Pengguna</a></li>
          </ul>
        </li>
        <!-- MENU TRANSAKSI -->
        <li><a href="<?= base_url('admin/transaksi'); ?>"><i class="fa fa-exchange text-aqua"></i> <span>TRANSAKSI</span></a></li>
        <!-- MENU LAPORAN -->
        <li><a href="<?= base_url('admin/laporan'); ?>"><i class="fa fa-outdent"></i> <span>LAPORAN</span></a></li>
       <!-- MENU KONFIGURASI -->
        <li class="treeview">
          <a href="#">

            <i class="fa fa-wrench"></i> <span>KONFIGURASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/konfigurasi'); ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?= base_url('admin/konfigurasi/logo'); ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
             <li><a href="<?= base_url('admin/konfigurasi/slider'); ?>"><i class="fa fa-sliders"></i> Konfigurasi Slider</a></li>
             <li><a href="<?= base_url('admin/konfigurasi/icon'); ?>"><i class="fa fa-info"></i> Konfigurasi Icon</a></li>
              <li><a href="<?= base_url('admin/konfigurasi/banner'); ?>"><i class="fa fa-picture-o"></i> Konfigurasi Banner</a></li>

          </ul>
        </li>
         <!-- MENU BUKUTAMU -->
        <li><a href="<?= base_url('admin/bukutamu'); ?>"><i class="fa fa-book"></i> <span>BUKUTAMU</span></a></li>
        <!-- MENU LOGOUT -->
        <li><a href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> <span>LOGOUT</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">