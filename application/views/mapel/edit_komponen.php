<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">Edit Data Komponen Nilai
        </div>
        <div class="panel-body">
            <?php foreach ($nilai_edit_komponen as $nilai_edit_komponen)
            {
                $id_komponen = $nilai_edit_komponen->id_komponen;
                $nama_komponen = $nilai_edit_komponen->nama_komponen;
                $id_jenis_nilai = $nilai_edit_komponen->id_jenis_nilai;
                $porsi = $nilai_edit_komponen->porsi;
                $id_mapel = $nilai_edit_komponen->id_mapel;
            }
            ?>
            <form class="form-horizontal">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="nama_komponen">
                        Nama Komponen
                    </label>
                    <div class="col-sm-9">
                        <input type="hidden" name="id_komponen" value="<?php echo $id_komponen ?>" readonly="" placeholder="MASUKAN NIM" id="id_komponen" class="form-control">
                        <input type="hidden" name="id_mapel" value="<?php echo $id_mapel ?>" readonly="" placeholder="MASUKAN NIM" id="id_mapel" class="form-control">
                        <input type="text" name="nama_komponen"  value="<?php echo $nama_komponen ?>" placeholder="MASUKAN NAMA KOMPONEN" id="nama_komponen" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="jenis_nilai">
                        Jenis Nilai
                    </label>
                    <div class="col-sm-2">
                        <select class="form-control" name="jenis_nilai" id="jenis_nilai">
                            <?php foreach($jenis_nilai as $jenis_nilai)
                            {
                            ?>
                                <option value="<?php echo $jenis_nilai->id_jenis_nilai?>"<?php if( $jenis_nilai->id_jenis_nilai==$id_jenis_nilai) echo 'selected="selected"';?>><?php echo $jenis_nilai->nama_jenis_nilai?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="porsi">
                        PROPORSI (%)
                    </label>
                    <div class="col-sm-3">
                        <input type="text" name="porsi"  value="<?php echo $porsi ?>" placeholder="PROPORSI KOMPONEN" id="porsi" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-2">
                        <a class="btn btn-danger btn-sm" onclick="editKomponen()">SIMPAN</a>
                    </div>
                    <div class="col-sm-3">
                        <?php echo anchor('mapel/list_komponen/'.$id_mapel, 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>
<script type="text/javascript">
    function editKomponen(){
        console.log("Submit Edit Komponen");
        var id_komponen = $("#id_komponen").val();
        var nama_komponen = $("#nama_komponen").val();
        var id_mapel = $("#id_mapel").val();
        var jenis_nilai = $("#jenis_nilai").val();
        var porsi = $("#porsi").val();
        console.log("ID Mapel: " + id_mapel);
        console.log("ID Jenis: " + jenis_nilai);
        $.ajax({
            url: '<?=base_url()?>index.php/mapel/edit_komponen',
            type: 'POST',
            dataType: 'json',
            data: {'submit':true,'id_komponen':id_komponen,'id_mapel':id_mapel,'nama_komponen':nama_komponen,'jenis_nilai':jenis_nilai,'porsi':porsi},
            success: function(response) {
                console.log(response.hasil);
                alert(response.message);
                if(response.hasil == true){
                    window.location = "<?=base_url()?>" + "index.php/mapel/list_komponen/" + $("#id_mapel").val();
                }
            }
        });
    }
</script>
