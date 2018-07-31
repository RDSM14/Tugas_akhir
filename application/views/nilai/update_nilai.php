<div class="col-md-12">
    <table class="table table-bordered">
        <tr><td width="200">NISN</td><td>  <?php echo $this->uri->segment(3);?></td></tr>
        <tr><td>NAMA</td><td>   <?php echo $this->uri->segment(6); ?></td></tr>
        <tr><td>MATA PELAJARAN</td><td><?php foreach ($mapel as $mapell){ echo $mapell->nama_mapel; }?></td></tr>
    </table>
    <!-- start: DYNAMIC TABLE PANEL -->
     <?php
                echo form_open_multipart('nilai/masuk', 'role="form" class="form-horizontal"');
                ?>
      <input type="hidden" name="id_jadwal" value="<?php echo  $this->uri->segment(5) ; ?>">
      <input type="hidden" name="nisn" value="<?php echo $this->uri->segment(3) ; ?>">
      <input type="hidden" name="id_mapel" value="<?php echo $this->uri->segment(4) ; ?>">
    <table class="table table-bordered">
          <?php
        foreach($komponen_nilai as $komponen){
        //foreach ($nilai as $value){
            ?>
        
        <tr>
            <td width="200px">
                 <?php  echo $komponen->nama_komponen ; ?>
                <input type="hidden" name="id_komponen[]" value="<?php  echo $komponen->id_komponen ; ?>">
                
            </td>
            <td width="200px">
                <input type="text" name="nilai[]"   
                            name="nama" 
                            placeholder="Masukan nilai <?php  echo $komponen->nama_komponen ; ?>" id="form-field-1" class="form-control">
            </td>
        </tr>
                        
<?php }  // } ?>
        
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
        <input type="submit"  value="Submit" >
        <input type="button" value="Kembali" onclick="history.back(-1)" >
             </form>
</div>


 
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
   