<?php
include "connect.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php");
    exit();
}

// Fetch all users (readers) from the database
$sql = "SELECT * FROM publisher";
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
        <h1>Publishers</h1>
        <nav>
            <ul>
                <li><a href="adddPub.php">Add Publisher</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="home.php">Back</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <div class="container mt-5">
        <h1 class="text-center">User List</h1>

        <!-- Display any session messages -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?php echo $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <!-- Table to display the users -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Publisher ID</th>
                    <th>Name</th>
                    <th>Year of Publication</th>
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
                    echo "<td>" . htmlspecialchars($row['Publisher_ID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['YearOfPublication']) . "</td>";
                    echo "<td><a href='deletePub.php?Publisher_ID=" . urlencode($row['Publisher_ID']) . "' class='btn btn-danger'>Delete</a></td>";
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
