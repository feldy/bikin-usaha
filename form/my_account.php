<!-- Content Row -->
<div class="row">
    <!-- Sidebar Column -->
    <div class="col-md-3">
        <div class="list-group">
            <a class="list-group-item">Profil</a>
        </div>
    </div>
    <!-- Content Column -->
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="page-header">Profil</h1>
                <?php 
                    $id = $_GET['user_id'];
                    $strQuery = "SELECT * FROM m_entrepreneur e where id = '$id'";
                    $qry = mysql_query($strQuery) or die(mysql_error());
                    $result = mysql_fetch_array($qry);
                    $split = split(",", $result['ttl']);
                    $tempat = $split[0];
                    $tgl_lahir = $split[1];
                ?>
                    <form role="form" action="system/edit_anggota_service.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12"> 
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nama Lengkap :</label>
                                    <input value="<?php echo $result['id'];?>" name="id" type="hidden" >
                                    <input value="<?php echo $result['nama'];?>" name="nama" type="text" class="form-control"  required data-validation-required-message="Masukan nama lengkap kamu donk !">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Email :</label>
                                    <input value="<?php echo $result['email'];?>" name="email_utama" type="hidden" >
                                    <input value="<?php echo $result['email'];?>" disabled="disabled"  type="email" class="form-control"  
                                    required 
                                    data-validation-required-message="Masukan email kamu donk !"
                                    data-validation-email-message="Email tidak valid !"
                                    >
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Tempat Lahir :</label>
                                    <input value="<?php echo $tempat?>" name="tempat" type="text" class="form-control">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label>Tanggal Lahir :</label>
                                <div class="input-group date">
                                    <input value="<?php echo trim($tgl_lahir);?>" name="tgl_lahir" id="tanggal" type="text" class="form-control">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label>Jenis Kelamin :</label>
                                <div class="controls">
                                    <select  name="jk" id="disabledSelect" class="form-control">
                                        <option value="Laki-Laki" <?php if($result['jenis_kelamin'] == "Laki-Laki"){echo "selected";};?> >Laki-Laki</option>
                                        <option value="Perempuan" <?php if($result['jenis_kelamin'] == "Perempuan"){echo "selected";};?> >Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nomor Telepon :</label>
                                    <input value="<?php echo $result['no_telepon'];?>" name="tlp" type="text" class="form-control" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Alamat :</label>
                                    <textarea name="alamat" rows="5" class="form-control" ><?php echo $result['alamat'];?></textarea>
                                    <p class="help-block"></p>
                                </div>
                            </div> 
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Ganti Photo Kamu :</label>
                                    <input value="<?php echo $result['file_photo'];?>" name="name_file2" type="hidden" />
                                    <input name="file2" type="file" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Ganti CV Kamu :</label>
                                    <input value="<?php echo $result['file_biodata'];?>" name="name_file1" type="hidden" />
                                    <input name="file" type="file" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages -->
                            <button name="btn_simpan_edit_account" type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->