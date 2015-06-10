<?php include "system/config_service.php";?>
<?php include "system/gen_uuid_service.php";?>

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

<body>

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
                <a class="navbar-brand" href="halaman_utama.php">Bikin-Usaha.com</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
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
                            }
                        }
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li <?php if ($activeStatus == "buat_proposal") {echo "class='active'";} ?>>
                                <a href="?page=buat_proposal">Buat Proposal Usaha</a>
                            </li>
                            <li <?php if ($activeStatus == "jenis_usaha") {echo "class='active'";} ?>>
                                <a href="?page=jenis_usaha">Pengajuan Jenis Usaha Baru</a>
                            </li>
                            <li <?php if ($activeStatus == "approval") {echo "class='active'";} ?>>
                                <a href="?page=approval">Approval</a>
                            </li>
                            <li <?php if ($activeStatus == "proposalku") {echo "class='active'";} ?>>
                                <a href="?page=proposalku">ProposalKu</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if ($activeStatus == "daftar") {echo "class='active'";} ?>>
                        <a href="?page=daftar">Coba Yuk Jadi Member!!</a>
                    </li>
                    <li <?php if ($activeStatus == "join_usaha") {echo "class='active'";} ?>>
                        <a href="?page=join_usaha">Join!!</a>
                    </li>
                    <li <?php if ($activeStatus == "login") {echo "class='active'";} ?>>
                        <a href="?page=login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

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
                }
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
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- //other lib -->
    <script src="lib/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="lib/editor/dist/summernote.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/action.js"></script>


    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <!-- // <script src="../js/contact_me.js"></script> -->

</body>

</html>
