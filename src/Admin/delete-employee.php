<?php
require_once "../Config/connection.php";

// Make sure the form was submitted with a POST request
if (isset($_POST['id'])) {
    $id = $_POST['id']; // Use POST to get the ID since the form submits via POST

    // SQL query to delete the employee by ID
    $sqlQuery = "DELETE FROM user WHERE id = $id";

    // Execute the SQL query
    if (mysqli_query($conn, $sqlQuery)) {
        // Redirect back to the manage-employee.php page with success message
        header("Location: manage-employee.php?delete-success&id=" . $id);
    } else {
        // If query fails, redirect with error message
        header("Location: manage-employee.php?delete-error&id=" . $id);
    }
} else {
    // If ID is not set, redirect to the manage page with an error message
    header("Location: manage-employee.php?invalid-id");
}