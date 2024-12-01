<?php
// Include the database connection file
include "connect.php";

// Fetch all users (readers) from the database
$sql = "SELECT * FROM publisher";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">User List</h1>

        <!-- Table to display the users -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Publisher ID</th>
                    <th>Name</th>
                    <th>Year of Publication</th>
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
                    echo "</tr>";
                    $counter++;
                }
                ?>
            </tbody>
        </table>
        <a href="home.php" class="btn btn-primary
        w-100">back</a>
    </div>

</body>
</html>