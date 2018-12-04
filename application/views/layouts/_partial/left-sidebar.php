<section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/lte/img/simaniss.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('namauser')?></p>
          <!-- Status -->
<!--           <i class="fa fa-circle text-success"></i>  -->
          <a><i class="fa fa-circle text-success"></i><?php echo $this->session->userdata('hak_akses')?> </a>
        </div>
      </div>

      <!-- search form (Optional) -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree" >
        <li class="header" style="text-align: center; color: #c7c7c7;">PT. BALIYONI SAGUNA</li>
        <li><a href=" <?php echo base_url('index.php/Dashboard') ?> "><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href=" <?php echo base_url('index.php/Profil') ?> "><i class="fa fa-user"></i> <span>Profil Pengguna</span></a></li>
        <?php if ($this->session->userdata('id_akses') == 1) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/Karyawan')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i> Data Karyawan </a></li>
            <li><a href="<?php echo base_url('index.php/Customer')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-group"></i> Data Customer </a></li>
            <li><a href="<?php echo base_url('index.php/Suplayer')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cart-plus"></i> Data Suplayer </a></li>
            <li><a href="<?php echo base_url('index.php/Sparepart')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-wrench"></i> Data Sparepart </a></li>
            <li><a href="<?php echo base_url('index.php/Jasa')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-support"></i> Data Jasa </a></li>
            <li><a href="<?php echo base_url('index.php/Kategori')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-tasks"></i> Kategori Service </a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if ($this->session->userdata('id_akses') == 1) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/Penerimaan')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i> Penerimaan Service </a></li>
            <li><a href="<?php echo base_url('index.php/Pengembalian')?>">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o"></i> Pengembalian Service </a></li>
          </ul>
        </li>
        <?php } ?>
        <li><a href=" <?php echo base_url('index.php/Servis') /*== base_url('index.php/Servis/view_detail')*/ ?> "><i class="fa fa-share-alt"></i> <span>Service</span></a></li>
        <?php if ($this->session->userdata('id_akses') == 1) { ?>
        <li><a href=" <?php echo base_url('index.php/Laporan') ?> "><i class="fa fa-book"></i> <span>Laporan</span></a></li>
        <?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>