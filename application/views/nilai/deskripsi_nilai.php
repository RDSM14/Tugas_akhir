<div class="col-md-12">
    <table class="table table-bordered">
        <tr><td width="200">NISN</td><td>  <?php echo $this->uri->segment(3);?></td></tr>
        <tr><td>NAMA</td><td><?php echo $this->uri->segment(6); ?></td></tr>
        <tr><td>MATA PELAJARAN</td><td><?php foreach ($mapel as $mapell){ echo $mapell->nama_mapel; }?></td></tr>
    </table>
    <!-- start: DYNAMIC TABLE PANEL -->
    <?php
        echo form_open_multipart('nilai/deskripsi', 'role="form" class="form-horizontal"');
    ?>
        <h2>Deskripsi Nilai :</h2>
        <table class="table table-bordered">
            <input type="hidden" name="id_mapel" value="<?php echo  $this->uri->segment(4); ?>">
        <?php foreach ($deskripsi as $deskripsii){ 
            if ($deskripsii->id_deskripsi == ''){
                echo "REWEQ";
            }?>
            <input type="hidden" name="id_deskripsi" value="<?php echo  $deskripsii->id_deskripsi; ?>">
            <input type="hidden" name="nisn" value="<?php echo  $this->uri->segment(3); ?>">
            <td width="200px">
                 Deskripsi Spiritual
            </td>
            <td width="200px">
                
                <textarea name="deskripsi_spiritual" id="deskripsi_spiritual" class="form-control" ><?php echo $deskripsii->deskripsi_spiritual ?>                         
                </textarea>
                
            </td>
        </tr>
        <tr>
            <td width="200px">
                 Deskripsi Sosial
            </td>
            <td width="200px">
               
                <textarea name="deskripsi_sosial" id="deskripsi_sosial" class="form-control" ><?php echo $deskripsii->deskripsi_sosial ?>                         
                </textarea>
                
            </td>
        </tr>
         </tr><tr>
            <td width="200px">
                 Deskripsi Pengetahuan
            </td>
            <td width="200px">
                
                <textarea name="deskripsi_pengetahuan" id="deskripsi_pengetahuan" class="form-control" ><?php echo $deskripsii->deskripsi_pengetahuan ?>                         
                </textarea>
                
            </td>
        </tr>
        <tr>
            <td width="200px">
                 Deskripsi Keterampilan
            </td>
            <td width="200px">
                
                <textarea name="deskripsi_keterampilan" id="deskripsi_keterampilan" class="form-control" ><?php echo $deskripsii->deskripsi_keterampilan ?>                         
                </textarea>
                
            </td>
        </tr>
       <?php } ?>
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
        <input type="submit"  value="Submit" >
        <input type="button" value="Kembali" onclick="history.back(-1)" >
             </form>



 
    <?php //echo $value->skor ?>
   
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
   