
<?php
session_start();

if (!isset($_SESSION['login_id'])) {
    header('Location: login.php');
    exit();
}

echo "<h2>Welcome, Login ID: " . $_SESSION['login_id'] . "</h2>";
echo '<a href="logout.php">Logout</a>';
?>




<!DOCTYPE html>
<html>
<head>
    <title>Library Management System Dashboard</title>
    <link rel="stylesheet" href="css/style2.css">

</head>
<body>
    <header>
        <h1>Online Library</h1>
        <nav>
            <ul>
                <li><a href="books.html">Books</a></li>
                <li><a href="#">Members</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Publications</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Update profile</a></li>
                
                <li><a href="login.html">Log out</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        <div class="stats">
            <div class="stat">
                <img src="./images/books.png" alt="">
                <h3>Total Books</h3>
                <p>1000</p>
            </div>
            <div class="stat">
                
                <img src="./images/profile.png" alt="">
                <h3>Total Members</h3>
                <p>500</p>
            </div>
            <div class="stat">
                
                <img src="./images/issued.png" alt="">
                <h3>Issued Books</h3>
                <p>300</p>
            </div>
        </div>
        <div class="stats2">
            <div class="stat2">
            
                <img src="./images/pub.png" alt="">
            <h3>Publications</h3>
                <p>500</p>
            </div>
            <div class="stat2">
                <img src="./images/categories.jpg" alt="">
                <h3>Book Catagories</h3>
                <p>500</p>
            </div>
            <div class="stat2">
                <img src="./images/fine.png" alt="">
                <h3>Fine per day</h3>
                <p>500</p>
            </div>
        </div>

        </main>
</body>
</html>