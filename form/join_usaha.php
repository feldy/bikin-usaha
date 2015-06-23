<?php
    $id_proposal = $_GET['id_proposal'];
    $result = mysql_query("SELECT   o.nilai_persentase_investor as nilai_persentase_investor, 
                                    o.alamat as alamat, 
                                    o.kota as kota, 
                                    o.tanggal as tanggal, 
                                    o.informasi_proposal as informasi_proposal, 
                                    o.nama_proposal as nama_proposal, 
                                    o.gaji_pegawai as gaji_pegawai, 
                                    e.nama as nama_owner, 
                                    u.nama as nama_supplier,  
                                    u.modal as modal, 
                                    u.contact_supplier as contact_supplier, 
                                    u.pic_1 as pic_1, 
                                    u.pic_2 as pic_2, 
                                    u.pic_3 as pic_3, 
                                    u.pic_4 as pic_4 
                        FROM        t_proposal_usaha o 
                        INNER JOIN  m_entrepreneur e ON o.id_owner = e.id 
                        INNER JOIN  m_jenis_usaha u ON o.id_jenis_usaha = u.id 
                        WHERE       o.id = '$id_proposal'
                        GROUP BY    o.id
                        ") or die(mysql_error());
    $map = mysql_fetch_array($result);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">PROPOSAL USAHA <?php echo strtoupper($map['nama_proposal']);?>
            <br />
            <small>Owner: <?php echo strtoupper($map['nama_owner']);?></small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                    $active = 0;
                    $sActive = "";
                    $pic1 = $map['pic_1'];   
                    $pic2 = $map['pic_2'];   
                    $pic3 = $map['pic_3'];   
                    $pic4 = $map['pic_4'];   

                    if ($pic1 != NULL && $pic1 != "") {
                        $active = 1;
                        echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                    }

                    if ($pic2 != NULL && $pic2 != "") {
                        if ($active = 0) {
                            $sActive = 'class="active"';
                        }
                        echo '<li data-target="#carousel-example-generic" data-slide-to="1" $sActive ></li>';
                    }

                    if ($pic3 != NULL && $pic3 != "") {
                        if ($active = 0) {
                            $sActive = 'class="active"';
                        }
                        echo '<li data-target="#carousel-example-generic" data-slide-to="2" $sActive ></li>';
                    }

                    if ($pic4 != NULL && $pic4 != "") {
                        if ($active = 0) {
                            $sActive = 'class="active"';
                        }
                        echo '<li data-target="#carousel-example-generic" data-slide-to="3" $sActive ></li>';
                    }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                 <?php
                    $active = 0;
                    $sActive = "";
                    $pic1 = $map['pic_1'];   
                    $pic2 = $map['pic_2'];   
                    $pic3 = $map['pic_3'];   
                    $pic4 = $map['pic_4'];   

                    if ($pic1 != NULL && $pic1 != "") {
                        $active = 1;
                        echo '<div class="item active"><div style="background:url(upload/images/'.$pic1.') center center, url(upload/images/Default.jpg) center center; background-size:cover;" class="slider-size"></div></div>';
                    }

                    if ($pic2 != NULL && $pic2 != "") {
                        if ($active = 0) {
                            $sActive = 'active';
                        }
                        echo '<div class="item $sActive"><div style="background:url(upload/images/'.$pic2.') center center, url(upload/images/Default.jpg) center center; background-size:cover;" class="slider-size"></div></div>';
                    }

                    if ($pic3 != NULL && $pic3 != "") {
                        if ($active = 0) {
                            $sActive = 'active';
                        }
                        echo '<div class="item $sActive"><div style="background:url(upload/images/'.$pic3.') center center, url(upload/images/Default.jpg) center center; background-size:cover;" class="slider-size"></div></div>';
                    }

                    if ($pic4 != NULL && $pic4 != "") {
                        if ($active = 0) {
                            $sActive = 'active';
                        }
                        echo '<div class="item $sActive"><div style="background:url(upload/images/'.$pic4.') center center, url(upload/images/Default.jpg) center center; background-size:cover;" class="slider-size"></div></div>';
                    }
                ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Deskripsi Usaha</h3>
        <p><?php echo $map['informasi_proposal']?></p>
        <p>Alamat: <?php echo $map['alamat']?></p>
        <h6><i class="fa fa-fw fa-map-marker"></i>Lokasi <?php echo $map['kota']; ?></h6>
        <h3>Details</h3>
        <ul>
            <li>Modal :Rp. <?php echo number_format($map['modal']); ?> </li>
            <li>Supplier: <?php echo $map['nama_supplier']; ?></li>
            <li>Kontak: <?php echo $map['contact_supplier']; ?></li>
            <li><?php echo date_format(date_create($map['tanggal']), "d/m/Y"); ?></li>
        </ul>
        
    </div>
</div>
<div class="row">
    &nbsp;
</div>
<div class="row">
    <?php
        //QUERY UNTUK SELISIH INVESTOR
        $qry2 = mysql_query("SELECT     *
                            FROM        m_investasi i
                            WHERE       i.id_proposal = '$id_proposal'
                            AND         i.id not in (SELECT id_nilai_investasi FROM t_anggota_proposal_usaha apu WHERE apu.status = 'APPROVED' and apu.tipe_anggota = 'investor' and apu.id_proposal_usaha = '$id_proposal')") or die(mysql_error());
        $index = 0;
        while ($arrQry2 = mysql_fetch_array($qry2)) {
        $index++;
        
    ?>
    <div class="col-md-3">
        <div class="panel panel-default text-center">
            <div class="panel-heading">
                <h3 class="panel-title">Investor <?php echo $index; ?></h3>
            </div>
            <div class="panel-body">
                <span class="price"><?php echo number_format($arrQry2['nilai']); ?><sup>%</sup></span>
                <span class="period">nilai investasi</span>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="system/buat_anggota_proposal_service.php?id_proposal=<?php echo $id_proposal;?>&id_nilai_investasi=<?php echo $arrQry2['id']; ?>&tipe_anggota=investor" class="btn btn-primary">Join Sebagai Investor!</a>
                </li>
            </ul>
        </div>
    </div>
    <?php 
            
        } 

        $gaji = $map['gaji_pegawai'];
        $gaji = $gaji/1000;
        //QUERY UNTUK SELISIH PEGAWAI
        $qry1 = mysql_query("   SELECT      (ju.max_jumlah_pegawai - count(apu.id)) as lowongan_tersedia
                                FROM        t_proposal_usaha pu
                                INNER JOIN  m_jenis_usaha ju ON pu.id_jenis_usaha = ju.id
                                LEFT JOIN   t_anggota_proposal_usaha apu ON apu.id_proposal_usaha = pu.id and apu.status = 'APPROVED' and apu.tipe_anggota = 'pegawai'
                                WHERE       pu.id = '$id_proposal'") or die(mysql_error());
        $result1 = mysql_fetch_array($qry1);


    ?>
    <div class="col-md-3">
        <div class="panel panel-primary text-center">
            <div class="panel-heading">
                <h3 class="panel-title">Lowongan Pegawai</h3>
            </div>
            <div class="panel-body">
                <span class="price"><sup>Rp</sup><?php echo number_format($gaji); ?>K</span>
                <span class="period">gaji per bulan</span>
            </div>
            <ul class="list-group">
                <li class="list-group-item">Tersedia Untuk <strong><?php echo $result1['lowongan_tersedia']; ?></strong> orang</li>
                <li class="list-group-item"><a href="system/buat_anggota_proposal_service.php?id_proposal=<?php echo $id_proposal;?>&id_nilai_investasi=NULL&tipe_anggota=pegawai" class="btn btn-primary">Join Sebagai Karyawan!</a>
                </li>
            </ul>
        </div>
    </div>
</div>