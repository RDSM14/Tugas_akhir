<div class="col-md-12">
    <table class="table table-bordered">
        <tr><td>NAMA</td><td><?php foreach ($siswa as $murid){echo $murid->nama; }?></td></tr>
        <tr><td>MATA PELAJARAN</td><td><?php foreach ($mapel as $mapell){ echo $mapell->nama_mapel; }?></td></tr>
    </table>
    <!-- start: DYNAMIC TABLE PANEL -->
        
        <h2>Nilai :</h2>
        <table class="table table-bordered">
              <?php
            //foreach($komponen_nilai as $komponen){
            foreach ($nilai as $value){
                ?>

            <tr>
                <td width="200px">
                     <?php  echo $value->nama_komponen." ( ".$value->porsi."%)" ; ?>
                </td>
                <td width="200px">
                    <?php  echo $value->skor ; ?>
                </td>
            </tr>

            <?php } ?>
        </table>
      
        <h2>Deskripsi Nilai :</h2>
        <table class="table table-bordered">
        
        <?php foreach ($deskripsi as $deskrip){  // } ?>
   
            <td width="200px">
                 Deskripsi Spiritual
            </td>
            <td width="200px">
                <?php  if($deskrip->deskripsi_spiritual == '')
                        {
                                echo "-";
                        }
                        else
                        {
                                echo $deskrip->deskripsi_spiritual;
                        }
                 ?>
            </td>
        </tr>
        <tr>
            <td width="200px">
                 Deskripsi Sosial
            </td>
            <td width="200px">
                <?php  if($deskrip->deskripsi_sosial== '')
                        {
                                echo "-";
                        }
                        else
                        {
                                echo $deskrip->deskripsi_sosial;
                        }
                 ?>
            </td>
        </tr>
         </tr><tr>
            <td width="200px">
                 Deskripsi Pengetahuan
            </td>
            <td width="200px">
                <?php  if($deskrip->deskripsi_pengetahuan == '')
                        {
                                echo "-";
                        }
                        else
                        {
                                echo $deskrip->deskripsi_pengetahuan;
                        }
                 ?>
            </td>
        </tr>
        <tr>
            <td width="200px">
                 Deskripsi Keterampilan
            </td>
            <td width="200px">
                <?php  if($deskrip->deskripsi_keterampilan == '')
                        {
                                echo "-";
                        }
                        else
                        {
                                echo $deskrip->deskripsi_keterampilan;
                        }
                 ?>
            </td>
        </tr>
       <?php } ?>
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
        
        <input type="button" value="Kembali" onclick="history.back(-1)" />
     
</div>


 <style> 
input[type=button], input[type=submit], input[type=reset]  {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
    <?php //echo $value->skor ?>
   
      
   