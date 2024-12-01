<?php
// Start session to get user login details
session_start();
include "connect.php"; 

// Check if the user is logged in
if (!isset($_SESSION['Login_ID'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Include database connection
$id = $_SESSION['Login_ID']; // Get the logged-in user's ID

// Fetch the current user information from the database
$sql = "SELECT * FROM authentication_system WHERE Login_ID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Assign current user data to variables
    $id = $row['Login_ID'];
    $pass = $row['Password'];
    
} else {
    die("User not found.");
}

// Update the user data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture updated form data
    $id = $_POST['Login_ID'];
    $pass = $_POST['Password'];

    // Prepared statement to update the user data
    $sql_update = "UPDATE authentication_system SET Password=? WHERE Login_ID = ?";
    
    if ($stmt_update = mysqli_prepare($conn, $sql_update)) {
        mysqli_stmt_bind_param($stmt_update, 'ss',  $id,$pass);

        if (mysqli_stmt_execute($stmt_update)) {
            echo '<div class="alert alert-success">Profile updated successfully!</div>';
        } else {
            echo '<div class="alert alert-danger">Error updating profile: ' . mysqli_stmt_error($stmt_update) . '</div>';
        }

        // Close the update statement
        mysqli_stmt_close($stmt_update);
    } else {
        echo '<div class="alert alert-danger">Error preparing statement: ' . mysqli_error($conn) . '</div>';
    }
}

// Close the initial query statement
mysqli_stmt_close($stmt);


// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form method="POST">
            <h1 class="text-center">Update Your Profile</h1>
            
            <div class="form-group">
                <label>Login ID</label>
                <input type="text" class="form-control" name="Login_ID" value="<?php echo htmlspecialchars($id); ?>" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="Password" value="<?php echo htmlspecialchars($pass); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Update Profile</button>
        </form>
        <a href="home.php" class="btn btn-secondary w-100 mt-3">Back</a>
    </div>
</body>
</html>
