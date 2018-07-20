<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
   <?php if($this->session->flashdata('data_tu_masuk'))
    {
    ?>
    <script>
        alert("Data tu Telah Disimpan");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_tu_change'))
    {
    ?>
    <script>
        alert("Data tu Telah Diubah");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_tu_hapus'))
    {
    ?>
    <script>
        alert("Data tu Telah Dihapus");
    </script>
      <?php   
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Karyawan Tata Usaha
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <?php echo anchor('tu/add','<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',"title='Dambah Data'");?>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>TELEPON</th>
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
                "ajax": '<?php echo site_url('tu/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "nip",
                        "width": "120px",
                        "sClass": "text-left"
                    },
                    { "data": "nama_lengkap" },
                    { "data": "telepon_TU","width": "90px", },
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