
<?php if($this->session->flashdata('data_gak_sama'))
    {
    ?>
    <script>
        alert("Password tidak Cocok");
    </script>
        
    <?php
    }
    ?>
<?php if($this->session->flashdata('benar'))
    {
    ?>
    <script>
        alert("Password telah diubah");
    </script>
        
    <?php
    }
    ?>
<?php if($this->session->flashdata('data_gak_sama'))
    {
    ?>
    <script>
        alert("Password Lama Salah");
    </script>
        
    <?php
    }
    ?>
<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            UBAH PASSWORD
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open('auth/agreed', 'role="form" class="form-horizontal"');
            ?>
            <input type="hidden" name="username" value = "<?php echo $this->uri->segment(3);?>"id="form-field-1" class="form-control">
            <input type="hidden" name="level_user" value = "<?php echo $this->uri->segment(4);?>"id="form-field-1" class="form-control">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MASUKKAN PASSWORD LAMA ANDA
                </label>
                <div class="col-sm-9">
                    <input type="text" name="password_lama" placeholder="MASUKAN PASSWORD LAMA ANDA" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MASUKKAN PASSWORD YANG INGIN DIGUNAKAN
                </label>
                <div class="col-sm-9">
                    <input type="text" name="password_baru" placeholder="MASUKAN PASSWORD BARU ANDA" id="form-field-1" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MASUKKAN ULANG PASSWORD YANG INGIN DIGUNAKAN
                </label>
                <div class="col-sm-9">
                    <input type="text" name="cek_password" placeholder="MASUKAN ULANG PASSWORD BARU ANDA" id="form-field-1" class="form-control">
                </div>
            </div>

            
            <div class="form-group">
                <div class="col-sm-5">
                    <input type="submit"  value="Submit" >
                    <input type="button" value="Kembali" onclick="history.back(-1)" >
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
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