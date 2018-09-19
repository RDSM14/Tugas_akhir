<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
   <?php if($this->session->flashdata('data_rombel_masuk'))
    {
    ?>
    <script>
        alert("Data Rombongan Belajar Telah Disimpan");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_rombel_change'))
    {
    ?>
    <script>
        alert("Data Rombongan Belajar Telah Diubah");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_rombel_hapus'))
    {
    ?>
    <script>
        alert("Data Rombongan Belajar Telah Dihapus");
    </script>
        
    <?php
    }
    ?>
    <?php echo anchor('rombel/add','Input Data Baru',array('class'=>'btn btn-danger btn-sm'))?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Kelas / Rombongan Belajar
            <div class="panel-tools">
                <?php echo anchor('rombel/add','<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',"title='Tambah Data'");?>
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA ROMBEL</th>
                        <th>KELAS</th>
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
                "ajax": '<?php echo site_url('rombel/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    { "data": "nama_rombel" },
                    { "data": "kelas","width": "60px","sClass": "text-center" },
                    { "data": "aksi","width": "90px" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>