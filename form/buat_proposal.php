<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Buat Proposal Usaha
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Buat Usaha Yuk!!
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li id="_step1" class="active"><a href="#step1" >Step 1</a>
                    </li>
                    <li id="_step2"><a href="#step2" >Step 2</a>
                    </li>
                    <li id="_step3"><a href="#step3" >Step 3</a>
                    </li>
                    <li id="_step4"><a href="#finish">Finish</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <form role="form">
                    <div class="tab-content ">
                        <div class="tab-pane fade in active" id="step1">
                            <br />
                            <div class="col-md-8"> 
                                <div class="control-group form-group">
                                    <label>Pilih Kategori Usaha :</label>
                                    <div class="controls">
                                        <select id="kategori_usaha" class="form-control">
                                            <option value='pilih'>Pilih</option>
                                            <?php
                                                $x = mysql_query("SELECT kategori_jenis FROM m_jenis_usaha group by kategori_jenis ") or die(mysql_error());
                                                while ($arrX=mysql_fetch_array($x)) {
                                            ?>
                                            <option value="<?php echo $arrX['kategori_jenis']; ?>"><?php echo $arrX['kategori_jenis']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label>Pilih Supplier/Franchise :</label>
                                    <div class="controls">
                                        <select id="supplier" class="form-control">
                                            <option value="">Pilih</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <label>Informasi dan Deskripsi Proposal:</label>
                                        <div id="deskripsi_proposal_baru"></div>
                                        <p class="help-block"></p>
                                    </div>
                                </div>          
                                <div class="control-group form-group">     
                                    <button type="button" href="#step2" data-toggle="tab" onclick="toStep2()" class="btn btn-btn btn-info">
                                        Selanjutnya
                                        <i class="fa fa-angle-double-right"></i>
                                    </button>       
                                </div>      
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step2">
                            <br />
                            <div class="col-md-4"> 
                                <div class="control-group form-group">
                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary "  style="text-align: left;">
                                        <i class="fa fa-plus-square-o"></i>
                                        Undang Entrepreneur Lain</button>
                                        <div class="control-group form-group">
                                            <label>&nbsp;</label>
                                            <div class="controls" id="add_image"></div>
                                        </div>
                                </div>
                                <div class="control-group form-group">
                                    <button type="button" class="btn btn-primary"  style="text-align: left;">
                                        <i class="fa fa-plus-square-o"></i>
                                        Tambahkan Pegawai (<span id="jmlOrang"></span> Orang)</button>
                                        <div class="control-group form-group">
                                            <label>&nbsp;</label>
                                            <div class="controls" id="add_image"></div>
                                        </div>
                                </div>
                                <div class="control-group form-group">
                                    <button type="button" href="#step1" data-toggle="tab" onclick="toStep1()" class="btn btn-btn btn-info">
                                        <i class="fa fa-angle-double-left"></i>
                                        Sebelumnya
                                    </button>       
                                    <button type="button" href="#step3" data-toggle="tab" onclick="toStep3()" class="btn btn-btn btn-info">
                                        Selanjutnya
                                        <i class="fa fa-angle-double-right"></i>
                                    </button>       
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step3">
                            <br />
                            <div class="col-md-4"> 
                                <div class="control-group form-group">
                                    <label>Setting Proposal :</label>
                                    <div class="form-group input-group">
                                        <input type="number" class="form-control"
                                        data-validation-number-message="Isi harus angka !"
                                        placeholder="Jumlah Maksimal Investor"
                                        >
                                        <span class="input-group-addon">Orang</span>
                                    </div>
                                    <p class="help-block"></p>
                                </div>
                                <div class="control-group form-group">
                                    <label>Setting Nilai Investasi :</label>
                                    <div class="form-group input-group">
                                        <input type="number" class="form-control"
                                        data-validation-number-message="Isi harus angka !"
                                        placeholder="%"
                                        >
                                        <span class="input-group-addon">% (Owner)</span>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="number" class="form-control"
                                        data-validation-number-message="Isi harus angka !"
                                        placeholder="%"
                                        >
                                        <span class="input-group-addon">%</span>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="number" class="form-control"
                                        data-validation-number-message="Isi harus angka !"
                                        placeholder="%"
                                        >
                                        <span class="input-group-addon">%</span>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="number" class="form-control"
                                        data-validation-number-message="Isi harus angka !"
                                        placeholder="%"
                                        >
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <button type="button" href="#step2" data-toggle="tab" onclick="toStep2()" class="btn btn-btn btn-info">
                                        <i class="fa fa-angle-double-left"></i>
                                        Sebelumnya
                                    </button>       
                                    <button type="button" href="#finish" data-toggle="tab" onclick="toFinish()" class="btn btn-btn btn-info">
                                        Selanjutnya
                                        <i class="fa fa-angle-double-right"></i>
                                    </button>       
                                </div>
                            </div>  
                        </div>
                        <div class="tab-pane fade" id="finish">
                            <br />
                            <h1><i class="fa fa-check"></i>
                                Proposal Berhasil dibuat</h1>
                            <p><h3>Silahkan lanjutkan ke menu Proposalku untuk melihat detail proposal atau kembali ke halaman utama</h3></p>
                            <button type="button" class="btn btn-primary">Halaman Utama</button>
                            <button type="button" class="btn btn-primary">Proposalku</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Undang Entrepreneur Lain</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Masukan email parner yang ingin kamu undang :</label>
                                <input type="email" id="emailEntrepreneur" class="form-control"  
                                required 
                                data-validation-required-message="Masukan email kamu donk !"
                                data-validation-email-message="Email tidak valid !">
                                <br/ >
                                <div id="msgEmail"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="kirim_undangan" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>