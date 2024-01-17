<!-- Navbar -->
<nav class="main-header navbar sticky-top navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
        <a href="<?= base_url() ?>index3.html" class="navbar-brand">
            <img src="<?= base_url() ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SPLTJFI 2</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= site_url() ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('spl') ?>" class="nav-link <?= ($title == 'Data SPL') ? 'active' : ''; ?>">SPL</a>
                </li>

                <?php if (in_groups('Administrator') || in_groups('Admin HRGA')) : ?>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Master</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="<?= site_url('karyawan') ?>" class="dropdown-item <?= ($title == 'Data Karyawan') ? 'active' : ''; ?>">Data Karyawan </a></li>
                            <li><a href="<?= site_url('departement') ?>" class="dropdown-item <?= ($title == 'Data Departement') ? 'active' : ''; ?>">Data Departement </a></li>

                            <?php if (in_groups('Administrator')) : ?>
                                <li class="dropdown-divider"></li>
                                <!-- Level two dropdown-->
                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Manage User</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="<?= site_url('user') ?>" class="dropdown-item <?= ($title == 'Data User') ? 'active' : ''; ?>">User</a>
                                        </li>
                                        <li><a href="<?= site_url('role') ?>" class="dropdown-item <?= ($title == 'Data Role') ? 'active' : ''; ?>">Role</a></li>
                                    </ul>
                                </li>
                                <!-- End Level two -->
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= site_url('logout') ?>" class="nav-link text-danger">LOGOUT</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- /.navbar -->