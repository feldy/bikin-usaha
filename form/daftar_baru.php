<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Baru
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Selamat Datang Calon Entrepreneur ^^ !!
            </div>
            <div class="panel-body">
                <!-- <div class="row"> -->
                    <form role="form" action="system/daftar_baru_service.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12"> 
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nama Lengkap :</label>
                                    <input name="nama" type="text" class="form-control"  required data-validation-required-message="Masukan nama lengkap kamu donk !">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Email :</label>
                                    <input name="email_utama" type="email" class="form-control"  
                                    required 
                                    data-validation-required-message="Masukan email kamu donk !"
                                    data-validation-email-message="Email tidak valid !"
                                    >
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Password :</label>
                                    <input name="password_utama" type="password" class="form-control"  required 
                                    data-validation-required-message="Masukan password kamu donk !">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Tempat Lahir :</label>
                                    <input name="tempat" type="text" class="form-control">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label>Tanggal Lahir :</label>
                                <div class="input-group date">
                                    <input name="tgl_lahir" id="tanggal" type="text" class="form-control">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label>Jenis Kelamin :</label>
                                <div class="controls">
                                    <select name="jk" id="disabledSelect" class="form-control">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nomor Telepon :</label>
                                    <input name="tlp" type="text" class="form-control" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Alamat :</label>
                                    <textarea name="alamat" rows="5" class="form-control" ></textarea>
                                    <p class="help-block"></p>
                                </div>
                            </div> 
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Upload Photo Kamu :</label>
                                    <input name="file2" type="file" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Upload CV Kamu :</label>
                                    <input name="file" type="file" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages -->
                            <button name="btn_simpan_daftar_baru" type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>