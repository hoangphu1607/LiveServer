<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <base href="http://localhost:8080/liveserver/">
    <!--  <base href="http://localhost/LiveServer/">  -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Thư viện Vlute</title>

    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="public/css/nhatnam.css" rel="stylesheet">
    <link rel="stylesheet" href="hoangphu.css">
    <link href="public/css/admin.css" rel="stylesheet">
    <link href="public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type= "text/javascript" src="public/jquery/jquery-3.6.0.min.js" > </script>
    <script type= "text/javascript" src="public/js/loadhinh.js"> </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-nam sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="public/img/logo_vlute.png" alt="logo trường đại học sư phạm kỹ thuật vĩnh long" id="logo_truong">
                </div>
                <div class="sidebar-brand-text mx-3">Thư Viện VLUTE </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tài liệu thư viện số
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-home"></i>
                    <span>Thông tin về trường</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vlute:</h6>
                        <a class="collapse-item" href="http://vlute.edu.vn/vi/" target="_blank">Trang chủ</a>
                        <a class="collapse-item" href="#">Giới thiệu</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-book"></i>
                    <span>Loại sách</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Những loại sách:</h6>
                        <?php
                        $kq = json_decode($data["phanloai"], true);
                        foreach ($kq as $value) { ?>
                            <a class="collapse-item" href="./home/chi_tiet_loaisach/<?php echo $value["MaLoaiSach"] ?> "> <?php echo $value["TenLoaiSach"] ?></a>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- dau qt-->
            <?php if(isset($_SESSION["dangnhap"]) && isset($_SESSION["dangnhap"][2])) { ?>
            <div class="sidebar-heading">
                Quản trị
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thư viện:</h6>
                        <a class="collapse-item" href="admin/qls">Quản lý sách</a>
                        <a class="collapse-item" href="admin/ql_ls">Quản lý loại sách</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Tài khoản:</h6>
                        <?php if($_SESSION["dangnhap"][2] == 2) {?>
                        <a class="collapse-item" href="404.html">Tài khoản giáo viên</a>
                        <?php } ?>
                        <a class="collapse-item" href="blank.html">Tài khoản sinh viên</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Thông tin khác:</h6>
                        <a class="collapse-item" href="404.html">Khóa học</a>
                        <a class="collapse-item" href="blank.html">Khoa chuyên ngành</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Thống kê</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Mượn trả</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <?php }?>
            <!-- cuoi qt-->
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->
        <?php 
            if(isset($data["thongbao"])){
               echo "<script>
            
                 alert('vui long nhập tên sách cần tìm');
    
               </>";
              
            } ?>                      
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
         
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php
                if (isset($data["hiden"]) ==false) { ?>
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="./home/timkiem/" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="q">
                                <!-- <input type="hidden" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="p" value="timkiem" > -->
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" >
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
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
                                    <form class="form-inline mr-auto w-100 navbar-search" action="./home/timkiem/" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="q">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-address-book fa-lg"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <?php if (isset($_SESSION["dangnhap"])) { ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["dangnhap"][1] ?> </span>
                                        <?php if (isset($_SESSION["dangnhap"][2])) {
                                            if (strcasecmp($_SESSION["dangnhap"]["gioitinh"], "nam") == 0) { ?>
                                                <img class="img-profile rounded-circle" src="public/img/undraw_profile_2.svg">
                                            <?php  } else { ?>
                                                <img class="img-profile rounded-circle" src="public/img/undraw_profile_3.svg">
                                            <?php }
                                        } else {
                                            if (strcasecmp($_SESSION["dangnhap"]["gioitinh"], "nam") == 0) { ?>
                                                <img class="img-profile rounded-circle" src="public/img/undraw_profile.svg">
                                            <?php } else { ?>
                                                <img class="img-profile rounded-circle" src="public/img/undraw_profile_1.svg">
                                        <?php }
                                        } ?>

                                    </a>

                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Đổi mật khẩu
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Đăng xuất
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <a type="button" class="btn btn-success btn-sm rounded-pill test " style="margin-top: 20%;" href="dangnhap/">Đăng nhập</a>
                                <?php } ?>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <!-- trang giua -->
                <?php } ?>