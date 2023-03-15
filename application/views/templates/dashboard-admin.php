<!DOCTYPE html>
<html>

<head>
  <?php $this->view('templates/dist/header'); ?>
</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open text-sm">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url($this->session->userdata('foto_user') != '' && file_exists(FCPATH . 'uploads/users/' . $this->session->userdata('foto_user')) ? 'uploads/users/' . rawurlencode($this->session->userdata('foto_user')) : 'dist/img/user.png') ?>" class="user-image" alt="User Image" />
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-success">
              <img src="<?= base_url($this->session->userdata('foto_user') != '' && file_exists(FCPATH . 'uploads/users/' . $this->session->userdata('foto_user')) ? 'uploads/users/' . rawurlencode($this->session->userdata('foto_user')) : 'dist/img/user.png') ?>" class="img-circle elevation-2" alt="User Image" />

              <p>
                <?= $this->session->userdata('nm_user'); ?>
                <small>Admin</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-12 btn-group btn-block">
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#update-photo">Ubah Foto</button>
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#update-password">Ubah Password</button>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat float-right">Log-Out</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-success elevation-4 sidebar-no-expand">
      <!-- Brand Logo -->
      <a href="<?= base_url('admin'); ?>" class="brand-link bg-light">
        <img src="<?= base_url('dist/img/logo.png'); ?>" alt="Logo" class="brand-image" style="opacity: 0.8;" />
        <span class="brand-text">Universitas Ibnu Sina</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-2 mb-3 d-flex">
          <div class="image d-flex align-items-center">
            <img src="<?= base_url($this->session->userdata('foto_user') != '' && file_exists(FCPATH . 'uploads/users/' . $this->session->userdata('foto_user')) ? 'uploads/users/' . rawurlencode($this->session->userdata('foto_user')) : 'dist/img/user.png') ?>" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <span style="font-size: 16px;"><?= $this->session->userdata('nm_user'); ?></span>
              <br>
              <small>Admin</small>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

            <?= sidebar($set['sidebar'], $set['active-sidebar']); ?>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $set['content']; ?></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <?php
                if (isset($set['breadcrumb'])) {
                  foreach ($set['breadcrumb'] as $key => $value) {
                    if ($value != '#' && $value != "active") {
                      echo "<li class=\"breadcrumb-item\"><a href=\"$value\">$key</a></li>";
                    } else if ($value == "active") {
                      echo "<li class=\"breadcrumb-item active\">$key</li>";
                    } else {
                      echo "<li class=\"breadcrumb-item\">$key</li>";
                    }
                  }
                }
                ?>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php if ($this->session->flashdata('alert')) {
        $xalert = $this->session->flashdata('alert'); ?>
        <div class="alert <?= 'alert-' . $xalert[0] ?> alert-dismissible mx-3">
          <h5><i class="<?= $xalert[1] ?>"></i> <?= $xalert[2] ?></h5><?= $xalert[3] ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <?php } ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?= $content; ?>
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="update-password">
      <form method="POST" action="<?= base_url('admin'); ?>" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group" style="border-bottom: 1px solid #e9ecef;">
              <div class="input-group">
                <div class="row w-100 ml-0 mr-0">
                  <div class="col-md-12 mb-3">
                    <label class="float-right" for="old_pass">Password Lama</label>
                    <input type="password" name="old_pass" class="form-control" id="old_pass" placeholder="Password Lama">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group m-0" style="border-bottom: 1px solid #e9ecef;">
              <div class="input-group">
                <div class="row w-100 ml-0 mr-0">
                  <div class="col-md-6 mb-3">
                    <label class="float-right" for="new_pass1">Password Baru</label>
                    <input type="password" name="new_pass1" class="form-control" id="new_pass1" placeholder="Password Baru">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="float-right" for="new_pass2">Konfirmasi Password</label>
                    <input type="password" name="new_pass2" class="form-control" id="new_pass2" placeholder="Konfirmasi Password">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row w-100 ml-0 mr-0">
              <div class="col-md-12">
                <input type="submit" name="u-password" class="btn btn-outline-success btn-block" value="Simpan">
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="update-photo">
      <form method="POST" action="<?= base_url('admin'); ?>" class="modal-dialog" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Foto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="foto_user" class="custom-file-input" id="foto_user">
                <label class="custom-file-label" for="foto_user">Choose file</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row w-100 ml-0 mr-0">
              <div class="col-md-12">
                <input type="submit" name="u-foto" class="btn btn-outline-success btn-block" value="Simpan">
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <footer class="main-footer bg-light">
      <?php $this->view('templates/dist/footer'); ?>
    </footer>
  </div>
  <!-- ./wrapper -->

  <?php $this->view('templates/dist/script'); ?>
</body>

</html>