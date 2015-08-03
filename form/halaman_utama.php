<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
            //find proposal paling terbaru (TODO: paling banyak klik atau Donatur terbesar)
            $result = mysql_query("SELECT s.pic_1 as gambar1, o.nama_proposal as nama, o.id as id_proposal FROM t_proposal_usaha o INNER JOIN m_jenis_usaha s on o.id_jenis_usaha = s.id and s.is_active = 1 order by o.tanggal desc LIMIT 0, 10 ") or die(mysql_error());
            $count = 0;
            $active = "";
            while($arr_result=mysql_fetch_array($result)){
                if ($count == 0) {
                    $active = "active";
                } else {
                    $active = "";
                }
                $count++;
                $photo = $arr_result['gambar1'];
                $id_proposal = $arr_result['id_proposal'];
            ?>
            <div class="item <?php echo $active; ?>">
                <div class="fill" style="background-image:url('upload/images/<?php echo $photo; ?>');"></div>
                <div class="carousel-caption" >
                    
                    <a href="?page=join_usaha&id_proposal=<?php echo $id_proposal; ?>" class="btn btn-primary">Join Usaha <?php echo $arr_result['nama'];?></a>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<!-- Page Content -->
<div class="container">
    <div class="row">
            
        </div>
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Hot! Proposal
            </h1>
        </div>
        <?php
            //tampilkan semua proposal yang sudah dibuat berdasarkan lowongan investor dan karyawan yang available
            $result = mysql_query("SELECT s.pic_1 as gambar1, o.nama_proposal as nama, o.id as id_proposal, o.informasi_proposal as informasi, o.kota as kota FROM t_proposal_usaha o INNER JOIN m_jenis_usaha s on o.id_jenis_usaha = s.id and s.is_active = 1 order by o.tanggal desc LIMIT 0, 10 ") or die(mysql_error());
            $count = 0;
            $active = "";
            while($arr_result=mysql_fetch_array($result)){
                $id_proposal = $arr_result['id_proposal'];
                $photo = $arr_result['gambar1'];
                $line = $arr_result['informasi'];
                if (preg_match('/^.{1,360}\b/s',  $arr_result['informasi'], $match))
                {
                    $line=$match[0];
                }
        ?>
            <div class="col-md-4 img-portfolio">
                <a href="?page=join_usaha&id_proposal=<?php echo $id_proposal; ?>">
                    <img class="img-responsive img-hover" style="max-height: 125px;" src="upload/images/<?php echo $photo; ?>" alt="">
                </a>
                <h3>
                    <a href="?page=join_usaha&id_proposal=<?php echo $id_proposal; ?>"><?php echo $arr_result['nama']; ?></a>
                </h3>
                <h6><i class="fa fa-fw fa-map-marker"></i>Lokasi <?php echo $arr_result['kota']; ?></h6>
                <p><?php echo $line.". . ."; ?></p>
            </div>
        <?php } ?>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Jenis Usaha Terbaru
            </h1>

        </div>
    </div>
    
    <div class="row">
        <?php 
            $result = mysql_query("SELECT * FROM m_jenis_usaha o where o.is_active = 1 order by tanggal desc  LIMIT 0, 5 ") or die(mysql_error());
            $count = 0;
            while($arr_result=mysql_fetch_array($result)){

            $line = $arr_result['deskripsi'];
            if (preg_match('/^.{1,560}\b/s',  $arr_result['deskripsi'], $match))
            {
                $line=$match[0];
            }
        ?>
            <!-- <div class="row"> -->
                <div class="col-md-6 img-portfolio">
                    <div id="carousel-example-generic-<?php echo $count;?>" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                                $active = 0;
                                $sActive = "";
                                $pic1 = $arr_result['pic_1'];   
                                $pic2 = $arr_result['pic_2'];   
                                $pic3 = $arr_result['pic_3'];   
                                $pic4 = $arr_result['pic_4'];   

                                if ($pic1 != NULL && $pic1 != "") {
                                    $active = 1;
                                    echo '<li data-target="#carousel-example-generic-'.$count.'" data-slide-to="0" class="active"></li>';
                                }

                                if ($pic2 != NULL && $pic2 != "") {
                                    if ($active = 0) {
                                        $sActive = 'class="active"';
                                    }
                                    echo '<li data-target="#carousel-example-generic-'.$count.'" data-slide-to="1" $sActive ></li>';
                                }

                                if ($pic3 != NULL && $pic3 != "") {
                                    if ($active = 0) {
                                        $sActive = 'class="active"';
                                    }
                                    echo '<li data-target="#carousel-example-generic-'.$count.'" data-slide-to="2" $sActive ></li>';
                                }

                                if ($pic4 != NULL && $pic4 != "") {
                                    if ($active = 0) {
                                        $sActive = 'class="active"';
                                    }
                                    echo '<li data-target="#carousel-example-generic-'.$count.'" data-slide-to="3" $sActive ></li>';
                                }
                            ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                             <?php
                                $active = 0;
                                $sActive = "";
                                $pic1 = $arr_result['pic_1'];   
                                $pic2 = $arr_result['pic_2'];   
                                $pic3 = $arr_result['pic_3'];   
                                $pic4 = $arr_result['pic_4'];   

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
                        <a class="left carousel-control" href="#carousel-example-generic-<?php echo $count;?>" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic-<?php echo $count;?>" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                    <h3>
                        <a href="#"><?php echo $arr_result['nama']; ?></a>
                    </h3>
                    <ul>
                        <!-- <li>Modal <strong>Rp. <?php echo number_format($arr_result['modal'], 0); ?></strong></li> refisi bu NIA-->
                        <li>Membutuhkan <strong><?php echo number_format($arr_result['max_jumlah_pegawai'], 0); ?> Orang</strong> Pegawai</li>
                        <li>Kategori <strong><?php echo $arr_result['kategori_jenis']; ?></strong></li>
                    </ul>
                    <p><?php echo strip_tags($line.". . .", "<rr>"); ?></p>
                </div>
        <?php 
                $count++;
            } 
        ?>
    </div>
    <!-- /.row -->
</div> 