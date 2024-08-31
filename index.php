<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Vacation Management System</title>
    <style>
    body,
    html {
        height: 100%;
        margin: 0;
    }
    </style>
</head>

<body>

    <!-- Temporary solution for reseting session -->
    <?php
    require_once "./src/Config/utils.php";
    initializeSession();
    ?>

    <div class="bg">
        <div class="login-form-bg h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mt-5">
                                <div class="card-body shadow">

                                    <h2 class="text-center pb-4">Vacation Management System</h2>
                                    <h6 class="text-center pb-4">Please Log-In according to your role to continue.</h6>

                                    <div class="container mt-4">
                                        <div class="btn-toolbar justify-content-between">
                                            <div class="btn-group">
                                                <a href="src/User/dashboard.php" class="btn btn-primary btn-lg">Log-in
                                                    As User</a>
                                            </div>

                                            <div class="btn-group">
                                                <a href="src/Admin/dashboard.php" class="btn btn-primary btn-lg">Log-In
                                                    As Admin</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center mt-5">
        <p class="mb-0">
            Vacation Management System &copy; 2024 | Developed by Paweł Gilewicz |
            <a href="https://github.com/PawelekPro" target="_blank">PawelekPro</a>
        </p>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>