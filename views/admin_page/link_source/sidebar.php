  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light"><?php echo $sidebar_title; ?>3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/admin_panel/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $email; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard & Links
                  <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('great_admin/uncustom'); ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UnCustom Links</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url('great_admin/customlink'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Custom Links</p>
                    </a>
                </li>
            </li>
          </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User Management
                  <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('great_admin/user_list'); ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                    </a>
                </li>
            </li>
          </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-id-badge"></i>
                <p>
                 Adds
                  <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('great_admin/ads'); ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Adds List</p>
                    </a>
                </li>
            </li>
          </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>