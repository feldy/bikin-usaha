<?php 
// session_start();
include 'system/config_service.php';

if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
    echo "<script>location='?page=login'</script>";
} else {
?>
<div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard Proposal </h1>
        </div>
    </div>
    <?php
    $id_proposal = $_GET['id_proposal'];
    $result = mysql_query("SELECT   o.nilai_persentase_investor as nilai_persentase_investor, 
                                    o.alamat as alamat, 
                                    o.kota as kota, 
                                    o.tanggal as tanggal, 
                                    o.informasi_proposal as informasi_proposal, 
                                    o.nama_proposal as nama_proposal, 
                                    o.gaji_pegawai as gaji_pegawai, 
                                    e.id as id_owner, 
                                    e.nama as nama_owner, 
                                    e.file_photo as file_photo_owner, 
                                    e.alamat as alamat_owner, 
                                    e.no_telepon as no_telepon_owner, 
                                    e.ttl as ttl_owner, 
                                    e.email as email_owner, 
                                    e.tanggal as tanggal_aktif, 
                                    u.nama as nama_supplier,  
                                    u.deskripsi as u_deskripsi,  
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

    $ttl_pecah = split(",", $map['ttl_owner']);
    $kotaLahir = $ttl_pecah[0];
    $tglLahir = $ttl_pecah[1];
    $tglLahirPecah = split("/", $tglLahir);
    $tglLahirFinal = $tglLahirPecah[2]."-".$tglLahirPecah[1]."-".$tglLahirPecah[0];
?>
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
            <h2><?php echo strtoupper($map['nama_proposal']);?></h2>
            <p><?php echo $map['informasi_proposal']?></p>
        </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-history fa-fw"></i> History
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge"><i class="fa fa-check"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <div class="col-lg-12">
                    <h2 class="page-header">
                        <i class="fa fa-group"></i>
                        Anggota</h2>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Feldy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Feldy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Feldy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Feldy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Feldy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Feldy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-info-circle fa-fw"></i> Informasi Usaha
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-md-12">
                                <ul>
                                    <li>Modal :Rp. <strong><?php echo number_format($map['modal']); ?></strong> </li>
                                    <li>Supplier: <?php echo $map['nama_supplier']; ?></li>
                                    <li>Kontak: <?php echo $map['contact_supplier']; ?></li>
                                    <li>Lokasi : <?php echo $map['kota']; ?></li>
                                </ul>
                                <p>Alamat: <?php echo $map['alamat']?></p>
                                <span class="pull-right text-muted small"><i class="glyphicon glyphicon-time"></i> <em><?php getTanggal($map['tanggal']); ?></em>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Informasi Owner
                        </div>
                        <!-- /.panel-heading -->
                        <?php
                            $ownerID = $map['id_owner'];
                            $sql = mysql_query("SELECT * FROM t_proposal_usaha o where o.id_owner = '$ownerID' ") or die(mysql_error());
                            $sql2 = mysql_query("SELECT * FROM t_anggota_proposal_usaha o where o.id_entrepreneur = '$ownerID' and o.status = 'APPROVED' ") or die(mysql_error());
                            $numArr = mysql_num_rows($sql);
                            $numArr2 = mysql_num_rows($sql2);
                        ?>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <img class="img-responsive" src="upload/photo_profile/<?php echo $map['file_photo_owner']?>" alt=""><br />
                                <p class="pull-right text-muted">
                                    <em>
                                    <strong><?php echo $map['nama_owner']; ?></strong> adalah seorang Entrepreneur yang beralamat di 
                                    <strong><?php echo $map['alamat_owner']; ?> </strong>lahir di 
                                    <strong><?php echo $kotaLahir;?></strong> pada 
                                    <strong><?php echo getTanggal($tglLahirFinal); ?></strong>. Aktif di Bikin-Usaha.com mulai dari 
                                    <strong><?php echo getTanggal($map['tanggal_aktif']);?></strong>. Telah membuat 
                                    <strong><?php echo $numArr;?> Proposal Usaha</strong> dan menjadi anggota dari proposal Entrepreneur lain sebanyak  
                                    <strong><?php echo $numArr2;?> Proposal Usaha</strong>. Jika anda ingin bertanya silahkan hubungi saya ke:
                                    <ul>
                                        <li><i class="glyphicon glyphicon-phone-alt"></i> <?php echo $map['no_telepon_owner']; ?></li>
                                        <li><i class="fa fa-google-plus-square"></i> <?php echo $map['email_owner']; ?></li>
                                    </ul>
                                    </em>
                                </p>
                            </div>
                        </div>
                        <div class="panel-body" >
                            <a class="btn btn-default btn-block btn-social">
                                <i class="fa fa-child"></i> Ajukan Karyawan
                            </a>
                            <a class="btn btn-default btn-block">
                                <i class="fa fa-envelope-o fa-fw"></i> Undang Investor
                            </a>
                            <a class="btn btn-default btn-block">
                                <i class="fa fa-print fa-fw"></i> Print Draft Proposalku
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-calendar-o fa-fw"></i> Schedule
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a  class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Pertemuan 1 (Kampus)
                                    <span class="pull-right text-muted small"><em>15 Juni 2015</em>
                                    </span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Pembahasan Modal & Karyawan
                                    <span class="pull-right text-muted small"><em>20 Juni 2015</em>
                                    </span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Kesepakatan (Mall Depok)
                                    <span class="pull-right text-muted small"><em>30 Juni 2015</em>
                                    </span>
                                </a>
                            </div>
                            <a href="#" class="btn btn-default btn-block">Lihat Semua Schedule</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-text fa-fw"></i> Pengajuan Dan Permintaan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pengajuan Dan Permintaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Karyawan 1</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Karyawan 2</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Investor 1</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Investor 2</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Investor 3</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Permintaan Perrtemuan Oleh A</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn btn-default btn-block">Lihat Semua Pengajuan</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Ketik Pesan disini..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>