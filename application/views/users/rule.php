<div class="col-md-4">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> LEVEL USER
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <tr><td>Pilih Level</td><td><select class="form-control" name="level_user" id="level_user" onchange='loadData()'>
                    <option value="3">Tata Usaha</option>
                    <option value="5">Wali Kelas</option>
                    <option value="4">Guru</option>
                    <option value="6">Siswa</option>
                    <option value="7">Orang Tua</option>
                  
                </select></td></tr>
            </table>
        </div>

    </div>
    <!-- end: DYNAMIC TABLE PANEL -->

</div>


<div class="col-md-8">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> HAK AKSES MODULE
        </div>
        <div class="panel-body">
            <div id="tabel"></div>

        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<script type="text/javascript">
    $(document ).ready(function() {
        loadData();
    });
</script>

<script type="text/javascript">
    function loadData(){
        var level_user = $("#level_user").val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/users/modul',
            data:'level_user='+level_user,
            success:function(html){
                $("#tabel").html(html);
            }
        })
    }
    
    function addRule(id_modul){
        var level_user = $("#level_user").val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/users/addrule',
            data:'level_user='+level_user+'&id_menu='+id_modul,
            success:function(html){
                //$("#tabel").html(html);
                //loadData();
                alert('sukses memberikan akses');
            }
        })
    }
</script>

