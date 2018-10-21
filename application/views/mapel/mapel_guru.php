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
            <i class="fa fa-external-link-square"></i> Data Mata Pelajaran Guru
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE MAPEL</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th> A+</th>
                        <th> A</th>
                        <th> A-</th>
                        <th> B+</th>
                        <th> B</th>
                        <th> B-</th>
                        <th> C+</th>
                        <th> C</th>
                        <th> C-</th>
                        <th> D+</th>
                        <th> D</th>
                        <th> D-</th>
                        <th></th>
                    </tr>
                    <?php
                $no=1;
                foreach ($mapel->result() as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->kd_mapel</td>
                        <td>$row->nama_mapel</td>
                        <td>$row->min_aplus</td>
                        <td>$row->min_a</td>
                        <td>$row->min_amin</td>
                        <td>$row->min_bplus</td>
                        <td>$row->min_b</td>
                        <td>$row->min_bmin</td>
                        <td>$row->min_cplus</td>
                        <td>$row->min_c</td>
                        <td>$row->min_cmin</td>
                        <td>$row->min_dplus</td>
                        <td>$row->min_d</td>
                        <td>$row->min_dmin</td>
                        <td>".anchor('mapel/edit/'.$row->id_mapel,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit" title="Edit Mata Pelajaran"').' 
                        '.anchor('mapel/list_komponen/'.$row->id_mapel,'<i class="fa fa-navicon"></i>','class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="List" title="Detail Komponen Nilai"');"</td>
                        </tr>";
                    $no++;
                }
                ?>
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
                    { "data": "min_aplus" },
                    { "data": "min_a" },
                    { "data": "min_amin" },
                    { "data": "min_bplus" },
                    { "data": "min_b" },
                    { "data": "min_bmin" },
                    { "data": "min_cplus" },
                    { "data": "min_c" },
                    { "data": "min_cmin" },
                    { "data": "min_dplus" },
                    { "data": "min_d" },
                    { "data": "min_dmin" },
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