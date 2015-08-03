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
                                    o.id as proposal_id, 
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
                                    u.pic_4 as pic_4 ,
                                    u.doc as doc
                        FROM        t_proposal_usaha o 
                        INNER JOIN  m_entrepreneur e ON o.id_owner = e.id 
                        INNER JOIN  m_jenis_usaha u ON o.id_jenis_usaha = u.id and u.is_active = 1
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
        <div class="col-md-12">
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
        <div class="col-md-12">
            <h2><?php echo strtoupper($map['nama_proposal']);?></h2>
            <p><?php echo $map['informasi_proposal']?></p>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-history fa-fw"></i> History
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <ul class="timeline">
                                    <?php 
                                        $strQryTimeline = "  SELECT * FROM (
                                                                    -- undangan 
                                                                    SELECT          u.id as id, 
                                                                                    u.proposal_id as proposal_id, 
                                                                                    u.tanggal as tanggal, 
                                                                                    u.keterangan as keterangan,
                                                                                    e.nama as nama_customer1,
                                                                                    e2.nama as nama_customer2,
                                                                                    '_UNDANGAN_' as tipe,
                                                                                    '' as deskripsi,
                                                                                    '' as status
                                                                    FROM            m_undangan u 
                                                                    INNER JOIN      m_entrepreneur e ON u.from_id = e.id 
                                                                    INNER JOIN      m_entrepreneur e2 ON u.to_id = e2.id 
                                                                    WHERE           u.proposal_id = '$id_proposal'

                                                                    UNION
                                                                    -- approvement
                                                                    SELECT          t.id as id, 
                                                                                    t.id_proposal_usaha as proposal_id, 
                                                                                    t.tanggal as tanggal, 
                                                                                    t.tipe_anggota as keterangan,
                                                                                    f.nama as nama_customer1,
                                                                                    '' as nama_customer2,
                                                                                    '_APPROVEMENT_' as tipe,
                                                                                    '' as deskripsi,
                                                                                    t.status as status
                                                                    FROM            t_anggota_proposal_usaha t 
                                                                    INNER JOIN      m_entrepreneur f ON t.id_entrepreneur = f.id 
                                                                    WHERE           t.id_proposal_usaha = '$id_proposal' 

                                                                    UNION 
                                                                    -- schedule
                                                                    SELECT          s.id as id, 
                                                                                    s.id_proposal as proposal_id, 
                                                                                    s.tanggal as tanggal, 
                                                                                    s.title as keterangan,
                                                                                    g.nama as nama_customer1,
                                                                                    '' as nama_customer2,
                                                                                    '_SCHEDULE_' as tipe,
                                                                                    s.deskripsi as deskripsi,
                                                                                    s.status as status
                                                                    FROM            m_schedule s 
                                                                    INNER JOIN      m_entrepreneur g ON s.id_entreprener = g.id 
                                                                    WHERE           s.id_proposal = '$id_proposal'
                                                                    ) hasil ORDER BY tanggal desc
                                                                    ";
                                        $qryTimeline = mysql_query($strQryTimeline) or die (mysql_error());
                                        $count = 0;
                                        $inverted = "";
                                        $title = "";
                                        $message = "";
                                        $icon = "";
                                        $badge = "";

                                        while ($arrQryTimeline = mysql_fetch_array($qryTimeline)) {
                                            $count++;
                                            if ($count % 2 == 0) {
                                                $inverted = 'class="timeline-inverted"';
                                            } else {
                                                $inverted = '';
                                            }

                                            if ($arrQryTimeline['tipe'] == "_UNDANGAN_") {
                                                $badge = "primary";
                                                $title = $arrQryTimeline['nama_customer1']." Mengundang ".$arrQryTimeline['nama_customer2']." Untuk Bergabung";
                                                $icon = "fa fa-plus-circle";
                                            } else if ($arrQryTimeline['tipe'] == "_APPROVEMENT_") {
                                                if ($arrQryTimeline['status'] == "NEW") {
                                                    $badge = "info";
                                                    $title = "Permintaan Join oleh ".$arrQryTimeline['nama_customer1']."";
                                                    $icon = "fa fa-user";
                                                } else if ($arrQryTimeline['status'] == "APPROVED") {
                                                    $badge = "success";
                                                    $title = $arrQryTimeline['nama_customer1']." Telah bergabung !";
                                                    $icon = "fa fa-check";
                                                } else if ($arrQryTimeline['status'] == "REJECTED") {
                                                    $badge = "danger";
                                                    $title = $arrQryTimeline['nama_customer1']." Telah Ditolak oleh Owner !";
                                                    $icon = "fa fa-times";
                                                } 
                                            } else if ($arrQryTimeline['tipe'] == "_SCHEDULE_") {
                                                $badge = "warning";
                                                $title = $arrQryTimeline['nama_customer1']." Menambahkan Acara ".$arrQryTimeline['keterangan']."";
                                                $icon = "fa fa-calendar";
                                            }
                                    ?>
                                    <li <?php echo $inverted; ?>>
                                        <div class="timeline-badge <?php echo $badge;?>"><i class="<?php echo $icon;?>"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title"><?php echo $title;?></h4>
                                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> <span data-livestamp="<?php echo $arrQryTimeline['tanggal']; ?>"></span></small>
                                                </p>
                                            </div>
                                            <div class="timeline-body">
                                                <p><?php echo $arrQryTimeline['deskripsi'];?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li class="timeline-inverted">
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
                                    </li> -->
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h2 class="page-header"><i class="fa fa-group"></i>Anggota</h2>
                        <div class="row">
                            <?php
                                $tipeUser = "";
                                if (isset($_SESSION['tipe_user'])) {
                                    $tipeUser = $_SESSION['tipe_user'];
                                }

                                $sqlTambahan = "";
                                if ($tipeUser == "Pegawai" || $tipeUser == "Investor") {
                                    $sqlTambahan = "AND tipe_anggota = 'pegawai'";
                                }

                                $strQryAnggota = "  SELECT  e.nama as nama_entrepreneur,
                                                            e.file_photo as photo_entrepreneur,
                                                            t.tipe_anggota as tipe_anggota
                                                    FROM t_anggota_proposal_usaha t 
                                                    INNER JOIN m_entrepreneur e ON t.id_entrepreneur = e.id
                                                    WHERE id_proposal_usaha = '$id_proposal' 
                                                    AND status = 'APPROVED'
                                                    $sqlTambahan 
                                                    GROUP BY t.id_entrepreneur
                                                    ";
                                $qryAnggota = mysql_query($strQryAnggota) or die (mysql_error());
                                while ($arrQryAnggota = mysql_fetch_array($qryAnggota)) {
                            ?>
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="pull-left">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                              <!-- <img src="upload/photo_profile/<?php echo $arrQryAnggota['photo_entrepreneur'];?>" alt="User Avatar" class="img-responsive img-circle" /> -->
                                        </span>  
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $arrQryAnggota['nama_entrepreneur'];?></h4>
                                        <?php 
                                            $strQryAnggota2 = "  SELECT  count(*)
                                                                FROM t_anggota_proposal_usaha t 
                                                                INNER JOIN m_entrepreneur e ON t.id_entrepreneur = e.id
                                                                WHERE id_proposal_usaha = '$id_proposal' 
                                                                AND status = 'APPROVED' 
                                                                ";
                                            $qryAnggota2 = mysql_query($strQryAnggota2) or die (mysql_error());
                                            $arrQryAnggota2 = mysql_num_rows($qryAnggota2);
                                            $ketAnggota = $arrQryAnggota['tipe_anggota'];
                                            if ($arrQryAnggota2 > 1) {
                                                $ketAnggota = "Investor dan Pegawai";
                                            }
                                        ?>
                                        <p>Join sebagai. <?php echo strtoupper($ketAnggota);?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        &nbsp;
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
                                    <!-- REVISI BU NIA<li>Modal :Rp. <strong><?php echo number_format($map['modal']); ?></strong> </li> -->
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
                            $proposal_id = $map['proposal_id'];
                            $doc = $map['doc'];
                            $sql = mysql_query("SELECT * FROM t_proposal_usaha o where o.id_owner = '$ownerID' ") or die(mysql_error());
                            $sql2 = mysql_query("SELECT * FROM t_anggota_proposal_usaha o where o.id_entrepreneur = '$ownerID' and o.status = 'APPROVED' ") or die(mysql_error());
                            $numArr = mysql_num_rows($sql);
                            $numArr2 = mysql_num_rows($sql2);
                        ?>
                        <input id="id_owner" type="hidden" value="<?php echo $ownerID;?>">
                        <input id="proposal_id" type="hidden" value="<?php echo $proposal_id;?>">
                        <input id="doc_id" type="hidden" value="<?php echo $doc;?>">
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
                            <a class="btn btn-default btn-block btn-social" data-toggle="modal" data-target="#myModalProposalkuAjukanKaryawan">
                                <i class="fa fa-child"></i> Ajukan Karyawan
                            </a>
                            <a class="btn btn-default btn-block" data-toggle="modal" data-target="#myModalProposalkuAjukanInvestor">
                                <i class="fa fa-envelope-o fa-fw"></i> Undang Investor
                            </a>
                            <a class="btn btn-default btn-block" id="download_draft_proposalku">
                                <i class="fa fa-print fa-fw"></i> Download Draft Proposalku
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
                                <?php 
                                    $strQuery = "   SELECT  s.title as title,  
                                                            s.deskripsi as deskripsi,  
                                                            s.tanggal as tanggal,  
                                                            e.nama as nama 
                                                    FROM m_schedule s 
                                                    INNER JOIN m_entrepreneur e ON s.id_entreprener = e.id
                                                    WHERE id_proposal = '$proposal_id' 
                                                    ORDER BY s.tanggal desc";
                                    $qrySchedule = mysql_query($strQuery) or die(mysql_error());
                                    while ($arrQrySchedule=mysql_fetch_array($qrySchedule)) {
                                ?>
                                <a  class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> <?php echo $arrQrySchedule['title']." (".$arrQrySchedule['deskripsi'].") ";?>
                                    <span class="pull-right text-muted small"><em><?php echo getTanggal($arrQrySchedule['tanggal'])." (".$arrQrySchedule['nama'].") "; ?></em>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                            <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModalProposalkuAddSchedule">Add Schedule</a>
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
                                        <?php 
                                        $strQuery = "   SELECT  
                                                        -- s.title as title,  
                                                        t.status as status,  
                                                        t.tipe_anggota as tipe_anggota,  
                                                        e.nama as nama 
                                                FROM t_anggota_proposal_usaha t 
                                                INNER JOIN m_entrepreneur e ON t.id_entrepreneur = e.id
                                                WHERE id_proposal_usaha = '$proposal_id' 
                                                ORDER BY t.tanggal desc";
                                        $qryPermintaan = mysql_query($strQuery) or die(mysql_error());
                                        $count = 0;
                                        while ($arrQryPermintaan=mysql_fetch_array($qryPermintaan)) {
                                            $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $arrQryPermintaan['nama']." (".strtoupper($arrQryPermintaan['tipe_anggota']).")";?>
                                                <span class="pull-right text-muted small"><em><?php echo strtoupper($arrQryPermintaan['status']);?></em>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <script type="text/javascript">
                        setInterval(function() {
                            // console.log('loaddd');
                            $.ajax({
                                url: "system/service_impl.php",
                                type: "POST",
                                data: {
                                    type: "load_chat",
                                    proposal_id: $('#proposal_id').val()
                                },
                                cache: false,
                                dataType : "json",
                                success: function(e) {
                                    var position = "left";
                                    var count = 0;
                                    var content = "";
                                    for (var i = 0; i < e.length; i++) {
                                        count++;
                                        if (count % 2 == 0) {
                                            //genap
                                            position = "left";
                                        } else {
                                            position = "right";
                                        }

                                        content += "<li tabindex='1' class='"+position+" clearfix'>"+
                                                        "<span class='chat-img pull-"+position+"'>"+
                                                            "<img width='50' src='upload/photo_profile/"+e[i].file_photo+"' alt='User Avatar' class='img-circle' />"+
                                                        "</span>"+
                                                        "<div class='chat-body clearfix'>"+
                                                            "<div class='header'>"+
                                                                "<strong class='primary-font'>"+e[i].nama_entrepreneur+"</strong>"+
                                                                "<small class='pull-right text-muted'>"+
                                                                    // "<i class='fa fa-clock-o fa-fw'></i> <span data-livestamp='"+e[i].tanggal+"'></span>"+
                                                                "</small>"+
                                                            "</div>"+
                                                            "<p>"+e[i].message+"</p>"+
                                                        "</div>"+
                                                    "</li>"; 
                                        
                                    }
                                    $('#content_chat_proposalku').html("");
                                    $('#content_chat_proposalku').html(content);

                                    var u =  $('li.clearfix').last()[0];
                                    // u.scrollIntoViewIfNeeded();
                                },
                                error: function(e) {
                                    // Fail message
                                    console.log('N: ', e);
                                }
                            });
                        }, 3000);
                    </script>
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                        </div>
                        <div class="panel-body">
                            <ul class="chat" id="content_chat_proposalku">
                                <?php 
                                    $strQuery = "   SELECT  e.nama as nama_entrepreneur,
                                                            e.file_photo as file_photo,
                                                            t.message as message,
                                                            t.tanggal as tanggal

                                            FROM m_chat t 
                                            INNER JOIN m_entrepreneur e ON t.id_entrepreneur = e.id
                                            WHERE id_proposal = '$proposal_id' 
                                            ORDER BY t.tanggal asc";
                                    $qryChat = mysql_query($strQuery) or die(mysql_error());
                                    $count = 0;
                                    $position = "left";
                                    while ($arrQryChat=mysql_fetch_array($qryChat)) {
                                        $count++;
                                        if ($count % 2 == 0) {
                                            //genap
                                            $position = "left";
                                        } else {
                                            //ganjil
                                            $position = "right";
                                        }
                                ?>
                                <li class="<?php echo $position; ?> clearfix">
                                    <span class="chat-img pull-<?php echo $position; ?>">
                                        <img width="50" src="upload/photo_profile/<?php echo $arrQryChat['file_photo'];?>" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $arrQryChat['nama_entrepreneur']; ?></strong>
                                            <small class="pull-right text-muted">
                                                <!-- <i class="fa fa-clock-o fa-fw"></i> <span data-livestamp="<?php echo $arrQryChat['tanggal']; ?>"></span> -->
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo $arrQryChat['message']; ?>
                                        </p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="input-chat" type="text" class="form-control input-sm" placeholder="Ketik Pesan disini..." />
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
<div class="modal fade" id="myModalProposalkuAddSchedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAddSchedule" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelAddSchedule">Tambah Schedule</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formAddSchedule" action="system/create_undangan_service.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Tanggal Schedule :</label>
                                    <input type="text" name="tanggalSchedule" id="tanggalSchedule" class="form-control"  
                                    required 
                                    data-validation-required-message=""
                                    data-validation-email-message="" />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nama Schedule :</label>
                                    <input type="text" name="namaSchedule" class="form-control"  
                                    required 
                                    data-validation-required-message=""
                                    data-validation-email-message="" />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Deskripsi :</label>
                                    <input type="text" name="deskripsiSchedule" class="form-control"  
                                    required 
                                    data-validation-required-message=""
                                    data-validation-email-message="" />
                                </div>
                            </div>
                            <input name="proposal_id" type="hidden" value="<?php echo $proposal_id;?>">
                        </div>  
                    </div>                            
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="btn_simpan_add_schedule" class="btn btn-primary">Kirim</button>
                </form>    
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div class="modal fade" id="myModalProposalkuAjukanInvestor" tabindex="-1" role="dialog" aria-labelledby="myModalLabelInvestor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelInvestor">Undang Invenstor</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Masukan email entrepreneur yang ingin kamu Undang :</label>
                                <input type="email" id="emailEntrepreneurProposalkuInvestor" class="form-control"  
                                required 
                                data-validation-required-message="Masukan email kamu donk !"
                                data-validation-email-message="Email tidak valid !" />
                                <br/ >
                                <div id="msgEmailProposalkuInvestor"></div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row" id="rowAddKaryawanProposalkuInvestor"></div>                              
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" id="add_undangan_investor_proposalku" class="btn btn-default" >Add</button>
                <button type="button" id="kirim_undangan_investor_proposalku" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalProposalkuAjukanKaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ajukan Karyawan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="myTab" class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#haveUser" data-toggle="tab"><i class="fa fa-navicon"></i> Sudah Punya User</a>
                            </li>
                            <li class=""><a href="#havetUser" data-toggle="tab"><i class="fa fa-navicon"></i> Belum Punya User</a>
                            </li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="haveUser">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <label>Masukan email yang ingin kamu Ajukan :</label>
                                                <input type="email" id="emailEntrepreneurProposalku" class="form-control"  
                                                required 
                                                data-validation-required-message="Masukan email kamu donk !"
                                                data-validation-email-message="Email tidak valid !">
                                                <br/ >
                                                <div id="msgEmailProposalku"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                                <div class="row" id="rowAddKaryawanProposalku"></div>                              
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="button" id="add_undangan_karyawan_proposalku" class="btn btn-default" >Add</button>
                                <button type="button" id="kirim_undangan_karyawan_proposalku" class="btn btn-primary">Kirim</button>
                            </div>
                            <div class="tab-pane fade" id="havetUser">
                                <form role="form" id="formPegawaiNotUser" action="system/undang_pegawai_not_user_service.php" method="post" enctype="multipart/form-data">
                                    <div class="control-group form-group">
                                        <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Nama Lengkap :</label>
                                            <input name="nama" type="text" class="form-control"  required data-validation-required-message="Masukan nama lengkap kamu donk !">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label>Jenis Kelamin :</label>
                                        <div class="controls">
                                            <select name="jk" class="form-control">
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
                                            <label>Photo :</label>
                                            <input name="file2" type="file" />
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>CV :</label>
                                            <input name="file" type="file" />
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div id="success"></div>
                                    <!-- For success/fail messages -->
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button name="btn_simpan_not_user" type="submit" class="btn btn-primary">Ajukan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

    <!-- /.modal-dialog -->
</div>
<?php } ?>