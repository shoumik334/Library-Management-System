<?php
include "connect.php";
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['Login_ID']; // Get logged-in user's ID

// Fetch all overdue books for the logged-in user
$sql = "SELECT Book_ID, DueDate, DATEDIFF(NOW(), DueDate) AS overdue_days 
        FROM Reserve 
        WHERE User_ID = ? AND DueDate < NOW()";

// Prepare the SQL query
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn)); // Debugging for query preparation
}

// Bind the parameter and execute
if (!mysqli_stmt_bind_param($stmt, 's', $id)) {
    die("Error binding parameter: " . mysqli_error($conn)); // Debugging for parameter binding
}

if (!mysqli_stmt_execute($stmt)) {
    die("Error executing statement: " . mysqli_error($conn)); // Debugging for execution
}

// Fetch the result
$result = mysqli_stmt_get_result($stmt);

$fine_per_day = 100; // Fine amount per overdue day

// Iterate through overdue books
while ($row = mysqli_fetch_assoc($result)) {
    $isbn = $row['ISBN'];
    $overdue_days = $row['overdue_days'];

    if ($overdue_days > 0) {
        $fine = $overdue_days * $fine_per_day;

        // Update the fine for the overdue book
        $update_sql = "UPDATE Reserve SET fine = ? WHERE User_ID = ? AND ISBN = ?";
        $update_stmt = mysqli_prepare($conn, $update_sql);

        if (!$update_stmt) {
            die("Error preparing update statement: " . mysqli_error($conn)); // Debugging for update statement
        }

        if (!mysqli_stmt_bind_param($update_stmt, 'dss', $fine, $id, $isbn)) {
            die("Error binding parameters for update: " . mysqli_error($conn)); // Debugging for binding
        }

        if (!mysqli_stmt_execute($update_stmt)) {
            die("Error executing update statement: " . mysqli_error($conn)); // Debugging for execution
        }

        mysqli_stmt_close($update_stmt); // Close update statement
    }
}

// Fetch and display fines
$sql_fines = "SELECT Book_ID, fine FROM Reserve WHERE User_ID = ? AND fine > 0";
$stmt_fines = mysqli_prepare($conn, $sql_fines);

if (!$stmt_fines) {
    die("Error preparing fines statement: " . mysqli_error($conn)); // Debugging for fines statement
}

if (!mysqli_stmt_bind_param($stmt_fines, 's', $id)) {
    die("Error binding parameters for fines: " . mysqli_error($conn)); // Debugging for binding
}

if (!mysqli_stmt_execute($stmt_fines)) {
    die("Error executing fines statement: " . mysqli_error($conn)); // Debugging for execution
}

$result_fines = mysqli_stmt_get_result($stmt_fines);

echo "<h1>Your Fines</h1>";
while ($row = mysqli_fetch_assoc($result_fines)) {
    echo "Book ISBN: " . $row['ISBN'] . " - Fine: " . $row['fine'] . "<br>";
}

// Close all prepared statements and database connection
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_fines);
mysqli_close($conn);
?>
