<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

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


    <div class="bg">
        <div class="login-form-bg h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mt-5">
                                <div class="card-body shadow">

                                    <h4 class="text-center pb-4">Log-in as Employee User</h4>
                                    <div class="text-center my-5"> <?php echo $login_Err; ?> </div>

                                    <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" value="<?php echo $email; ?>"
                                                name="email">
                                            <?php echo $email_err; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control" name="password">
                                            <?php echo $pass_err; ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Log-In" class="btn btn-primary btn-lg w-100 "
                                                name="signin">
                                        </div>
                                        <p class=" login-form__footer">Not a employee user? <a href="../Admin/login.php"
                                                class="text-primary">Log-In </a>as Admin now</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>