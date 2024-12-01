<?php
include "connect.php"; // Database connection
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php"); // Redirect to login page
    exit();
}


if (isset($_GET['ISBN'])) {
    $isbn = $_GET['ISBN'];

    $sql = "DELETE FROM books WHERE ISBN = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
       
        mysqli_stmt_bind_param($stmt, "s", $isbn);

        
        if (mysqli_stmt_execute($stmt)) {
            
            $_SESSION['message'] = "Book deleted successfully.";
            header("Location: booksMain.php"); // Redirect after successful deletion
            exit();
        } else {
            
            $_SESSION['message'] = "Error deleting the book. Please try again.";
            header("Location: booksMair.php"); 
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
