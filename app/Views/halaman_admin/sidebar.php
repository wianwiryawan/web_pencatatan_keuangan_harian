<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pages/admin'); ?>">
        <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/ajstore46_logo.jfif" width="30" height="30">
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu Keuangan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-file-contract"></i>
            <span>Keuangan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('pages/dataPenjualan'); ?>">Data Penjualan Produk</a>
                <a class="collapse-item" href="<?php echo base_url('pages/dataPengeluaran'); ?>">Data Pengeluaran</a>
                <a class="collapse-item" href="<?php echo base_url('pages/dataHutangPiutang'); ?>">Data Hutang & Piutang</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item">
        <a class="nav-link" href="/pages/dataProduk">
            <i class="fas fa-tag"></i>
            <span>Produk</span></a>
    </li>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link" href="/pages/dataUser">
            <i class="fas fa-user"></i>
            <span>User Management</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>