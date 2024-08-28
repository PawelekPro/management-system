<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="../../assets/css/style.css" rel="stylesheet">

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

    <!-- php script start -->
    <?php
    $email_err = $pass_err = $login_Err = "";
    $email = $pass = "";
    ?>
    <!-- php script end -->

    <div class="bg">
        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5 shadow">

                                    <h4 class="text-center">Log-in as Administrator</h4>
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
                                        <p class=" login-form__footer">Not a admin? <a href="../User/login.php"
                                                class="text-primary">Log-In </a>as Employee now</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
</body>

</html>