<?php
include "connect.php"; // Database connection
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php"); // Redirect to login page
    exit();
}

// Check if ISBN is provided in the URL (for the book to delete)
if (isset($_GET['ISBN'])) {
    $isbn = $_GET['ISBN'];

    // SQL query to delete the book from the database
    $sql = "DELETE FROM books WHERE ISBN = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the ISBN parameter
        mysqli_stmt_bind_param($stmt, "s", $isbn);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to books list with success message
            $_SESSION['message'] = "Book deleted successfully.";
            header("Location: booksMain.php"); // Redirect after successful deletion
            exit();
        } else {
            // Error during deletion, redirect with error message
            $_SESSION['message'] = "Error deleting the book. Please try again.";
            header("Location: booksMair.php"); // Redirect back to book list
            exit();
        }

        // Close the prepared statement
       
    } else {
        // Error preparing statement, redirect with error message
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
        header("Location: booksMain.php");
        exit();
    }
} else {
    // If ISBN is not provided, redirect with error message
    $_SESSION['message'] = "No ISBN provided. Cannot delete book.";
    header("Location: booksMain.php");
    exit();
}


?>
