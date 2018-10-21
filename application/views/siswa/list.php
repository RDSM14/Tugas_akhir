    <?php if($this->session->flashdata('data_siswa_masuk'))
    {
    ?>
    <script>
        alert("Data Siswa Telah Disimpan");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_siswa_change'))
    {
    ?>
    <script>
        alert("Data Siswa Telah Diubah");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_siswa_hapus'))
    {
    ?>
    <script>
        alert("Data Siswa Telah Dihapus");
    </script>
        
    <?php
    }
    ?>
<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
   <?php echo anchor('siswa/add','Input Data Baru',array('class'=>'btn btn-danger btn-sm'))?>
   <!-- Trigger the modal with a button 
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Import Data Excel Dari Dapodik</button>
-->
    <div style="margin-bottom: 10px;"></div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Siswa
            <div class="panel-tools">                
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <?php echo anchor('siswa/add','<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',"title='Tambah Data'");?>
                
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NISN</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>ALAMAT</th>
                        <th>TELEPON</th>
                        <th>ROMBEL / KELAS</th>
                        <th>AGAMA</th>
                        <th>NAMA AYAH</th>
                        <th>NAMA IBU</th>
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
                "ajax": '<?php echo site_url('siswa/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "nisn",
                        "width": "80px",
                        "sClass": "text-center"
                    },
                    { "data": "nim",
                      "width": "80px",
                      "sClass": "text-center" },
                    { "data": "nama"  },
                    { "data": "tempat_lahir"  },
                    { "data": "tanggal_lahir"  },
                    { "data": "alamat_siswa"  },
                    { "data": "telepon_siswa"  },
                    { "data": "nama_rombel"  },
                    { "data": "nama_agama"  },
                    { "data": "nama_ayah"  },
                    { "data": "nama_ibu"  },
                    //{ "data": "tbl_rombel.nama_rombel", "width": "150px" },
                    { "data": "aksi","width": "100px","sClass": "text-center" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Upload</h4>
      </div>
      <div class="modal-body">
          <p>Silahkan pilih file excel hasil export data siswa dari aplikasi dapodik.</p>
          <table class="table table-bordered">
              <tr><td width="100">Pilih File</td><td><input type="file" name="file"></td></tr>
          </table>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-sm">Upload Data</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>