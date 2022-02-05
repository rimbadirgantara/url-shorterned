  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $this->uri->segment(2).' Page'; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $this->uri->segment(1); ?></a></li>
              <li class="breadcrumb-item active"><?php echo $this->uri->segment(2); ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo'Draf of '.$this->uri->segment(2); ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a type="button" class="btn btn-primary" href="<?php echo base_url('great_admin/add_user') ?>">
                  Add User 
                </a>
                <div class="card-tools">
                  <!-- searching -->
                    <form action="<?= base_url('great_admin/user_list_search'); ?>" method="post"> 
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="keyword" id="keyword" class="form-control float-right" placeholder="Search" autocomplete="off" autofocus="">
                        <div class="input-group-append">
                          <input type="submit" name="submit" class="btn btn-default">
                        </div>
                      </div>
                    </form>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Email</th>
                      <th>Link</th>
                      <th>Level</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($user_list as $ul) : ?>
                      <tr>
                        <td>183</td>
                        <td><?php echo $ul['email']; ?><br>
                          <span class="badge bg-success"><?php echo date('d/m/Y',$ul['time']); ?></span> <span class="badge bg-success"><?php echo date('d:m',$ul['time']); ?></span></td>
                        <td><?php echo $ul['custom']; ?></td>
                        <td><?php echo $ul['level']; ?></td>
                        <td><?php echo $ul['status']; ?></td>
                        <td>
                          <a type="button" href="<?php echo site_url('great_admin/user_edit/').$ul['id']; ?>" class="btn btn-warning btn-default btn-flat"><i class="fa fa-paint-brush"></i></a>
                          
                          <a type="button" href="<?php echo site_url('great_admin/user_delete/').$ul['id']; ?>" class="btn btn-danger btn-default btn-flat"><i class="fa fa-trash"></i></a>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <p>Rimba Dirgantara <?= date('Y'); ?> @ All rights reserved</p>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
