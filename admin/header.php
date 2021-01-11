<?php
include '../config/db.php';
if (isset($_SESSION['sname'],$_SESSION['type'])) {
    if ($_SESSION['type'] == 'biznes') {
        header('location:../dashboard/index.php');
        exit;
    } elseif ($_SESSION['type'] == 'admin') {
        // vazhdo
    } 
} else {
    header('location: ../logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from atmos.atomui.com/default/dashboard-03 by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Dec 2020 14:13:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="author"/>
<meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:title"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:description"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:image"
      content="https://cdn.dribbble.com/users/180706/screenshots/5424805/the_sceens_-_mobile_perspective_mockup_3_-_by_tranmautritam.jpg"/>
<meta property="og:site_name" content="atlas "/>
<title>Atmos Admin Panel- Bootstrap 4 Based Admin Panel</title>
<link rel="icon" type="image/x-icon" href="assets/img/logo.png"/>
<link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
<link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/light/assets/vendor/pace/pace.css'/>
<script src='https://d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/light/assets/vendor/pace/pace.min.js'></script>
<!--vendors-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>

<link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/bundles/fc681442cee6ccf717f33ccc57ebf17a4e0792e1.css'/>



<link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
<link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/04cc97dcdd1c8f6e5b9420845f0fac26b54dab84/default/assets/fonts/jost/jost.css'/>
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css'/>
<!--Bootstrap + atmos Admin CSS-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/ed18bd005cf8b05f329fad0688d122e0515499ff/default/assets/css/atmos.min.css'/>
<!-- Additional library for page -->


</head>
<body class="sidebar-pinned ">
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo" src="assets/img/logo.png" width="40" alt="atmos Logo">
        <span class="admin-brand-content font-secondary"><a href='index.html'>  atmos</a></span>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            <li class="menu-item active ">
                <a href="index.php" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Dashboard
                                                    <span class=""></span>
                                                </span>

                                            </span>
                    <span class="menu-icon">
                           <span class="icon-badge badge-success badge badge-pill">4</span>
                                                 <i class="icon-placeholder mdi mdi-shape-outline "></i>
                                            </span>
                </a>
            </li>
            
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Users
                                                    <span class="menu-arrow"></span>
                                                </span>

                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-cursor-default-outline "></i>
                                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href='users.php' class=' menu-link'>
                                            <span class="menu-label">
                                                <span class="menu-name">User List </span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder   ">
A
                                                </i>
                                            </span>
                        </a>

                    </li>
                    <li class="menu-item">
                        <a href='admin_list.php' class=' menu-link'>
                                            <span class="menu-label">
                                                <span class="menu-name">Admin List </span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder   ">
A
                                                </i>
                                            </span>
                        </a>

                    </li>
                    <li class="menu-item">
                        <a href='addadmin.php' class=' menu-link'>
                                            <span class="menu-label">
                                                <span class="menu-name">Add Admin </span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder   ">
B
                                                </i>
                                            </span>
                        </a>

                    </li>
                    
                </ul>
            </li>
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                <span class="menu-name">Transcations
                                                    <span class="menu-arrow"></span>
                                                </span>
<span class="menu-info">  </span>
                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-webpack"></i>
                                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">

                    <li class="menu-item">
                        <a href='transactions.php' class=' menu-link'>
                                        <span class="menu-label">
                                                <span class="menu-name">Transcations List
                                                </span>
                                            </span>
                            <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-webpack "></i>
                                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href='add.php' class=' menu-link'>
                                        <span class="menu-label">
                                                  <span class="menu-name">Add Transcation
                                                </span>
                                            </span>
                            <span class="menu-icon">

                                                    <i class="icon-placeholder mdi mdi-webpack"></i>
                                            </span>
                        </a>
                    </li>


                </ul>
            </li>
            

                    <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                 <span class="menu-name">Settings
                                                    <span class="menu-arrow"></span>
                                                </span>
                                                <span class="menu-info"></span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-link-variant "></i>
                                            </span>
                        </a>
                        <!--submenu-->
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="#" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Profile </span>
                                            </span>
                                    <span class="menu-icon">
                                                <i class="icon-placeholder  ">
                                                    Sb
                                                </i>
                                            </span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
        </ul>

    </div>

</aside>
<main class="admin-main">
    <!--site header begins-->
<header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">

            <li class="nav-item">
                <a class="nav-link" data-target="#siteSearchModal" data-toggle="modal" href="#">
                    <i class=" mdi mdi-magnify mdi-24px align-middle"></i>
                </a>
            </li>
        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <a href="#" class="btn btn-dark" data-toggle="modal"
                   data-target="#demoModal">Switch Demo</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-24px mdi-bell-outline"></i>
                        <span class="notification-counter"></span>
                    </a>

                    <div class="dropdown-menu notification-container dropdown-menu-right">
                        <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                            <a href="#!" class="mdi mdi-18px mdi-settings text-muted"></a>
                            <span class="h5 m-0">Notifications</span>
                            <a href="#!" class="mdi mdi-18px mdi-notification-clear-all text-muted"></a>
                        </div>
                        <div class="notification-events bg-gray-300">
                            <div class="text-overline m-b-5">today</div>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-circle text-success"></i> All systems operational.</div>
                                </div>
                            </a>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-upload-multiple "></i> File upload successful.</div>
                                </div>
                            </a>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="mdi mdi-cancel text-danger"></i> Your holiday has been denied
                                    </div>
                                </div>
                            </a>


                        </div>

                    </div>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <span class="avatar-title rounded-circle bg-dark">V</span>

                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right"   >
                    <a class="dropdown-item" href="#">  Add Account
                    </a>
                    <a class="dropdown-item" href="#">  Reset Password</a>
                    <a class="dropdown-item" href="#">  Help </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> Logout</a>
                </div>
            </li>

        </ul>

    </nav>
</header>
<!-- Modal -->
<div class="modal fade modal-slide-right" id="demoModal" tabindex="-1" role="dialog"
     aria-labelledby="demoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoLabel">Demos</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="https://atmos.atomui.com/demos.html" height="100%" width="100%" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
               <div class="text-muted"><i class="mdi mdi-information"></i>Demos will open in new tab</div>
            </div>
        </div>
    </div>
</div>
<!--site header ends --> 