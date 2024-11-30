<?php
include "connect.php";
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php");
    exit();
}

// Fetch all books from the database
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management System Dashboard</title>
    <link rel="stylesheet" href="style3.css"> <!-- Ensure the CSS file exists -->
</head>
<body>
    <header>
        <h1>BOOKS</h1>
        <nav>
            <ul>
                <li><a href="addBooks.php">Add New Books</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="home.php">Back</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div class="container mt-5">
        <h1 class="text-center">Books List</h1>

        <!-- Table to display the books -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Edition</th>
                    <th>Author</th>
                    <th>Publisher ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each row and display the data
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $counter . "</td>";
                    echo "<td>" . htmlspecialchars($row['ISBN']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Category']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Edition']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Author']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Publisher_ID']) . "</td>";
                    echo "<td><a href='deleteBooks.php?ISBN=" . urlencode($row['ISBN']) . "' class='btn btn-danger'>Delete</a></td>";
                    echo "<td><a href='reserve.php?ISBN=" . urlencode($row['ISBN']) . "' class='btn btn-danger'>Add</a></td>";
                    echo "</tr>";
                    $counter++;
                }
                ?>
            </tbody>
        </table>

        <!-- Button to go back -->
        <a href="home.php" class="btn btn-primary w-100">Back</a>
    </div>
    </main>
</body>
</html>
