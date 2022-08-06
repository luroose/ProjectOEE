<?php
session_start();
include "config.php";
if (empty($_SESSION["status"]) || $_SESSION["status"] !== "Admin") {
    header('Location: index.php');
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>กรอกข้อมูล</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top" style="font-family: 'Pridi', serif;">
    <?php
    $date = date("Y-m-d H:i:s");
    if (isset($_POST["submit"])) {
        $arr1 = array(
            $_POST["txt2"],
            $_POST["txt3"],
            $_POST["txt4"],
            $_POST["txt7"],
            $_POST["txt5"],
            $_POST["txt6"],
            $_POST["txt1"]
        );
        $sql = "INSERT INTO `employee` (`E_id`, `EName`, `Econ`, `Epro`, `Edel` , `Etime`, `Etimet`, `DATE`) VALUES (NULL, '" . $arr1[0] . "', '" . $arr1[1] . "', '" . $arr1[2] . "', '" . $arr1[3] . "' , '" . $arr1[4] . "', '" . $arr1[5] . "', '" . $arr1[6] . "');";

        $date1 = new DateTime($arr1[4]);
        $date2 = new DateTime($arr1[5]);

        // The diff-methods returns a new DateInterval-object...
        $diff = $date2->diff($date1);


        $re = mysqli_query($conn, $sql);

        if ($re) {
            echo '<script>alert("[บันทึกสำเร็จ]")</script>';
            echo "<script>window.location='form.php?x1=" . $arr1[1] . "&x2=" . $arr1[3] . "&x3=" . $diff->format('%h') . "&x4=" . $arr1[6] . "'</script>";
        } else {
            echo '<script>alert("บันทึกไม่สำเร็จ")</script>';
        }
    }

    ?>

    <body id="page-top" style="font-family: 'Kanit', sans-serif;">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: rgb(28 134 238);" id="accordionSidebar">


                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                    <div class="">
                        <img src="img/logo.png" height="65px" width="140px">
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    form
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>แบบฟอร์ม</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">แบบฟอร์มการทำงาน:</h6>
                            <a class="collapse-item" href="form.php">กรอกข้อมูล</a>
                            <a class="collapse-item" href="tables.php">บันทึกยอดผลิตประจำวัน</a>
                            <a class="collapse-item" href="user.php">จัดการข้อมูลผู้ใช้</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Report
                </div>
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="charts.php">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>กราฟ</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>บันทึกยอดผลิตประจำวัน</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">

                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Name : <?php echo $_SESSION["user"] ?> <br>Status : <?php echo $_SESSION["status"] ?> </span>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> </span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ออกจากระบบ
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <form action="addtables.php" method="post" class="needs-validation" novalidate>


                        <div class="container">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="m-0 font-weight-bold text-primary h5">เพิ่มข้อมูล</div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="col-form-label-sm"> วันที่ : </div>
                                                        <input type="DATE" class="form-control form-control-sm " id="txt1" name="txt1" placeholder="" required>
                                                        <div class="invalid-feedback">
                                                            กรุณาใส่ข้อมูลให้ครบ
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="col-form-label-sm">ชื่อ :</div>
                                                        <input type="text" class="form-control form-control-sm" id="txt2" name="txt2" placeholder="" required>
                                                        <div class="invalid-feedback">
                                                            กรุณาใส่ข้อมูลให้ครบ
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="col-form-label-sm">ชิ้นงานที่ทำได้ : </div>
                                                        <input type="" class="form-control form-control-sm " id="txt3" name="txt3" placeholder="" required>
                                                        <div class="invalid-feedback">
                                                            กรุณาใส่ข้อมูลให้ครบ
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="col-form-label-sm">รุ่นที่ผลิต :</div>
                                                        <input type="text" class="form-control form-control-sm" id="txt4" name="txt4" placeholder="" required>

                                                        <div class="invalid-feedback">
                                                            กรุณาใส่ข้อมูลให้ครบ
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="col-form-label-sm">ของเสีย : </div>
                                                        <input type="" class="form-control form-control-sm " id="txt7" name="txt7" placeholder="" required>
                                                        <div class="invalid-feedback">
                                                            กรุณาใส่ข้อมูลให้ครบ
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <div class="col-form-label-sm">เวลาเข้างาน : </div>
                                                            <input type="time" class="form-control form-control-sm " id="txt5" name="txt5" placeholder="" required>
                                                            <div class="invalid-feedback">
                                                                กรุณาใส่ข้อมูลให้ครบ
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="col-form-label-sm">เวลาออกงาน :</div>
                                                            <input type="time" class="form-control form-control-sm" id="txt6" name="txt6" placeholder="" required>

                                                            <div class="invalid-feedback">
                                                                กรุณาใส่ข้อมูลให้ครบ
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block btn-sm" name="submit">บันทึก</button>
                                                        <a href="tables.php"><button type="button" class="btn btn-danger btn-sm btn-user btn-block mt-3" name="Back">กลับ </button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </form>
                    </script>
                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <!-- Core plugin JavaScript-->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="js/sb-admin-2.min.js"></script>
                    <script>
                        (function() {
                            'use strict'

                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.querySelectorAll('.needs-validation')

                            // Loop over them and prevent submission
                            Array.prototype.slice.call(forms)
                                .forEach(function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (!form.checkValidity()) {
                                            event.preventDefault()
                                            event.stopPropagation()
                                        }

                                        form.classList.add('was-validated')
                                    }, false)
                                })
                        })()
                    </script>
    </body>

</html>