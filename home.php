<?php
session_start();
if(!isset($_SESSION['Login_ID'])){
    header(('location:login%20(1).php'));
}

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
                <li><a href="booksMain.php">Books</a></li>
                <li><a href="user.php">Members</a></li>
                <li><a href="userPay.php">Reports</a></li>
                <li><a href="publMain.php">Publications</a></li>
                <li><a href="addUser.php">Update profile</a></li>
                <li><a href="changePass.php">Change password</a></li>
                <li><a href="logout.php">Log out</a></li>
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
