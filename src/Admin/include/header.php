<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Vacation Management System</title>

    <!-- Bootstrap CSS -->
    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/custom/css/style.css" rel="stylesheet">

    <script src="../../../assets/plugins/jquery/jquery.min.js"></script>

    <style>
    .hidden {
        display: none;
    }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!-- Main wrapper start -->
    <div id="main-wrapper">

        <!-- Nav header start -->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="#">
                    <span class="brand-title"></span>
                </a>
            </div>
        </div>
        <!-- Nav header end -->

        <!-- Header start -->
        <div class="header">
            <div class="header-content d-flex justify-content-between align-items-center">

                <div class="nav-control">
                    <button class="hamburger btn">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </button>
                </div>
                <div class="text-center">
                    <h2 class="pt-3">Employee Management System</h2>
                </div>

            </div>
        </div>
        <!-- Header end -->

        <!-- Sidebar start -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu list-unstyled" id="menu">
                    <br><br>
                    <li>
                        <a href="./dashboard.php">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Employee</span>
                        </a>
                        <ul class="list-unstyled" aria-expanded="false">
                            <li><a href="./add-employee.php"><i class="icon-plus menu-icon"></i><span
                                        class="nav-text">Add Employee</span></a></li>
                            <li><a href="./manage-employee.php"><i class="fa fa-tasks menu-icon"></i><span
                                        class="nav-text">Manage Employee</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Admin</span>
                        </a>
                        <ul class="list-unstyled" aria-expanded="false">
                            <li><a href="./add-admin.php"><i class="icon-plus menu-icon"></i><span class="nav-text">Add
                                        Admin</span></a></li>
                            <li><a href="./manage-admin.php"><i class="fa fa-ttasks menu-icon"></i><span
                                        class="nav-text">Manage Admins</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="./manage-leave.php">
                            <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Employee Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="./logout.php">
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="./profile.php">
                            <i class="fa fa-user menu-icon"></i><span class="nav-text">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Sidebar end -->

        <!-- Content body start -->
        <div class="content-body">

            <div class="modal fade" id="showModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div id="modalHead" class="modal-header">
                            <button id="modal_cross_btn" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="addMsg" class="text-center fw-bold"></p>
                        </div>
                        <div class="modal-footer">
                            <div class="mx-auto">
                                <a type="button" id="linkBtn" href="#" class="btn btn-primary">Add Expense For the
                                    Day</a>
                                <a type="button" id="closeBtn" href="#" data-bs-dismiss="modal"
                                    class="btn btn-primary">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="container-fluid">