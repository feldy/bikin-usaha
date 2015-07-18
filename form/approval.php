<?php 

// session_start();
if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
    echo "<script>location='?page=login'</script>";
    // echo "string";
} else {
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Approval
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Calon Investor yang belum di Konfirmasi !
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Proposal Usaha</th>
                                <th>Nama Anggota</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $user = $_SESSION['user_sid'];
                                $strQryApproval = " SELECT      t.id as id_anggota_proposal_usaha, 
                                                                tp.id as id_proposal_usaha, 
                                                                tp.nama_proposal as nama_proposal_usaha, 
                                                                t.tipe_anggota as tipe,
                                                                t.status as status,
                                                                e.nama as nama_anggota 
                                                    FROM        t_anggota_proposal_usaha t 
                                                    INNER JOIN  t_proposal_usaha tp ON t.id_proposal_usaha = tp.id
                                                    INNER JOIN  m_entrepreneur e ON t.id_entrepreneur = e.id
                                                    WHERE       t.id_proposal_usaha in (select id from t_proposal_usaha rr where rr.id_owner = '$user')
                                                    AND         t.tipe_anggota = 'investor'
                                                    ORDER BY    t.status asc, t.tanggal desc
                                                    ";
                                // echo $strQryApproval;
                                $qryApproval = mysql_query($strQryApproval) or die (mysql_error());
                                $count = 0;
                                $approved = "";
                                $reject = "";
                                while ($arrApproval = mysql_fetch_array($qryApproval)) {
                                    $count++;
                                    if ($arrApproval['status'] == "APPROVED") {
                                        $approved = "<span style='color: green;'><i class='fa fa-check-circle-o'></i><strong> APPROVED</strong></span>";
                                    } else {
                                        $approved = "<a href='system/approval_service.php?proses=approved&tipe_anggota=investor&id=".$arrApproval['id_anggota_proposal_usaha']."' >APPROVED</a>";
                                    }

                                    if ($arrApproval['status'] == "REJECTED") {
                                        $reject = "<span style='color: red;'><i class='fa fa-ban'></i><strong> REJECTED</strong></span>";
                                    } else {
                                        $reject = "<a href='system/approval_service.php?proses=reject&id=".$arrApproval['id_anggota_proposal_usaha']."'>REJECTED</a>";
                                    }

                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arrApproval['nama_proposal_usaha']; ?></td>
                                <td><?php echo $arrApproval['nama_anggota']; ?></td>

                                <td><?php echo $approved;?> | <?php echo $reject; ?></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Calon Pegawai/Karyawan yang belum di Konfirmasi !
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Proposal Usaha</th>
                                <th>Nama Anggota</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $user = $_SESSION['user_sid'];
                                $strQryApproval = " SELECT      t.id as id_anggota_proposal_usaha, 
                                                                tp.id as id_proposal_usaha, 
                                                                tp.nama_proposal as nama_proposal_usaha, 
                                                                t.tipe_anggota as tipe,
                                                                t.status as status,
                                                                e.nama as nama_anggota 
                                                    FROM        t_anggota_proposal_usaha t 
                                                    INNER JOIN  t_proposal_usaha tp ON t.id_proposal_usaha = tp.id
                                                    INNER JOIN  m_entrepreneur e ON t.id_entrepreneur = e.id
                                                    WHERE       t.id_proposal_usaha in (select id from t_proposal_usaha rr where rr.id_owner = '$user')
                                                    AND         t.tipe_anggota = 'pegawai'
                                                    ORDER BY    t.status asc, t.tanggal desc
                                                    ";
                                // echo $strQryApproval;
                                $qryApproval = mysql_query($strQryApproval) or die (mysql_error());
                                $count = 0;
                                $approved = "";
                                $reject = "";
                                while ($arrApproval = mysql_fetch_array($qryApproval)) {
                                    $count++;
                                    if ($arrApproval['status'] == "APPROVED") {
                                        $approved = "<span style='color: green;'><i class='fa fa-check-circle-o'></i><strong> APPROVED</strong></span>";
                                    } else {
                                        $approved = "<a href='system/approval_service.php?proses=approved&tipe_anggota=pegawai&id=".$arrApproval['id_anggota_proposal_usaha']."' >APPROVED</a>";
                                    }

                                    if ($arrApproval['status'] == "REJECTED") {
                                        $reject = "<span style='color: red;'><i class='fa fa-ban'></i><strong> REJECTED</strong></span>";
                                    } else {
                                        $reject = "<a href='system/approval_service.php?proses=reject&tipe_anggota=pegawai&id=".$arrApproval['id_anggota_proposal_usaha']."' >REJECTED</a>";
                                    }

                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arrApproval['nama_proposal_usaha']; ?></td>
                                <td><?php echo $arrApproval['nama_anggota']; ?></td>

                                <td><?php echo $approved;?> | <?php echo $reject; ?> </a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Undangan
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Daftar Undangan !
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Proposal Usaha</th>
                                <th>Nama Pengirim</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $user = $_SESSION['user_sid'];
                                $strQryApproval = " SELECT      tp.id as id_proposal_usaha, 
                                                                tp.nama_proposal as nama_proposal_usaha,
                                                                e.nama as from_id,
                                                                e2.nama as to_id
                                                    FROM        m_undangan u 
                                                    INNER JOIN  t_proposal_usaha tp ON u.proposal_id = tp.id
                                                    INNER JOIN  m_entrepreneur e ON u.from_id = e.id
                                                    INNER JOIN  m_entrepreneur e2 ON u.to_id = e2.id
                                                    WHERE       u.to_id = '$user'
                                                    ";
                                // echo $strQryApproval;
                                $qryApproval = mysql_query($strQryApproval) or die (mysql_error());
                                $count = 0;
                                $join = "";
                                
                                while ($arrApproval = mysql_fetch_array($qryApproval)) {
                                    $count++;
                                    // if ($arrApproval['status'] == "APPROVED") {
                                    //     $join = "<span style='color: green;'><i class='fa fa-check-circle-o'></i><strong> JOINED</strong></span>";
                                    // } else {
                                    //     $join = "<a href='#' >JOIN</a>";
                                    // }

                                    // if ($arrApproval['status'] == "REJECT") {
                                    //     $reject = "<span style='color: red;'><i class='fa fa-ban'></i><strong> REJECT</strong></span>";
                                    // } else {
                                    //     $reject = "<a href='#' >REJECT</a>";
                                    // }

                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arrApproval['nama_proposal_usaha']; ?></td>
                                <td><?php echo $arrApproval['from_id']; ?></td>

                                <td><a href='index.php?page=join_usaha&id_proposal=<?php echo $arrApproval["id_proposal_usaha"];?>' >JOIN</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>