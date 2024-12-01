<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isbn = $_POST['ISBN'];

    // Mark the fine as paid
    $sql = "UPDATE Reserve SET fine = 0 WHERE User_ID = ? AND ISBN = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user_id, $isbn);

    if (mysqli_stmt_execute($stmt)) {
        echo "Fine for book ISBN " . $isbn . " has been cleared.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <label for="ISBN">Enter ISBN of the book to clear fine:</label>
    <input type="text" name="ISBN" required>
    <button type="submit">Pay Fine</button>
</form>
