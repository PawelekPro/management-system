<?php
require_once "include/header.php";
?>

<?php
$id = $_GET["id"];
require_once "../Config/connection.php";

$sqlQuery = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $sqlQuery);

if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        $name = $rows["name"];
        $email = $rows["email"];
        $originalEmail = $email;
        $EoC = $rows["EoC"];
        $gender = $rows["gender"];
        $mobileNumber = $rows["mobileNumber"];
    }
}

$nameErr = $emailErr = $passErr = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $gender = !empty($_REQUEST["gender"]) ? $_REQUEST["gender"] : "";
    $EoC = !empty($_REQUEST["EoC"]) ? $_REQUEST["EoC"] : "";
    $mobileNumber = !empty($_REQUEST["mobileNumber"]) ? $_REQUEST["mobileNumber"] : "";

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
    
    if ($email !== $originalEmail) {
        $sqlSelectQuery = "SELECT email FROM user WHERE email = '$email'";
        $qResult = mysqli_query($conn, $sqlSelectQuery);

        if (mysqli_num_rows($qResult) > 0) {
            $emailErr = "<p style='color:red'> * Email Already Registered</p>";
        } else {
            $sqlUpdateQuery = "UPDATE user SET name='$name', email='$email', password='$password', "
                . "EoC='$EoC', gender='$gender', mobileNumber='$mobileNumber' "
                . "WHERE id = $id";
            $result = mysqli_query($conn, $sqlUpdateQuery);
        }
    } else {
        $sqlUpdateQuery = "UPDATE user SET name='$name', password='$password', EoC='$EoC', gender='$gender', mobileNumber='$mobileNumber' WHERE id = $id";
        $result = mysqli_query($conn, $sqlUpdateQuery);
    }

    if ($result) {
        echo "<script>
            $(document).ready(function(){
                $('#showModal').modal('show');
                $('#modalHeadTitle').text('Employee data updated');
                $('#linkBtn').attr('href', 'manage-employee.php');
                $('#linkBtn').text('View Employees');
                $('#addMsg').text('Profile Edited Successfully!');
                $('#closeBtn').text('Continue editing');
            });
         </script>";
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
                                        name="password">
                                    <?php echo $passErr; ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-leadership-title">Mobile Number:</label>
                                    <input id="phone" type="tel" class="form-control"
                                        value="<?php echo $mobileNumber; ?>" name="mobileNumber" required>
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

                                <button type="submit" class="btn btn-admin btn-block mt-3">Save changes</button>

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