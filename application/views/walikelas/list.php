 <?php if($this->session->flashdata('data_wali_ubah'))
    {
    ?>
    <script>
        alert("Wali Kelas Telah Di-ubah");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_wali_masuk'))
    {
    ?>
    <script>
        alert("Wali Kelas Telah Di-Set");
    </script>
        
    <?php
    }
    ?>
<div class="col-md-12">
    <table class="table table-bordered">
        <tr><td width='200'>TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik') ?></td></tr>
        <tr><td>SEMESTER</td><td> : <?php echo get_tahun_akademik_aktif('semester_aktif') ?></td></tr>
    </table>
</div>

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Dynamic Table
            <div class="panel-tools">
                <?php echo anchor('walikelas/add', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', "title='Tambah Data'"); ?>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ROMBEL</th>
                        <th>KELAS</th>
                        <th>NAMA WALIKELAS</th>
                        <th>TAHUN AKADEMIK</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="<?php echo base_url();?>template/font-awesome/js/jquery.dataTables.js"> </script>
<script src="<?php echo base_url();?>template/font-awesome/js/dataTables.bootstrap.js"> </script>

<script type="text/javascript">
    function updateDataWalikelas(id_walikelas){
        var guru = $("#guru"+id_walikelas).val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/walikelas/updateWalikelas',
            data:'id_walikelas='+id_walikelas+'&username='+guru,
            success:function(html){
                //console.log( id_walikelas );
                //$("#showRombel").html(html);
                //loadPelajaran();
            }
        })
    }

</script>

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "ajax": '<?php echo site_url('walikelas/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
                {
                    "data": null,
                    "width": "50px",
                    "sClass": "text-center",
                    "orderable": false,
                },
                { "data": "nama_rombel" },
                { "data": "kelas" },
                { "data": "nama_guru" },
                { "data": "tahun_akademik" },
                    
            ]
        } );
               
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>