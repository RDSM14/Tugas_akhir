

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php $id_mapelnya = $this->uri->segment(3); ?>
    <?php echo anchor('mapel/add_komponen/'.$id_mapelnya,'Input Data  Komponen nilai Baru',array('class'=>'btn btn-success btn-sm'))?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Komponen Nilai
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
                </div>
            </div>
        
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>KOMPONEN NILAI</th><th >JENIS NILAI</th><th style="width: 50px"></th>
                <?php
                $no=1;;
                foreach ($komponen as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nama_komponen </td>
                        <td>$row->nama_jenis_nilai</td>
                        <td >".anchor('mapel/edit_komponen/'.$row->id_komponen,'<i class="fa fa-pencil" title="Edit Komponen"></i>')."                           ".anchor('mapel/hapus_komponen/'.$row->id_komponen,'<i class="fa fa-trash-o" title="Hapus Komponen"></i>')."                             </td>
                        </tr>";
                        
                    $no++;
                }
                ?>
            </table>
            <div class="col-sm-3">
                    <?php echo anchor('mapel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
         </div>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
