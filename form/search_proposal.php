<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pencarian
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            http://localhost/bikin-usaha/form/index.php?page=join_usaha&id_proposal=1bd13079-2969-4ee4-a6d0-6de41d45c93b
                $strQuery = "   SELECT      p.nama_proposal as nama_proposal,
                                            p.id as id_proposal,
                                            p.tanggal as tanggal_proposal,
                                            p.informasi_proposal as informasi_proposal,
                                            j.pic_1 as gambar_1,
                                            e.nama as nama_entrepreneur
                                FROM        t_proposal_usaha p 
                                INNER JOIN  m_jenis_usaha j ON p.id_jenis_usaha = j.id
                                INNER JOIN  m_entrepreneur e ON p.id_owner = e.id
                                WHERE       p.nama_proposal like '%$textSearch%'
                            ";
                $qry = mysql_query($strQuery) or die(mysql_error());
                while ($arrQry=mysql_fetch_array($qry)) {
                $line = $arrQry['informasi_proposal'];
                if (preg_match('/^.{1,360}\b/s',  $arrQry['informasi_proposal'], $match)) {
                    $line=$match[0]."...";
                }
            ?>
            <!-- First Blog Post -->
            <h2>
                <a href="index.php?page=join_usaha&id_proposal=<?php echo $arrQry['id_proposal'];?>"><?php echo $arrQry['nama_proposal'];?></a>
            </h2>
            <p class="lead">
                by <?php echo $arrQry['nama_entrepreneur'];?>
            </p>
            <p><i class="fa fa-clock-o"></i> Dibuat tanggal <?php getTanggal($arrQry['tanggal_proposal']); ?></p>
            <img class="img-responsive img-hover" src="upload/images/<?php echo $arrQry['gambar_1']; ?>" alt="">
            <hr>
            <p><?php echo $line;?></p>
            <a class="btn btn-primary" href="index.php?page=join_usaha&id_proposal=<?php echo $arrQry['id_proposal'];?>">Selengkapnya <i class="fa fa-angle-right"></i></a>

            <hr>
            <?php } ?>
        </div>
    </div>
    <!-- /.row -->