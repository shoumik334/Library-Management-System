<?php
// Include the database connection file
include "connect.php";

// Initialize success and error flags
$success = false;
$error = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the book details from the form
    $isbn = $_POST['ISBN'];
    $title = $_POST['Title'];
    $author = $_POST['Author'];
    $publisher_id = $_POST['Publisher_ID'];
    $category = $_POST['Category'];
    $price = $_POST['Price'];
    $edition = $_POST['Edition'];

    // SQL query to insert the new book into the database
    $sql = "INSERT INTO books (ISBN, Title, Author, Publisher_ID, Category, Price, Edition) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement to avoid SQL injection
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the parameters to the SQL query
        mysqli_stmt_bind_param($stmt, 'sssssss', $isbn, $title, $author, $publisher_id, $category, $price, $edition);

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
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Add New Book</h1>

        <!-- Success or Error Messages -->
        <?php
        if ($success) {
            echo '<div class="alert alert-success">Book added successfully!</div>';
        }
        if ($error) {
            echo '<div class="alert alert-danger">Error adding the book. Please try again.</div>';
        }
        ?>

        <!-- Form to Add New Book -->
        <form method="POST">
            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="Enter ISBN number" required>
            </div>

            <div class="form-group">
                <label for="Title">Book Title</label>
                <input type="text" class="form-control" id="Title" name="Title" placeholder="Enter book title" required>
            </div>

            <div class="form-group">
                <label for="Author">Author</label>
                <input type="text" class="form-control" id="Author" name="Author" placeholder="Enter author name" required>
            </div>

            <div class="form-group">
                <label for="Publisher_ID">Publisher ID</label>
                <input type="text" class="form-control" id="Publisher_ID" name="Publisher_ID" placeholder="Enter publisher ID" required>
            </div>

            <div class="form-group">
                <label for="Category">Category</label>
                <input type="text" class="form-control" id="Category" name="Category" placeholder="Enter book category" required>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" step="0.01" class="form-control" id="Price" name="Price" placeholder="Enter price" required>
            </div>

            <div class="form-group">
                <label for="Edition">Edition</label>
                <input type="text" class="form-control" id="Edition" name="Edition" placeholder="Enter edition" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Add Book</button>
        </form>

        <!-- Link to go back to the dashboard -->
        <a href="booksMain.php" class="btn btn-secondary w-100 mt-3">Back</a>
    </div>
</body>
</html>
