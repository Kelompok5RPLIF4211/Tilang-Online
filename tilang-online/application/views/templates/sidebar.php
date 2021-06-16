        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php
            if ($user['type'] == 1 ) {
                ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?= base_url('admin'); ?>>
                    <div class="sidebar-brand-icon rotate-n-15">
                        <!--                     <i class="fas fa-code"></i> -->
                    </div>
                    <div class="sidebar-brand-text mx-3">Tilang Online </div>
                </a>
                <?php
            } else if ($user['type'] == 2 ) {
                ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?= base_url('Police/police'); ?>>
                    <div class="sidebar-brand-icon rotate-n-15">
                        <!--                     <i class="fas fa-code"></i> -->
                    </div>
                    <div class="sidebar-brand-text mx-3">Tilang Online </div>
                </a>
                <?php
            } else if ($user['type'] == 3 ) {
                ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?= base_url('User/user'); ?>>
                    <div class="sidebar-brand-icon rotate-n-15">
                        <!--                     <i class="fas fa-code"></i> -->
                    </div>
                    <div class="sidebar-brand-text mx-3">Tilang Online </div>
                </a>
            <? } ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php
            if ($user['type'] == 1 ) {
                ?>
                <li class="nav-item">

                    <a class="nav-link" href="<?= base_url('admin'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/profile'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pelanggar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/police'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Polisi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/transaction'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/rule'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Undang-undang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/tutorial'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Cara bayar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/faq'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Tanya Jawab</span>
                    </a>
                </li>
                <?php
            } if ($user['type'] == 2 ) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Police/DataPolice'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Police/profile'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pelanggar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Police/ticket'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Tilang</span>
                    </a>
                </li>
                <?php
            } if ($user['type'] == 3 ) {
                ?>
                <!-- apa nih woi -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('User/user'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pelanggar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('User/rule'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Undang-undang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('User/tutorial'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Cara bayar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('User/faq'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Tanya Jawab</span>
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
