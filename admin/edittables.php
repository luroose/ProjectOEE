<?php
session_start();
include "config.php";
if (isset($_GET["id"])) {
    $sql = "SELECT * FROM `employee` WHERE E_id ='" . $_GET["id"] . "'";
    $re = mysqli_query($conn, $sql);
    $op = mysqli_fetch_assoc($re);
}
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

</head>

<body id="page-top" style="font-family: 'Pridi', serif;">
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
                        <a class="collapse-item" href="tables.php">ตารางข้อมูล</a>
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
                    <span>บันทึกผลผลิตประจำวัน</span></a>
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
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <form action="tables.php" method="post" class="needs-validation" novalidate>

                    <div class="container">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="m-0 font-weight-bold text-primary h5">แก้ไขข้อมูล</div>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="col-sm-12 mb-3 mb-sm-0 mx-auto">
                                        <div class="col-form-label-sm"> วันที่ : </div>
                                        <input type="DATE" class="form-control form-control-sm " id="txt6" name="txt6" placeholder="" required value="<?php echo $op['DATE'] ?>">
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                        <div class=" row">
                                            <div class="col-sm-6">
                                                <div class="col-form-label-sm">ลำดับ : </div>
                                                <input type="number" class="form-control form-control-sm " id="txt0" name="txt0" placeholder="" required value="<?php echo $op['E_id'] ?>">
                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="col-form-label-sm">ชื่อ :</div>
                                                <input type="text" class="form-control form-control-sm" id="txt1" name="txt1" placeholder="" required value="<?php echo $op['EName'] ?>">

                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-sm-6 ">
                                                <div class="col-form-label-sm">ชิ้นงานที่ทำได้ : </div>
                                                <input type="number" class="form-control form-control-sm " id="txt2" name="txt2" placeholder="" required value="<?php echo $op['Econ'] ?>">
                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="col-form-label-sm">รุ่นที่ผลิต :</div>
                                                <input type="text" class="form-control form-control-sm" id="txt3" name="txt3" placeholder="" required value="<?php echo $op['Epro'] ?>">

                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-sm-6 ">
                                                <div class="col-form-label-sm">ของเสีย : </div>
                                                <input type="number" class="form-control form-control-sm " id="txt6" name="txt6" placeholder="" required value="<?php echo $op['Econ'] ?>">
                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                        <div class=" row">
                                            <div class="col-sm-6 ">
                                                <div class="col-form-label-sm">เวลาเข้างาน : </div>
                                                <input type="time" class="form-control form-control-sm " id="txt4" name="txt4" placeholder="" required value="<?php echo $op['Etime'] ?>">
                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="col-form-label-sm">เวลาออกงาน :</div>
                                                <input type="time" class="form-control form-control-sm" id="txt5" name="txt5" placeholder="" required value="<?php echo $op['Etimet'] ?>">

                                                <div class="invalid-feedback">
                                                    กรุณาใส่ข้อมูลให้ครบ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6"><button type="submit" class="btn btn-primary btn-user btn-block btn-sm" name="submit">บันทึก</button></div>
                                            <div class="col-6"><a href="tables.php"><button type="button" class="btn btn-danger btn-sm btn-user btn-block " name="Back">กลับ </button></a></div>

                                           
                                        </div>
                                        <br> 
                                    </div>

                                </div>

                            </div>
                </form>
                </script>
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">คุณแน่ใจนะว่าจะออกจากระบบ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
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