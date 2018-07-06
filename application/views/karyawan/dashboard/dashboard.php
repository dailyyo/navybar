    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Karyawan Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="col-sm-12">
          <?php
                        if ($this->session->flashdata('notifikasi')) {
                            echo "<div class='alert alert-warning'><center>";
                            echo $this->session->flashdata('notifikasi');
                            echo "</center></div>";
                        }
                     ?>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="<?php echo base_url() ?>/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>/assets/js/main.js"></script>


<script src="<?php echo base_url() ?>/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="<?php echo base_url() ?>/assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>/assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>/assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="<?php echo base_url() ?>/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

</body>
</html>
