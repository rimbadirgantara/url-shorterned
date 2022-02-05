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
              <?php echo form_open_multipart('great_admin/edit_ads/'.$data_owner['id']); ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="owner">Title ad</label>
                      <input type="text" class="form-control" id="owner" name="owner" value="<?= $data_owner['owner_ad']; ?>">
                      <?= form_error('owner', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="title_ad">Title ad</label>
                      <input type="text" class="form-control" id="title_ad" name="title_ad" value="<?= $data_owner['title_ad']; ?>">
                      <?= form_error('title_ad', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" name="description" value="<?= $data_owner['decsription']; ?>">
                      <?= form_error('description', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select class="custom-select" id="status" name="status">
                        <?php if ($data_owner['status'] == 'Active'){ ?>
                          <option>Active</option>
                          <option>Un Active</option>
                        <?php } else { ?>
                          <option>Un Active</option>
                          <option>Active</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="picture_ads">Picture</label>
                      <input type="file" class="form-control" id="picture_ads" name="picture_ads">
                      <?= form_error('picture_ads', '<p style="color: red;">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="time_session">Time Sessions</label>
                      <select class="custom-select" id="time_session" name="time_session">
                        <?php if ($data_owner['time_session'] == '1 Week') { ?>
                          <option>1 Week</option>
                          <option>1 Month</option>
                          <option>3 Month</option>
                        <?php } elseif ($data_owner['time_session'] == '1 Month') { ?>
                          <option>1 Month</option>
                          <option>1 Week</option>
                          <option>3 Month</option>
                        <?php } elseif ($data_owner['time_session'] == '3 Month') { ?>
                          <option>3 Month</option>
                          <option>1 Week</option>
                          <option>1 Month</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                  </div>
              <?php echo form_close(); ?>
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