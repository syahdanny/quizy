<?php 

include '../../conSQL.php';

$idQuiz = $_POST["idQuiz"];

$query="SELECT * FROM tb_quiz WHERE id=$idQuiz";
$result=mysqli_query($con,$query);

$quiz='';
if(mysqli_num_rows($result)==1){
    $quiz=mysqli_fetch_assoc($result);
}else{
    echo "Quiz tidak ditemukan";
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>Quizy - Admin</title>
    <!-- Custom CSS -->
    <link href="../../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/quill/dist/quill.snow.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="route.php?module=adminQuiz">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="profile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
<div id="content">
        <div id="content-wrapper">

            <!-- include content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <form action="../process/actionPlay.php" method="POST">
                            <?php
                            $query = "SELECT * FROM tb_soal WHERE quiz_id=$idQuiz ORDER BY RAND()";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0){
                                $index = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $soal_id = $row["id"];
                            ?>
                            
                            <div id="section<?php echo $index; ?>">  
                                <div class="card border-success mt-5 mb-5">
                                    <div class="card-header">Soal Nomor <?php echo $index; ?></div>
                                    <div class="card-body text-success">
                                        <?php echo $row["soal"]; ?>     
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        $query_pilihan = "SELECT * FROM tb_pilihan WHERE soal_id=$soal_id ORDER BY RAND()";
                                        $result_pilihan = mysqli_query($con, $query_pilihan);

                                        if (mysqli_num_rows($result_pilihan) > 0){
                                            while($row_pilihan = mysqli_fetch_assoc($result_pilihan)){

                                        ?>

                                        <div class="radio-toolbar">
                                            <input type="radio" id="radio<?php echo $row_pilihan["id"]?>" name="soal<?php echo $row["id"]?>" value="<?php echo $row_pilihan["id"]?>">
                                            <label for="radio<?php echo $row_pilihan["id"]?>"><?php echo $row_pilihan["pilihan"]?></label>
                                        </div>

                                        <?php 
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <?php 
                                $index++;
                                }
                            }
                            // close mysql connection
                            mysqli_close($con); 
                            ?>
                            <input type="hidden" name="idQuiz" value="<?php echo $idQuiz ?>">
                            <button id="selesai" type="submit" name="selesai" class="btn btn-primary btn-block mb-5"><h1 class="text-light ">Selesai</h1></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/libs/moment/min/moment.min.js"></script>
    <script src="../../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../../dist/js/pages/calendar/cal-init.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>

    
    <script>
    var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>