<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Pet Wholly</title>
    <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="acca.png">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
				<img src="acca.png" alt="homepage" class="light-logo" style="position:relative; top:10px; left:20px;" /><span style="color:white; " ><b>Pet Wholly</b></span>
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <!-- <a class="navbar-brand" href="index.html"> -->
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon p-l-10"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b> -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span class="logo-text"> -->
                            <!-- dark Logo text -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span> -->
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            Message
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i
                                                            class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            Message
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i
                                                            class="ti-settings"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            Message
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i
                                                            class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Pavan kumar</h5>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                            Message
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i
                                                            class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        
                        
                        <?php
                                    // session_start();
                                    $id=$_SESSION["id"];
                                    // $img=$_SESSION["img"];
                                    $cnn=mysqli_connect("localhost","root","","pet");
                                    $qry2="select * from admin where adminid='$id' ";
                                                        
                                        $result2=$cnn->query($qry2);
                                        $row=$result2->fetch_assoc();
                                        $img=$row["img"];
                                        $fname=$row["fname"];
                                        $lname=$row["lname"];
    
?>  
                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="<?php echo "../img/".$img ?>" class="rounded-circle"
                                    width="31">&nbsp;&nbsp;<label style="font-weight:bold; font-size:15px;">My Profile</label></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="editprofile.php"><i class="ti-user m-r-5 m-l-5"></i>
                                    Edit Profile</a>

                                <a class="dropdown-item" href="changepwadmin.php"><i class="fas fa-key m-r-5 m-l-5"></i>
                                    Change Password</a>

                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a> -->
                                <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Account Setting</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="alogout.php"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <!-- <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)"
                                        class="btn btn-sm btn-success btn-rounded">View Profile</a></div> -->
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
                    <ul id="sidebarnav" class="p-t-30">
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                         -->
                        <li class="sidebar-item"> 
                        <a class="sidebar-link waves-effect waves-dark" style="background:#1f272b00;">
                                <!-- <i class="mdi mdi-receipt"></i> -->
                                <span 
                                    class=""><b>&nbsp; &nbsp;<u><?php echo $fname." ".$lname?></b></u></span></a>
                            <ul class="">
                            
                            <!-- <li class="sidebar-item"><a href="approval.php" class="sidebar-link"><i
                                            class="mdi mdi-receipt"></i><span class="hide-menu"> Approval
                                        </span></a></li> -->


                                        <!-- fas fa-file-alt
                                        mdi mdi-database
                                        mdi mdi-receipt -->


                            <li class="sidebar-item"><a href="home.php" class="sidebar-link"><i
                                            class="fas fa-home"></i><span class="hide-menu"> Home
                                        </span></a></li>

                            <li class="sidebar-item"><a href="sorders.php" class="sidebar-link"><i
                                            class="mdi mdi-buffer"></i><span class="hide-menu"> Orders
                                        </span></a></li>
                            <li class="sidebar-item"><a href="tbreed.php" class="sidebar-link"><i
                                            class="mdi mdi-buffer"></i><span class="hide-menu"> Breed
                                        </span></a></li>


                                <!-- <li class="sidebar-item"><a href='tpetbreed.php' class="sidebar-link"><i
                                            class="mdi mdi-receipt"></i><span class="hide-menu"> Pet Breed
                                        </span></a></li> -->

                               <!-- <li class="sidebar-item"><a href="doctor-.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Doctor
                                        </span></a></li>

                                <li class="sidebar-item"><a href="groomer.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu">Groomer
                                        </span></a></li>

                                <li class="sidebar-item"><a href="trainer.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Trainer
                                        </span></a></li> -->
<!-- 
                                <li class="sidebar-item"><a href="tadoption.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Adoption
                                        </span></a></li>

                                <li class="sidebar-item"><a href="tdonation.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Donation
                                        </span></a></li>
                         !-->
                                <!-- <li class="sidebar-item"><a href='tutype.php' class="sidebar-link"><i
                                            class="mdi mdi-receipt"></i><span class="hide-menu"> User type
                                        </span></a></li>  -->

                                

                                <li class="sidebar-item"><a href='petshow.php' class="sidebar-link"><i
                                            class="mdi mdi-buffer"></i><span class="hide-menu"> Pet Show
                                        </span></a></li> 

                                <!-- <li class="sidebar-item"><a href="tuser.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> User
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tdcate.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Doctor Category
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tdoctor.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Doctor
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tgcate.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Groomer Category
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tgroomer.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Groomer
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="ttcate.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Trainer Category
                                        </span></a></li>

                                         <li class="sidebar-item"><a href="ttrainer.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Trainer
                                        </span></a></li> -->

                                        <li class="sidebar-item"><a href="thostel.php" class="sidebar-link"><i
                                            class="mdi mdi-buffer"></i><span class="hide-menu"> Hostel
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tmeasure.php" class="sidebar-link"><i
                                            class="mdi mdi-buffer"></i><span class="hide-menu"> Measurement type
                                        </span></a></li>

                                        <!-- <li class="sidebar-item"><a href="tappoint.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Appointment
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tshop.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Shop
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tproduct.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Product
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="torder.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Order
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="tcomp.php" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Competition
                                        </span></a></li> -->
                            </ul>
                        </li>
                                           </ul>
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
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                      