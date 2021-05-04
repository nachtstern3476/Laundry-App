<input type="checkbox" id="sidebar-toggle">
<div class="sidebar">
    <div class="sidebar-main">
        <div class="sidebar-user">
            <h4><?= session()->role == 'admin'? 'Administrator' :ucfirst(session()->role) ?></h4><hr>
            <p><?= session()->nama ?></p>
        </div>
        <nav class="sidebar-menu">
            <?php if (session()->role == 'admin') :?>
                <div class="menu-head">
                    Dashboard
                </div>
                <ul>
                    <li>
                        <a href="<?= route_to('dashboard') ?>"><i class="fas fa-database"></i>Dashboard</a>
                    </li>
                </ul>
                <div class="menu-head">
                    Master
                </div>
                <ul>
                    <li>
                        <a href="<?= route_to('user') ?>"><i class="fas fa-user-alt"></i>User</a>
                    </li>
                    <li>
                        <a href="<?= route_to('outlet') ?>"><i class="fas fa-home"></i>Outlet</a>
                    </li>
                </ul>
            <?php endif ?>
                
            <div class="menu-head">
                Services
            </div>
            <ul>
                <?php if (session()->role == 'kasir' || session()->role == 'admin') : ?>
                <li>
                    <a href="<?= route_to('transaksi') ?>"><i class="fas fa-money-check-alt"></i>Transaksi</a>
                </li>
                <li>
                    <a href="<?= route_to('member') ?>"><i class="fas fa-users"></i>Member</a>
                </li>
                <?php endif ?>
                <?php if (session()->role == 'owner' || session()->role == 'admin'): ?>
                    <li>
                        <a href="<?= route_to('diskon') ?>"><i class="fas fa-tags"></i>Diskon</a>
                    </li>
                    <li>
                        <a href="<?= route_to('paket') ?>"><i class="fas fa-archive"></i>Paket</a>
                    </li>
                    <li>
                        <a href="<?= route_to('jenis') ?>"><i class="fas fa-archive"></i>Jenis Paket</a>
                    </li>
                <?php endif ?>
            </ul>
            <div class="menu-head">
                Laporan
            </div>
            <ul>
                <li>
                    <a href="<?= route_to('laporan') ?>"><i class="fas fa-scroll"></i>Laporan</a>
                </li>
            </ul>
            <div class="menu-head">
                Keluar
            </div>
            <ul>
                <li>
                    <a href="<?= route_to('logout') ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                </li>
            </ul>
        </nav>
    </div>
</div>