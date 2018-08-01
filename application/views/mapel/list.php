<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php if($this->session->flashdata('data_mapel_masuk'))
    {
    ?>
    <script>
        alert("Data Mata Pelajaran Telah Disimpan");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_mapel_ubah'))
    {
    ?>
    <script>
        alert("Data Mata Pelajaran Telah Diubah");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_mapel_hapus'))
    {
    ?>
    <script>
        alert("Data Komponen Nilai Telah Dihapus");
    </script>
        
    <?php
    }
    ?>
    
    <?php if($this->session->flashdata('data_komponen_masuk'))
    {
    ?>
    <script>
        alert("Data Komponen Nilai Telah Disimpan");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_komponen_change'))
    {
    ?>
    <script>
        alert("Data Komponen Nilai Telah Diubah");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_komponen_change_gagal'))
    {
    ?>
    <script>
        alert("Data Komponen Nilai Telah Gagal Diubah, Proporsi Lebih dari 100%");
    </script>
        
    <?php
    }
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Mata Pelajaran
            <div class="panel-tools">
                <?php echo anchor('mapel/add','<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',"title='Dambah Data'");?>
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE MAPEL</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th>NILAI MINIMUM A</th>
                        <th>NILAI MINIMUM B</th>
                        <th>NILAI MINIMUM C</th>
                        <th>NILAI MINIMUM D</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="<?php echo base_url();?>template/font-awesome/js/jquery.dataTables.js"> </script>
<script src="<?php echo base_url();?>template/font-awesome/js/dataTables.bootstrap.js"> </script>


  <script>
        $(document).ready(function() {
            var t = $('#mytable').DataTable( {
                "ajax": '<?php echo site_url('mapel/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "kd_mapel",
                        "width": "120px",
                        "sClass": "text-center"
                    },
                    { "data": "nama_mapel" },
                    { "data": "min_a" },
                    { "data": "min_b" },
                    { "data": "min_c" },
                    { "data": "min_d" },
                    { "data": "aksi","width": "100px" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>