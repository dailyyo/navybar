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
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama</th>
                                  <th>Email</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($user as $user): ?>
                                    <tr>
                                    <td><center><?php echo $no; ?></center></td>
                                    <td><?php echo $user->nama; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    </tr>
                                  <?php $no++;
                                  endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>


    <script src="<?php echo base_url() ?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
