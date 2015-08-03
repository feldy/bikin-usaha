<?php 
include 'system/config_service.php';
// session_start();

if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
    echo "<script>location='?page=login'</script>";
} else {
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengajuan Jenis Usaha Baru
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Yuk, promosiin usaha kamu !
            </div>
            <div class="panel-body">
                <form role="form" action="system/jenis_usaha_baru_service.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-12"> 
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Nama Usaha :</label>
                                <input name="nama_usaha" type="text" class="form-control"  required data-validation-required-message="Masukan nama lengkap kamu donk !">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label>Jenis Usaha :</label>
                            <div class="controls">
                                <select name="jenis_usaha" class="form-control">
                                    <option value="Franchise Makanan">Franchise Makanan</option>
                                    <option value="Franchise Minuman">Franchise Minuman</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Modal :</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input name="modal" type="text" id="modal" class="form-control">
                                </div>
                                <!-- <input type="text" class="form-control"  required data-validation-required-message="Masukan nama lengkap kamu donk !"> -->
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Maksimal Jumlah Pegawai :</label>
                                <div class="form-group input-group">
                                    <input name="jumlah_pegawai" type="text" id="jumlah_pegawai" max="50" min="1" class="form-control"
                                    data-validation-number-message="Isi harus angka !"
                                    >
                                    <span class="input-group-addon">Orang</span>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Nomor Telepon :</label>
                                <input name="no_tlp" id="no_tlp" type="text" class="form-control" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Photo Usahanya udah ada belum ? Upload donk ! :</label>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <h4>Images 1</h4>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input name="file_photo1" type="file">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <h4>Images 2</h4>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input name="file_photo2" type="file">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <h4>Images 3</h4>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input name="file_photo3" type="file">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <h4>Images 4</h4>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input name="file_photo4" type="file">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group form-group">
                            <div class="controls">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <h4>Doc Proposal :</h4>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input name="file_doc" type="file">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Deskripsi :</label>
                                <textarea name="deskripsi" id="summernote"></textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <button type="submit" name="btn_simpan_jenis_usaha_baru" class="btn btn-primary">Ajukan</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>