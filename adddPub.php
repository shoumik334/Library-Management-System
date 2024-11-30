<?php
// Include the database connection file
include "connect.php";

// Initialize success and error flags
$success = false;
$error = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the publisher details from the form
    $id = $_POST['Publisher_ID'];
    $name = $_POST['Name'];
    $year = $_POST['YearOfPublication'];

    // SQL query to insert the new publisher into the database
    $sql = "INSERT INTO publisher (Publisher_ID, Name, YearOfPublication) 
            VALUES (?, ?, ?)";

    // Prepare the SQL statement to avoid SQL injection
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the parameters to the SQL query
        mysqli_stmt_bind_param($stmt, 'sss', $id, $name, $year);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
        } else {
            $error = true;
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        $error = true;
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Publisher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Add New Publisher</h1>

        <!-- Success or Error Messages -->
        <?php
        if ($success) {
            echo '<div class="alert alert-success">Publisher added successfully!</div>';
        }
        if ($error) {
            echo '<div class="alert alert-danger">Error adding the publisher. Please try again.</div>';
        }
        ?>

        <!-- Form to Add New Publisher -->
        <form method="POST">
            <div class="form-group">
                <label for="Publisher_ID">Publisher ID</label>
                <input type="text" class="form-control" id="Publisher_ID" name="Publisher_ID" placeholder="Enter publisher ID" required>
            </div>

            <div class="form-group">
                <label for="Name">Publisher Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter publisher name" required>
            </div>

            <div class="form-group">
                <label for="YearOfPublication">Year of Publication</label>
                <input type="text" class="form-control" id="YearOfPublication" name="YearOfPublication" placeholder="Enter year of publication" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Add Publisher</button>
        </form>

        <!-- Link to go back to the main page -->
        <a href="publMain.php" class="btn btn-secondary w-100 mt-3">Back</a>
    </div>
</body>
</html>
