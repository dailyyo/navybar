    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Basic</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Edit User</strong>
                    </div>
                    <div class="card-body">
                      <!-- Credit Card -->
                      <div id="pay-invoice">
                          <div class="card-body">
                              <?php
                               echo validation_errors('<div class="alert alert-danger">', '</div>');
                               echo form_open(base_url('admin/user/edit/'.$user->id_user)); ?>
                                  <div class="row">
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="nama" class="control-label mb-1">Nama</label>
                                              <input id="nama" name="nama" type="text" class="form-control" value="<?php echo $user->nama; ?>">
                                          </div>
                                      </div>
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="username" class="control-label mb-1">Username</label>
                                              <input id="username" name="username" type="text" class="form-control" value="<?php echo $user->username; ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <input id="email" name="email" type="text" class="form-control" value="<?php echo $user->email; ?>">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="password" class="control-label mb-1">Password</label>
                                              <input id="password" name="password" type="password" class="form-control" <?php echo set_value('password') ?>>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="akses_level" class="control-label mb-1">Akses Level</label>
                                        <select name="akses_level" id="akses_level" class="form-control">
                                          <option value="Manager" <?php if($user->akses_level=="Manager"){ echo "selected";} ?>>Manager</option>
                                          <option value="Karyawan" <?php if($user->akses_level=="Karyawan"){ echo "selected";} ?>>Karyawan</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="keterangan" class="control-label mb-1">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" rows="9" placeholder="Keterangan..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                  </div>
                                  <div>
                                    <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-dot-circle-o"></i>&nbsp;Update</button>
                                    <button type="reset" class="btn btn-danger btn-md"><i class="fa fa-ban"></i>&nbsp;Reset</button>
                                          <!-- <input type="reset" class="btn btn-danger btn-md" name="reset" value="  Reset  "> -->
                                  </div>
                              </form>
                          </div>
                      </div>
                      <?php echo form_close(); ?>

                    </div>
                </div> <!-- .card -->
              </div><!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php form_close() ?>

<script src="<?php echo base_url() ?>/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>/assets/js/main.js"></script>


</body>
</html>
