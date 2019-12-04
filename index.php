<?php
    error_reporting(0);
	session_start();
	$koneksi = new mysqli  ("localhost","root","","kas");

	if($_SESSION['admin'] || $_SESSION['user']){
	$tgl4 = date("d-m-Y");

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kas Bem</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="font-size: 25px;">KAS BEM</a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : <?php echo date('d F Y', strtotime($tgl4)); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <?php
                           if($_SESSION['admin']){
                                $user_l=$_SESSION['admin'];

                           }elseif ($_SESSION['user']) {
                                $user_l=$_SESSION['user'];
                           }

                           $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                           $data_u = $sql_u->fetch_assoc();
                        ?>

                     <a>Hai, <?php echo $data_u['username']; ?>&nbsp;&nbsp;<img src="images/<?php echo $data_u['foto']; ?>" alt="" width="75" height="50" style=""></a></li>
					</li>


                    <li>
                        <a  href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>


                    <li>
                        <a  href="?page=masuk"><i class="glyphicon glyphicon-floppy-save"></i> Kas Masuk</a>
                    </li>

                    <li>
                        <a  href="?page=keluar"><i class="glyphicon glyphicon-floppy-open"></i> Kas Keluar</a>
                    </li>

                     <li>
                        <a  href="?page=rekap"><i class="glyphicon glyphicon-th"></i>Rekapitulasi</a>
                    </li>

                    <?php if ($_SESSION['admin']) {?>
                     <li>
                        <a  href="?page=user"><i class="glyphicon glyphicon-user"></i>Manajemen User</a>
                    </li>
                     <?php } ?>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                     	<?php

                     		$page= $_GET['page'];
                     		$aksi = $_GET['aksi'];

                     		if ($page == "masuk") {
                     			if ($aksi == "") {
                     				include "page/kas_masuk/kas_masuk.php";
                     			}if ($aksi == "hapus") {
                     				include "page/kas_masuk/hapus.php";
                     			}
                     		}else if ($page == "keluar") {
                     			if ($aksi == "") {
                     				include "page/kas_keluar/kas_keluar.php";
                     			}
                     		}else if ($page == "rekap") {
                     			if ($aksi == "") {
                     				include "page/rekap/rekap.php";
                     			}
                     		}else if ($page == "user") {
                     			if ($aksi == "") {
                     				include "page/user/user.php";
                     			}
													if ($aksi == "tambah") {
                     				include "page/user/tambah.php";
                     			}

													if ($aksi == "ubah") {
                     				include "page/user/ubah.php";
                     			}
													if ($aksi == "hapus") {
                     				include "page/user/hapus.php";
                     			}
                     		}else if ($page=="") {
                     			include "home.php";
                     		}
                     	?>

                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>



    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php
    }else{
        header("location:login.php");
    }
?>
