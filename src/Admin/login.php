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

    <!-- php script start -->
    <?php
    require_once "../Config/utils.php";
    $emailErr = $passErr = $loginErr = "";
    $email = $pass = "";

    debugToConsole("Login php state before server request.");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_REQUEST["email"])) {
            $emailErr = "<p style='color:red'> * Email can not be empty</p>";
        } else {
            $email = $_REQUEST["email"];
        }

        if (empty($_REQUEST["password"])) {
            $passErr = "<p style='color:red'> * Password can not be empty</p>";
        } else {
            $pass = $_REQUEST["password"];
        }

        debugToConsole(["Requested login for user with email:", $email]);
        if (!empty($email) && !empty($pass)) {
            // Connect to database
            require_once "../Config/connection.php";
            $sqlQuery = "SELECT * FROM admin WHERE email='$email' && password='$pass'";
            $res = mysqli_query($conn, $sqlQuery);

            if (mysqli_num_rows($res) > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    session_start();
                    session_unset();
                    $_SESSION["email"] = $rows["email"];
                    header("Location: dashboard.php?login-sucess");
                }
                echo "<script>console.log('Login successful for user: $email');</script>";
            } else {
                $loginErr = "<div class='alert alert-warning alert-dismissible fade show'>
                <strong>Invalid email or password</strong>
                <button type='button' class='close' data-dismiss='alert' >
                <span aria-hidden='true'>&times;</span>
                </button></div>";
                echo "<script>console.log('Login failed for user: $email');</script>";
            }
        }
    }
    ?>
    <!-- php script end -->

    <div class="bg">
        <div class="login-form-bg h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mt-5">
                                <div class="card-body shadow">

                                    <h4 class="text-center pb-4">Log-in as Administrator</h4>
                                    <div class="text-center my-5"> <?php echo $loginErr; ?> </div>

                                    <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" value="<?php echo $email; ?>"
                                                name="email">
                                            <?php echo $emailErr; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control" name="password">
                                            <?php echo $passErr; ?>

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

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>