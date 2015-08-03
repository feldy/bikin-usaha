<?php 

// session_start();
if (empty($_SESSION['email']) || empty($_SESSION['password']) ) {
    echo "<script>location='?page=login'</script>";
    // echo "string";
} else {
   $id_user = $_GET['id_user'];
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
                <?php
                    $strSQL = "SELECT * FROM m_entrepreneur where id = '$id_user'";
                    $sql = mysql_query($strSQL) or die(mysql_error());
                    $arr = mysql_fetch_array($sql);
                ?>

                <fieldset>
                    <legend>Persyaratan KTP</legend>
                    <p>
                        <?php 

                            if ($arr['file_ktp'] == "") {
                                echo "<h2>BELUM DILAMPIRKAN</h2>";
                            } else {
                                ?>
                                    <img src="upload/document/<?php echo $arr['file_ktp']; ?>">
                                <?php
                            }  
                        ?>
                    </p>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                    $strSQL = "SELECT * FROM m_entrepreneur where id = '$id_user'";
                    $sql = mysql_query($strSQL) or die(mysql_error());
                    $arr = mysql_fetch_array($sql);
                ?>

                <fieldset>
                    <legend>Persyaratan NPWP</legend>
                    <p>
                        <?php 

                            if ($arr['file_npwp'] == "") {
                                echo "<h2>BELUM DILAMPIRKAN</h2>";
                            } else {
                                ?>
                                    <img src="upload/document/<?php echo $arr['file_npwp']; ?>">
                                <?php
                            }  
                        ?>
                    </p>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                    $strSQL = "SELECT * FROM m_entrepreneur where id = '$id_user'";
                    $sql = mysql_query($strSQL) or die(mysql_error());
                    $arr = mysql_fetch_array($sql);
                ?>

                <fieldset>
                    <legend>Biodata Pribadi</legend>
                    <p>
                        <?php 

                            if ($arr['file_biodata'] == "") {
                                echo "<h2>BELUM DILAMPIRKAN</h2>";
                            } else {
                                ?>
                                    <a href="upload/document/<?php echo $arr['file_biodata']; ?>">DOWNLOAD</a>
                                <?php
                            }  
                        ?>
                    </p>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<?php } ?>