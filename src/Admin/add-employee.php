<?php
require_once "include/header.php";
?>

<?php
require_once "../Config/utils.php";

$nameErr = $emailErr = $passErr = "";
$name = $email = $password = $gender = $EoC = $mobileNumber = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $gender = !empty($_REQUEST["gender"]) ? $_REQUEST["gender"] : "";
    $EoC = !empty($_REQUEST["EoC"]) ? $_REQUEST["EoC"] : "";

    if (empty($_REQUEST["name"])) {
        $nameErr = "<p style='color:red'>* Name is required</p>";
    } else {
        $name = htmlspecialchars($_REQUEST["name"]);
    }

    if (empty($_REQUEST["email"])) {
        $emailErr = "<p style='color:red'>* Email is required</p>";
    } else {
        $email = htmlspecialchars($_REQUEST["email"]);
    }

    if (empty($_REQUEST["password"])) {
        $passErr = "<p style='color:red'>* Password is required</p>";
    } else {
        $password = htmlspecialchars($_REQUEST["password"]);
    }
}

if (!empty($name) && !empty($email) && !empty($password)) {
    require_once "../Config/connection.php";

    $sqlSelectQuery = "SELECT email FROM user WHERE email ='$email'";
    $res = mysqli_query($conn, $sqlSelectQuery);

    if (mysqli_num_rows($res) > 0) {
        $emailErr = "<p style='color:red'>* Given email is already registered</p>";
        debugToConsole("Email $email already registered!");
    } else {
        $sqlInsertQuery = "INSERT INTO user(name, email, password, EoC, gender, mobileNumber) 
            VALUES ('$name', '$email', '$password', '$EoC', '$gender', '$mobileNumber')";
        $insertResult = mysqli_query($conn, $sqlInsertQuery);
        if ($insertResult) {
            $name = $email = $EoC = $gender = $pass = $mobileNumber = "";
            echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('View Employees');
                            $('#addMsg').text('Employee Added Successfully!');
                            $('#closeBtn').text('Add More?');
                        })
                     </script>
                     ";
        }
    }
}
?>

<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0 static-card">
                        <div class="card-body pt-4 shadow">
                            <h4 class="text-center text-leadership-title">Add New Employee</h4>
                            <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                                <div class="form-group mb-4">
                                    <label class="text-leadership-title">Full Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
                                    <?php echo $nameErr; ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-leadership-title">Email:</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-leadership-title">Password:</label>
                                    <input type="password" class="form-control" value="<?php echo $password; ?>"
                                        name="pass">
                                    <?php echo $passErr; ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-leadership-title">Mobile Number:</label>
                                    <input type="tel" class="form-control" value="<?php echo $mobileNumber; ?>"
                                        name="mobileNumber" pattern="[0-9]{10}" required>
                                    <?php echo $mobileNumberErr; ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-leadership-title">Date of expiry of the contract:</label>
                                    <input type="date" class="form-control" value="<?php echo $EoC; ?>" name="EoC">
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label text-leadership-title">Gender:</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        <?php if ($gender == "Male") { echo "checked"; } ?> value="Male">
                                    <label class="form-check-label">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        <?php if ($gender == "Female") { echo "checked"; } ?> value="Female">
                                    <label class="form-check-label">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        <?php if ($gender == "Other") { echo "checked"; } ?> value="Other">
                                    <label class="form-check-label">Other</label>
                                </div>

                                <br>

                                <button type="submit" class="btn btn-admin btn-block mt-3">Add</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once "include/footer.php";
?>