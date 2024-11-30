<?php
// Start session to get user login details
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Login_ID'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

include "connect.php"; // Include database connection
$id = $_SESSION['Login_ID']; // Get the logged-in user's ID

// Fetch the current user information from the database
$sql = "SELECT * FROM readers WHERE Login_ID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Assign current user data to variables
    $fname = $row['FirstName'];
    $lname = $row['LastName'];
    $email = $row['Email'];
    $address = $row['Address'];
    $contact = $row['ContactNo'];
} else {
    die("User not found.");
}

// Update the user data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture updated form data
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $contact = $_POST['ContactNo'];

    // Prepared statement to update the user data
    $sql_update = "UPDATE readers SET Firstname = ?, LastName = ?, Email = ?, Address = ?, ContactNo = ? WHERE Login_ID = ?";
    
    if ($stmt_update = mysqli_prepare($conn, $sql_update)) {
        mysqli_stmt_bind_param($stmt_update, 'ssssss', $fname, $lname, $email, $address, $contact, $id);

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
                <label>First Name</label>
                <input type="text" class="form-control" name="FirstName" value="<?php echo htmlspecialchars($fname); ?>" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="LastName" value="<?php echo htmlspecialchars($lname); ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="Email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="Address" value="<?php echo htmlspecialchars($address); ?>" required>
            </div>

            <div class="form-group">
                <label>Contact No</label>
                <input type="text" class="form-control" name="ContactNo" value="<?php echo htmlspecialchars($contact); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Update Profile</button>
        </form>
        <a href="home.php" class="btn btn-secondary w-100 mt-3">Back</a>
    </div>
</body>
</html>
