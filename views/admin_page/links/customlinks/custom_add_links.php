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
          <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <?php form_open('great_admin/custom_add_links'); ?>
                <form action="" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama">Name</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                      <?= form_error('nama', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="link_direction">Link Direction</label>
                      <input type="text" class="form-control" id="link_direction" name="link_direction">
                      <?= form_error('link_direction', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="link_short">Short Link</label>
                      <input type="text" class="form-control" id="link_short" name="link_short" >
                      <?= form_error('link_short', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="pkg">Package Trial</label>
                      <select class="custom-select" id="pkg" name="pkg">
                        <option>1 Week</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                  </div>
              <?php form_close(); ?>
              </form>
            </div>
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