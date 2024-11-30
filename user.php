<?php
include "connect.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION['Login_ID'])) {
    header("Location: login (1).php");
    exit();
}

// Fetch all users (readers) from the database
$sql = "SELECT * FROM readers";
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
        <h1>Users</h1>
        <nav>
            <ul>
                <li><a href="singup.php">Add Member</a></li>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact no</th>
                    <th>Login_ID</th>
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
                    echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContactNo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Login_ID']) . "</td>";
                    echo "<td><a href='delete.php?Login_ID=" . urlencode($row['Login_ID']) . "' class='btn btn-danger'>Delete</a></td>";
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
