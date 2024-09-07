<?php
require_once "include/header.php";
?>

<?php
require_once "../Config/connection.php";
$sqlQuery = "SELECT * FROM user";
$result = mysqli_query($conn, $sqlQuery);

$index = 1;

?>

<style>
table {
    width: 100%;
    border-spacing: 0;
    border-collapse: collapse;
}



th {
    background-color: #1976d2;
    /* Matches header color for table */
    color: #ffffff;
}

tr:nth-child(even) {
    background-color: #f1f1f1;
    /* Subtle background color for even rows */
}

tr:hover {
    background-color: #e3f2fd;
    /* Light blue hover effect */
}

.container {
    background-color: #ffffff;
    /* White background for the container */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    /* Shadow effect for container */
    border-radius: 12px;
    padding: 20px;
    margin-top: 20px;
}

.text-center h4 {
    color: #000000;
    /* Header color matches your color palette */
}

.btn-primary {
    background-color: #2667ff;
    /* Button color */
    border: none;
    color: #ffffff;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #3f8efc;
    /* Button hover effect */
}
</style>


<div class="container">
    <div class="py-4 mt-5">
        <div class='text-center pb-2'>
            <h4>Manage Employees</h4>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-table-header text-white">
                    <th>S.No.</th>
                    <th>Employee Id</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>End of Contract</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1; // Initialize counter for serial numbers
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $name = $rows["name"];
                        $email = $rows["email"];
                        $EoC = $rows["EoC"];
                        $gender = $rows["gender"];
                        $id = $rows["id"];
                        $mobileNumber = $rows["mobileNumber"];
                        $picturePath = $rows["picturePath"];
                        if ($gender == "") {
                            $gender = "Not Defined";
                        }

                        if ($EoC == "") {
                            $EoC = "Not Defined";
                        } else {
                            $EoC = date('jS F, Y', strtotime($EoC));
                        }

                        if ($mobileNumber == "") {
                            $mobileNumber = "Not Defined";
                        }

                        // Default picture if not available
                        $pictureUrl = $picturePath ? "uploads/{$picturePath}" : "uploads/default-user-icon.png";
                        // Check if file exists
                        if (!file_exists($pictureUrl)) {
                            $pictureUrl = "uploads/default-user-icon.png";
                        }
                        ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $id; ?></td>
                    <td>
                        <img src="<?php echo $pictureUrl; ?>" alt="Profile Picture" width="50" height="50"
                            class="rounded-circle">
                    </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $EoC; ?></td>
                    <td><?php echo $mobileNumber; ?></td>
                    <td>
                        <?php
                                $edit_icon = "<a href='edit-employee.php?id={$id}' class='btn btn-primary btn-sm me-2' style='font-size: 16px;'><i class='bi bi-pencil-square'></i></a>";
                                $delete_icon = "<a href='delete-employee.php?id={$id}' class='btn btn-primary btn-sm' style='font-size: 16px;'><i class='bi bi-trash'></i></a>";
                                echo $edit_icon . $delete_icon;
                                ?>
                    </td>
                </tr>
                <?php
                        $index++;
                    }
                } else {
                    echo "<script>
                        $(document).ready(function(){
                            $('#showModal').modal('show');
                            $('#linkBtn').attr('href', 'add-employee.php');
                            $('#linkBtn').text('Add Employee');
                            $('#addMsg').text('No Employees Found!');
                            $('#closeBtn').text('Remind Me Later!');
                        });
                    </script>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php require_once "include/footer.php";
?>