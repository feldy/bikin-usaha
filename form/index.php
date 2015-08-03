<?php include "system/config_service.php";?>
<?php include "system/gen_uuid_service.php";?>
<?php include "system/gen_convert_without_tag.php";?>
<?php include "system/gen_tanggal.php";
session_start();
$textSearch = "";
if (isset($_POST['text_search_proposal'])) {
    $textSearch = $_POST['text_search_proposal'];
}

$tipeUser = "";
if (isset($_SESSION['tipe_user'])) {
    $tipeUser = $_SESSION['tipe_user'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bikin-Usaha.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="lib/datepicker/css/bootstrap-datepicker3.standalone.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Timeline CSS -->
    <link href="../css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- include summernote css/js-->
    <link href="lib/editor/dist/summernote.css" rel="stylesheet">
</head>

<body style='background-image: url("white_carbon.png");'>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Bikin-Usaha.com</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="col-md-10">
                            <form method="POST" action="?page=search_proposal">
                                <div class="input-group" style="margin-top: 9px; margin-right: 0px;">
                                <!-- slkdfjsldfjlsdjfl -->
                                    <input value="<?php echo $textSearch; ?>" name="text_search_proposal" type="text" class="form-control" placeHolder="Search Proposal">
                                    <span class="input-group-btn" style="display: block;">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </li>
                    <?php
                        $activeStatus = "";
                        if (isset($_GET['page'])) {
                            if ($_GET['page'] == "login") {
                                $activeStatus = "login";
                            } elseif ($_GET['page'] == "daftar") {
                                $activeStatus = "daftar";
                            } elseif ($_GET['page'] == "approval") {
                                $activeStatus = "approval";
                            } elseif ($_GET['page'] == "jenis_usaha") {
                                $activeStatus = "jenis_usaha";
                            } elseif ($_GET['page'] == "proposalku") {
                                $activeStatus = "proposalku";
                            }  elseif ($_GET['page'] == "buat_proposal") {
                                $activeStatus = "buat_proposal";
                            } elseif ($_GET['page'] == "join_usaha") {
                                $activeStatus = "join_usaha";
                            } elseif ($_GET['page'] == "my_account") {
                                $activeStatus = "my_account";
                            } elseif ($_GET['page'] == "search_proposal") {
                                $activeStatus = "search_proposal";
                            }
                        }
                        if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {} 
                        else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php 
                                $caption = "Approval";
                                if ($tipeUser == "Investor" || $tipeUser == "Pegawai") {
                                    $caption = "Undangan";
                                } else {
                            ?>
                            <li <?php if ($activeStatus == "buat_proposal") {echo "class='active'";} ?>>
                                <a href="?page=buat_proposal">Buat Proposal Usaha</a>
                            </li>
                            <li <?php if ($activeStatus == "jenis_usaha") {echo "class='active'";} ?>>
                                <a href="?page=jenis_usaha">Pengajuan Jenis Usaha Baru</a>
                            </li>
                            <?php } ?>
                            <li <?php if ($activeStatus == "approval") {echo "class='active'";} ?>>
                                <a href="?page=approval"><?php echo $caption;?></a>
                            </li>
                        </ul>
                    </li>
                    <?php } 
                    if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
                    ?>
                    <li <?php if ($activeStatus == "daftar") {echo "class='active'";} ?> >
                        <a href="?page=daftar">Coba Yuk Jadi Member!!</a>
                    </li>
                    <?php }
                        if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
                    ?>    
                    <li <?php if ($activeStatus == "login") {echo "class='active'";} ?> >
                        <a href="?page=login">Login</a>
                    </li>
                    <?php
                        } else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proposalku <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php 
                                $id_proposal = "";
                                if (isset($_GET['id_proposal'])) {
                                    $id_proposal = $_GET['id_proposal'];
                                }
                                $user_sid = $_SESSION['user_sid'];
                                $result = mysql_query("SELECT o.id as id, o.nama_proposal as nama_proposal FROM t_proposal_usaha o INNER JOIN m_jenis_usaha u on o.id_jenis_usaha = u.id and u.is_active = 1 where o.id_owner = '$user_sid' ") or die(mysql_error());
                                while($arr_result=mysql_fetch_array($result)){
                            ?>
                            <li <?php if($id_proposal == $arr_result['id']) {echo "class='active'";} ?> >
                                <a href="?page=proposalku&id_proposal=<?php echo $arr_result['id'];?>"><?php echo $arr_result['nama_proposal'];?></a>
                            </li>
                            <?php } ?>

                            <!-- separator -->
                            <li role="separator" class="divider"></li>
                            <?php 
                                $id_proposal = "";
                                if (isset($_GET['id_proposal'])) {
                                    $id_proposal = $_GET['id_proposal'];
                                }
                                $user_sid = $_SESSION['user_sid'];
                                $result = mysql_query("SELECT o.id_proposal_usaha as id_proposal_usaha, p.nama_proposal as nama_proposal  FROM t_anggota_proposal_usaha o INNER JOIN t_proposal_usaha p ON o.id_proposal_usaha = p.id INNER JOIN m_jenis_usaha u on p.id_jenis_usaha = u.id and u.is_active = 1 where o.id_entrepreneur = '$user_sid' and status = 'APPROVED' group by o.id  ") or die(mysql_error());
                                while($arr_result=mysql_fetch_array($result)){                                
                            ?>
                            <li <?php if($id_proposal == $arr_result['id_proposal_usaha']) {echo "class='active'";} ?> >
                                <a href="?page=proposalku&id_proposal=<?php echo $arr_result['id_proposal_usaha'];?>"><?php echo $arr_result['nama_proposal'];?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li <?php if ($activeStatus == "logout") {echo "class='active'";} ?>>
                        <a href="system/logout_service.php">Logout</a>
                    </li>
                    <li>
                        <a href="?page=my_account&user_id=<?php echo $_SESSION['user_sid'];?>"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['user_nama']; ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "login") {
                } elseif ($_GET['page'] == "daftar") {
                } elseif ($_GET['page'] == "jenis_usaha") {
                } elseif ($_GET['page'] == "approval") {
                } elseif ($_GET['page'] == "proposalku") {
                } elseif ($_GET['page'] == "buat_proposal") {
                } elseif ($_GET['page'] == "join_usaha") {
                } elseif ($_GET['page'] == "my_account") {
                } elseif ($_GET['page'] == "search_proposal") {
                } elseif ($_GET['page'] == "vw_user") {
                } elseif ($_GET['page'] == "vw_owner") {
                } else {
                    include("halaman_utama.php");
                }
        } else {
            include("halaman_utama.php");
        }

    ?>

    <!-- Page Content -->
    <div class="container">
        <?php
            if (isset($_GET['page'])) {
                if ($_GET['page'] == "login") {
                    include("login.php");
                } elseif ($_GET['page'] == "daftar") {
                    include("daftar_baru.php");
                } elseif ($_GET['page'] == "jenis_usaha") {
                    include("pengajuan_jenis_usaha_baru.php");
                } elseif ($_GET['page'] == "approval") {
                    include("approval.php");
                } elseif ($_GET['page'] == "proposalku") {
                    include("proposalku.php");
                } elseif ($_GET['page'] == "buat_proposal") {
                    include("buat_proposal.php");
                } elseif ($_GET['page'] == "join_usaha") {
                    include("join_usaha.php");
                } elseif ($_GET['page'] == "my_account") {
                    include("my_account.php");
                } elseif ($_GET['page'] == "search_proposal") {
                    include("search_proposal.php");
                } elseif ($_GET['page'] == "vw_user") {
                    include("vw_user.php");
                } elseif ($_GET['page'] == "vw_owner") {
                    include("vw_owner.php");
                } else {
                    // include("halaman_utama.php");
                }
            }   else {
                // include("halaman_utama.php");
            }          
        ?>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Feldy Yusuf 2015 | Universitas Mercubuana</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="lib/jquery.form.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- //other lib -->
    <script src="lib/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="lib/editor/dist/summernote.min.js"></script>
    <script src="lib/moment.min.js"></script>
    <script src="lib/livestamp.js"></script>
    <script src="lib/jquery.number.js"></script>
    <script src="js/main.js"></script>
    <script src="js/action.js"></script>
    <script src="js/action.js"></script>


    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <!-- // <script src="../js/contact_me.js"></script> -->

</body>

</html>
