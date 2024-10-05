<?php
require_once "include/header.php";
?>

<?php
require_once "../Config/connection.php";
$sqlQuery = "SELECT * FROM admin";
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
            <h4>Manage Admins</h4>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-table-header text-white">
                    <th>S.No.</th>
                    <th>Admin Id</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
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
                        $gender = $rows["gender"];
                        $id = $rows["id"];
                        $picturePath = $rows["picturePath"];
                        if ($gender == "") {
                            $gender = "Not Defined";
                        }

                        // Default picture if not available
                        $pictureUrl = $picturePath ? "uploads/{$picturePath}" : "uploads/default-admin-icon.png";
                        // Check if file exists
                        if (!file_exists($pictureUrl)) {
                            $pictureUrl = "uploads/default-admin-icon.png";
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
                    <td>
                        <?php
                                $edit_icon = "<a href='edit-admin.php?id={$id}' class='btn btn-primary btn-sm me-2' style='font-size: 16px;'><i class='bi bi-pencil-square'></i></a>";
                                // Delete button (Triggers Modal)
                                $delete_icon = "<button class='btn btn-danger btn-sm' style='font-size: 16px;' data-bs-toggle='modal' data-bs-target='#deleteModal' onclick='setDeleteAdminId({$id})'><i class='bi bi-trash'></i></button>";
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
                            $('#linkBtn').attr('href', 'add-admin.php');
                            $('#linkBtn').text('Add Admin');
                            $('#addMsg').text('No Admins Found!');
                            $('#closeBtn').text('Remind Me Later!');
                        });
                    </script>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this admin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" action="delete-admin.php">
                    <input type="hidden" id="adminId" name="id" value="">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Function to set employee ID in the modal form
function setDeleteAdminId(id) {
    document.getElementById('adminId').value = id;
}
</script>

<?php require_once "include/footer.php";
?>