<?php 

// session_start();
if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
    echo "<script>location='?page=login'</script>";
    // echo "string";
} else {
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
    <div class="col-lg-12">
        <h1 class="page-header">View
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                        $ownerID = $map['id_owner'];
                        $proposal_id = $map['proposal_id'];
                        $doc = $map['doc'];
                        $sql = mysql_query("SELECT * FROM t_proposal_usaha o where o.id_owner = '$ownerID' ") or die(mysql_error());
                        $sql2 = mysql_query("SELECT * FROM t_anggota_proposal_usaha o where o.id_entrepreneur = '$ownerID' and o.status = 'APPROVED' ") or die(mysql_error());
                        $numArr = mysql_num_rows($sql);
                        $numArr2 = mysql_num_rows($sql2);
                    ?>
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
        </div>
    </div>
</div>
<?php } ?>