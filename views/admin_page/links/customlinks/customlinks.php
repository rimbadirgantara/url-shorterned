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
                <a type="button" class="btn btn-primary" href="<?php echo base_url('great_admin/custom_add_links') ?>">
                  Add Custom Links
                </a>
                <!-- seaching -->
                <div class="card-tools">
                  <form action="<?= base_url('great_admin/custom_search'); ?>" method="post">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="keyword" class="form-control float-right" placeholder="Search" autofocus="" autocomplete="off">
                      <div class="input-group-append">
                        <input type="submit" name="submit" class="btn btn-default"></input>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- end of searching -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Link</th>
                      <th>Short Link</th>
                      <th>Status</th>
                      <th>Package</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($custom_link as $ul) : ?>
                      <tr>
                        <td>183</td>
                        <td><?php echo $ul['nama']; ?><br>
                          <span class="badge bg-success"><?php echo date('d/m/Y',$ul['waktu']); ?></span> <span class="badge bg-success"><?php echo date('d:m',$ul['waktu']); ?></span></td>
                        <td><?php echo $ul['link']; ?></td>
                        <td><?php echo $_SERVER['SERVER_NAME']."/short/a/z/".$ul['short_link'] ?></td>
                        <td><?php echo $ul['status']; ?></td>
                        <td><?php echo $ul['pkg']; ?></td>
                        <td>
                          <a type="button" href="<?php echo site_url('great_admin/custom_edit_links/').$ul['id']; ?>" class="btn btn-warning btn-default btn-flat"><i class="fa fa-paint-brush"></i></a>
                          
                          <a type="button" href="<?php echo site_url('great_admin/uncustom_delete_links/').$ul['id']; ?>" class="btn btn-danger btn-default btn-flat"><i class="fa fa-trash"></i></a>

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
