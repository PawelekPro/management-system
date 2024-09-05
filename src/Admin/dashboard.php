<?php
require_once "include/header.php";
?>

<?php
// database connection
require_once "../Config/connection.php";
require_once "../Config/utils.php";

$currentDay = date('Y-m-d', strtotime("today"));
$tomarrow = date('Y-m-d', strtotime("+1 day"));

$todayLeave = 0;
$tommorowLeave = 0;
$thisWeek = 0;
$nextWeek = 0;
$index = 1;

// total admin
$selectAdmins = "SELECT * FROM admin";
$totalAdmins = mysqli_query($conn, $selectAdmins);

// total employee
$selectEmp = "SELECT * FROM user";
$totalEmp = mysqli_query($conn, $selectEmp);

// employee on leave
$empLeave = "SELECT * FROM `leave`";
$totalLeaves = mysqli_query($conn, $empLeave);

if (mysqli_num_rows($totalLeaves) > 0) {
    while ($leave = mysqli_fetch_assoc($totalLeaves)) {
        $leave = $leave["start_date"];

        if ($currentDay == $leave) {
            $todayLeave += 1;
        } elseif ($tomarrow == $leave) {
            $tommorowLeave += 1;
        }
    }
} else {
    debugToConsole("No incoming leaves found.");
}

$sqlEmployeeQuery = "SELECT * FROM user ORDER BY id ASC";
$empResult = mysqli_query($conn, $sqlEmployeeQuery);
?>

<div class="content-body flex-grow-1">
    <div class="row mt-5">
        <!-- Admins Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3 bg-admin-card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center fs-5 fw-bold text-light bg-admin-title">Admins</li>
                    <li class="list-group-item">Total Admins: <?php echo mysqli_num_rows($totalAdmins); ?></li>
                    <li class="list-group-item text-center"><a href="manage-admin.php" class="btn btn-admin">View All
                            Admins</a></li>
                </ul>
            </div>
        </div>

        <!-- Employees Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3 bg-employee-card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center fs-5 fw-bold text-light bg-employee-title">Employees</li>
                    <li class="list-group-item">Total Employees: <?php echo mysqli_num_rows($totalEmp); ?></li>
                    <li class="list-group-item text-center"><a href="manage-employee.php" class="btn btn-employee">View
                            All Employees</a></li>
                </ul>
            </div>
        </div>

        <!-- Employees on Leave Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3 bg-leave-card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center fs-5 fw-bold text-light bg-leave-title">Employees on Leave
                        (Daywise)</li>
                    <li class="list-group-item">Today: <?php echo $todayLeave; ?></li>
                    <li class="list-group-item">Tomorrow: <?php echo $tommorowLeave; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Leadership Board Table -->
    <div class="row mt-5 bg-leadership-board shadow rounded-3">
        <div class="col-12">
            <div class="text-center my-3">
                <h4 class="fw-bold text-leadership-title">Employee Leadership Board</h4>
            </div>
            <table class="table table-hover text-center">
                <thead>
                    <tr class="bg-table-header text-white">
                        <th scope="col">S.No.</th>
                        <th scope="col">Employee's Id</th>
                        <th scope="col">Employee's Name</th>
                        <th scope="col">Employee's Email</th>
                        <th scope="col">Salary in Rs.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($emp_info = mysqli_fetch_assoc($empResult)) {
                        $emp_id = $emp_info["id"];
                        $emp_name = $emp_info["name"];
                        $emp_email = $emp_info["email"];
                        $emp_salary = $emp_info["salary"];
                    ?>
                    <tr>
                        <th><?php echo $index++; ?></th>
                        <th><?php echo $emp_id; ?></th>
                        <td><?php echo $emp_name; ?></td>
                        <td><?php echo $emp_email; ?></td>
                        <td><?php echo $emp_salary; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once "include/footer.php";
?>