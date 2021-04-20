<?php
    session_start();
    if(empty($_SESSION['admin_login_flag']) || $_SESSION['admin_login_flag']=="0"){
        header("Location: ".$site_url."admin/");
    }
    include __DIR__ . "/../config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
        <link href="<?php echo $site_url?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $site_url?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $site_url?>admin/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $site_url?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="<?php echo $site_url?>admin/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $site_url?>admin/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css">

    </head>
    <style type="text/css">
        .fade:not(.show){
            opacity: 1 !important;
        }
    </style>
    <body>
        <div class="loading-gif"></div>
        <div class="topbar">
            <div class="topbar-left">
                <a href="<?php echo $site_url?>admin/auction/" class="logo">
                    <span>
                        <img src="<?php echo $site_url?>assets/img/logo2.png" alt="logo-small" class="logo-sm">
                    </span>
                   
                </a>
            </div>
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="ml-1 nav-user-name hidden-sm"><?php echo $_SESSION['admin_name']?> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" id="log_out" href="#"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <!-- <ion-icon name="person-outline" style="font-size:20px"></ion-icon> -->
                            <i class="dripicons-menu nav-icon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="page-wrapper">
            <div class="left-sidenav">
                <div class="main-menu-inner">
                    <div class="menu-body slimscroll">
                        <div id="MetricaOthers" class="main-icon-menu-pane active">
                            <ul class="nav metismenu" id="main_menu_side_nav">
                                <!-- <li class="nav-item"> -->
                                    <!-- <a class="nav-link" href="<?php echo $site_url?>admin/user/"><ion-icon name="person-outline" style="font-size:20px; margin-right:10px"></ion-icon><span class="w-100">User</span></a> -->
                                <!-- </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_url?>admin/auction/"><ion-icon name="person-outline" style="font-size:20px; margin-right:10px"></ion-icon><span class="w-100">Acution</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_url?>admin/raffle/"><ion-icon name="person-outline" style="font-size:20px; margin-right:10px"></ion-icon><span class="w-100">Raffle</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $site_url?>admin/donate/"><ion-icon name="person-outline" style="font-size:20px; margin-right:10px"></ion-icon><span class="w-100">Donate</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
