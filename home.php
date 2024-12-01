<?php
session_start();
if(!isset($_SESSION['Login_ID'])){
    header(('location:login%20(1).php'));
}

include 'connect.php';

//Fetch Total Books
$resultBooks = $conn ->query("SELECT COUNT(*) as totalBooks FROM books");
$rowBooks= $resultBooks -> fetch_assoc();
$totalBooks= $rowBooks['totalBooks'];

$resultMembers = $conn->query("SELECT COUNT(*) as totalMembers FROM readers");
$rowMembers = $resultMembers->fetch_assoc();
$totalMembers = $rowMembers['totalMembers'];

$resultIssued = $conn->query("SELECT COUNT(*) as totalIssued FROM reserve");
$rowIssued = $resultIssued->fetch_assoc();
$totalIssued = $rowIssued['totalIssued'];

$resultPublications = $conn->query("SELECT COUNT(*) as totalPublications FROM publisher");
$rowPublications = $resultPublications->fetch_assoc();
$totalPublications = $rowPublications['totalPublications'];

$resultCategories = $conn->query("SELECT COUNT(DISTINCT Category) as totalCategories FROM books");
$rowCategories = $resultCategories->fetch_assoc();
$totalCategories = $rowCategories['totalCategories'];


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
                <p><?php echo $totalBooks; ?></p>
            </div>
            <div class="stat">
                
                <img src="./images/profile.png" alt="">
                <h3>Total Members</h3>
                <p><?php echo $totalMembers; ?></p>
            </div>
            <div class="stat">
                
                <img src="./images/issued.png" alt="">
                <h3>Issued Books</h3>
                <p><?php echo $totalIssued; ?></p>
            </div>
        </div>
        <div class="stats2">
            <div class="stat2">
            
                <img src="./images/pub.png" alt="">
            <h3>Publications</h3>
                <p><?php echo $totalPublications; ?></p>
            </div>
            <div class="stat2">
                <img src="./images/categories.jpg" alt="">
                <h3>Book Catagories</h3>
                <p><?php echo $totalCategories; ?></p>
            </div>
            <div class="stat2">
                <img src="./images/fine.png" alt="">
                <h3>Fine per day</h3>
                <p>100</p>
            </div>
        </div>

        </main>
</body>
</html>
