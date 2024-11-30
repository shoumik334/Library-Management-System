<?php
$success = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $id = $_POST['Login_ID'];
    $pass = $_POST['Password'];

    if (empty($id) || empty($pass)) {
        echo 'Both fields are required.';
        exit();
    }

    // Check if user already exists
    $sql = "SELECT * FROM authentication_system WHERE Login_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = 1;
    } else {
        // Insert new user into authentication_system
        $sql = "INSERT INTO authentication_system (Login_ID, Password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $id, $pass);
        $stmt->execute();

        // Insert user into readers table
        $sql2 = "INSERT INTO readers (Firstname, LastName, Email, Address, ContactNo, Login_ID) 
                 VALUES (NULL, NULL, NULL, NULL, NULL, ?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s", $id);
        $stmt2->execute();

        $success = 1;
        header('Location: login (1).php'); // Redirect to login page
        exit();
    }
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registration</title>
  </head>
  <body>
    <?php
    if ($user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry </strong> User exists
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success </strong> You are registered
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>

    <div class="container mt-5">
        <form method="POST" action="singup.php">
            <h1 class="text-center">Registration</h1>

            <div class="form-group">
                <label>User ID</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="Login_ID">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="Password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
            <a href="login (1).php">Already have an account? LOG IN</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
