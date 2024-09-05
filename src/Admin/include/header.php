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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="../../../assets/css/style.css" rel="stylesheet">
    <link href="../../../assets/plugins/sidebar/css/sidebars.css" rel="stylesheet">

    <script src="../../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../../assets/plugins/sidebar/js/sidebars.js"></script>

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
    <div id="main-wrapper" class="d-flex flex-column min-vh-100">

        <div class="d-flex flex-grow-1">
            <!-- Sidebar start -->
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Admin Panel</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="./dashboard.php" class="nav-link active" aria-current="page">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-body-emphasis has-arrow" data-bs-toggle="collapse"
                            data-bs-target="#employeeMenu">
                            <i class="bi bi-people-fill me-2"></i>
                            Employee
                            <i class="bi bi-chevron-right float-end"></i>
                        </a>
                        <ul class="collapse list-unstyled ms-3" id="employeeMenu">
                            <li><a href="./add-employee.php" class="nav-link link-body-emphasis"><i
                                        class="bi bi-person-plus-fill me-2"></i>Add Employee</a></li>
                            <li><a href="./manage-employee.php" class="nav-link link-body-emphasis"><i
                                        class="bi bi-person-lines-fill me-2"></i>Manage Employee</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-body-emphasis has-arrow" data-bs-toggle="collapse"
                            data-bs-target="#adminMenu">
                            <i class="bi bi-person-badge-fill me-2"></i>
                            Admin
                            <i class="bi bi-chevron-right float-end"></i>
                        </a>
                        <ul class="collapse list-unstyled ms-3" id="adminMenu">
                            <li><a href="./add-admin.php" class="nav-link link-body-emphasis"><i
                                        class="bi bi-person-plus-fill me-2"></i>Add Admin</a></li>
                            <li><a href="./manage-admin.php" class="nav-link link-body-emphasis"><i
                                        class="bi bi-person-lines-fill me-2"></i>Manage Admins</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="./manage-leave.php" class="nav-link link-body-emphasis">
                            <i class="bi bi-calendar-check-fill me-2"></i>
                            Manage Employee Leave
                        </a>
                    </li>
                    <li>
                        <a href="./logout.php" class="nav-link link-body-emphasis">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#"
                        class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar end -->

            <!-- Content body start -->
            <div class="content-body">

                <!-- row -->
                <div class="container-fluid">