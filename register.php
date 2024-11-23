<?php

session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER ['REQUEST_METHOD']=="POST")
    {
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $contactno=$_POST['contactno'];
        $address=$_POST['address'];
        $password=$_POST['password'];

        if(!empty($first_name)
        && !empty($last_name) 
        && !empty($username) 
        && !empty($email) 
        && ! empty($contactno)
        && !empty($address) 
        && ! empty($password) 
        &&!is_numeric($first_name)
        && !is_numeric($last_name)
        && filter_var($email,!FILTER_VALIDATE_EMAIL)
        &&  preg_match('/^[0-9]{10,15}$/', $contactno) )
    {

        $user_id=random_num(10);
        $query="insert into user_registration(user_id,first_name,last_name,username,email,contactno,address,password) 
        values('$user_id','$first_name','$last_name','$username','$email','$ntactnoco','$address','$password')";

        mysqli_query($query);
        header("Location: login.php");
        die;

    }
    else{
        echo"Plese enter valid information";
    }

}
?>





<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/style3reg.css">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
            <form method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br><br>


            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="contactno">Contact No:</label>
            <input type="contactno" id="contactno" name="contactno" required><br><br>

            <label for="contactno">Address:</label>
            <input type="address" id="address" name="address" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.html">Login</a></p>
    </div>
</body>
</html>