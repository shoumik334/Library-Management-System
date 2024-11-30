<?php
include "connect.php";
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php");
    exit();
}

// Check if Publisher_ID is provided in the URL
if (isset($_GET['Publisher_ID'])) {
    $publisher_id = $_GET['Publisher_ID'];

    // SQL query to delete the publisher from the database
    $sql = "DELETE FROM publisher WHERE Publisher_ID = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the Publisher_ID parameter
        mysqli_stmt_bind_param($stmt, "s", $publisher_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect with success message
            $_SESSION['message'] = "Publisher deleted successfully.";
            header("Location: managePublishers.php"); // Redirect after successful deletion
            exit();
        } else {
            // Error during deletion
            $_SESSION['message'] = "Error deleting the publisher. Please try again.";
            header("Location: managePublishers.php");
            exit();
        }

    
    } else {
        // Error preparing the query
        $_SESSION['message'] = "Error preparing query: " . mysqli_error($conn);
        header("Location: managePublishers.php");
        exit();
    }
} else {
    // If Publisher_ID is not provided, redirect with an error message
    $_SESSION['message'] = "No Publisher_ID provided. Cannot delete publisher.";
    header("Location: managePublishers.php");
    exit();
}

// Close the database connection

?>
