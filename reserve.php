<?php
include "connect.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php");
    exit();
}

// Get the logged-in user's ID and the book ISBN from the URL
$id = $_SESSION['Login_ID'];
$isbn = $_GET['ISBN'];

// Check the connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the book is already reserved by the user
$checkQuery = "SELECT * FROM reserve WHERE User_ID = ? AND Book_ID = ?";
$stmt = mysqli_prepare($conn, $checkQuery);

// Debug: Check if statement preparation was successful
if (!$stmt) {
    die("Error preparing statement (Check Query): " . $conn->error);
}

// Bind parameters and execute the query
$stmt->bind_param("is", $id, $isbn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Book already reserved
    echo "<script>alert('You have already reserved this book!'); window.location.href='booksMain.php';</script>";
} else {
    // Reserve the book
    $reserveQuery = "INSERT INTO Reserve (ReserveDate, DueDate, User_ID, Book_ID) VALUES (NOW(), DATE_ADD(NOW(), INTERVAL 14 DAY), $id, ?)";
    $stmt = $conn->prepare($reserveQuery);

    // Debug: Check if statement preparation was successful
    
    // Bind parameters and execute the query
    
    if ($stmt->execute()) 
    { 
        echo "<script>alert('Book reserved successfully!'); window.location.href='booksMain.php';</script>"; 
    } else { 
        // Log detailed error information 
        die("Error executing reserve query: " . $stmt->error);
     }
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
