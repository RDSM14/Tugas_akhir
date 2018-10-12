

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php $id_mapelnya = $this->uri->segment(3); ?>
    <?php echo anchor('mapel/add_komponen/'.$id_mapelnya,'Input Data  Komponen nilai Baru',array('class'=>'btn btn-success btn-sm'))?>
    <?php echo anchor('mapel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Komponen Nilai Pengetahuan
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
                </div>
            </div>
        
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>NAMA KOMPONEN NILAI</th><th >JENIS NILAI</th><th >PROPORSI</th><th style="width: 50px"></th>
                <?php
                $no=1;;
                $total= 0;
                foreach ($komponen_pengetahuan as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nama_komponen </td>
                        <td>$row->nama_jenis_nilai</td>
                        <td>$row->porsi %</td>
                        <td >".anchor('mapel/edit_komponen/'.$row->id_komponen,'<i class="fa fa-pencil" title="Edit Komponen"></i>')."                           ".anchor('mapel/hapus_komponen/'.$row->id_komponen,'<i class="fa fa-trash-o" title="Hapus Komponen"></i>')."                             </td>
                        </tr>";
                        $total += $row->porsi;
                    $no++;
                }
                    echo "Total Porsi : ".$total." %";
                ?>
                
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>



<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php $id_mapelnya = $this->uri->segment(3); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Komponen Nilai Keterampilan
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
                </div>
            </div>
        
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>NAMA KOMPONEN NILAI</th><th >JENIS NILAI</th><th >PROPORSI</th><th style="width: 50px"></th>
                <?php
                $no=1;;
                $jumlah = 0;
                foreach ($komponen_keterampilan as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nama_komponen </td>
                        <td>$row->nama_jenis_nilai</td>
                        <td>$row->porsi %</td>
                        <td >".anchor('mapel/edit_komponen/'.$row->id_komponen,'<i class="fa fa-pencil" title="Edit Komponen"></i>')."                           ".anchor('mapel/hapus_komponen/'.$row->id_komponen,'<i class="fa fa-trash-o" title="Hapus Komponen"></i>')."                             </td>
                        </tr>";
                        $jumlah += $row->porsi;
                    $no++;
                }
                    
                    echo "Total Porsi : ".$jumlah." %";
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php $id_mapelnya = $this->uri->segment(3); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Komponen Nilai Spiritual
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
                </div>
            </div>
        
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>NAMA KOMPONEN NILAI</th><th >JENIS NILAI</th><th >PROPORSI</th><th style="width: 50px"></th>
                <?php
                $no=1;;
                $jumlahs=0;
                foreach ($komponen_spiritual as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nama_komponen </td>
                        <td>$row->nama_jenis_nilai</td>
                        <td>$row->porsi %</td>
                        <td >".anchor('mapel/edit_komponen/'.$row->id_komponen,'<i class="fa fa-pencil" title="Edit Komponen"></i>')."                           ".anchor('mapel/hapus_komponen/'.$row->id_komponen,'<i class="fa fa-trash-o" title="Hapus Komponen"></i>')."                             </td>
                        </tr>";
                        $jumlahs += $row->porsi;
                    $no++;
                }
                    
                    echo "Total Porsi : ".$jumlahs." %";   
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php $id_mapelnya = $this->uri->segment(3); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Komponen Nilai Sosial
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-search"></i> </a>
                </div>
            </div>
        
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>NAMA KOMPONEN NILAI</th><th >JENIS NILAI</th><th >PROPORSI</th><th style="width: 50px"></th>
                <?php
                $no=1;;
                $jumlahss = 0;
                foreach ($komponen_sosial as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nama_komponen </td>
                        <td>$row->nama_jenis_nilai</td>
                        <td>$row->porsi %</td>
                        <td >".anchor('mapel/edit_komponen/'.$row->id_komponen,'<i class="fa fa-pencil" title="Edit Komponen"></i>')."                           ".anchor('mapel/hapus_komponen/'.$row->id_komponen,'<i class="fa fa-trash-o" title="Hapus Komponen"></i>')."                             </td>
                        </tr>";
                        
                        $jumlahss += $row->porsi;
                    $no++;
                }
                    
                    echo "Total Porsi : ".$jumlahss." %";
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>