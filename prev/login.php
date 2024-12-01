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
        && filter_var($email,FILTER_VALIDATE_EMAIL)
        &&  preg_match('/^[0-9]{10,15}$/', $contactno) )
    {

        $query="select * from registration where username= '$username' limit 1";

        $result=mysqli_query($con,$query);

        if($result){
          if($result && mysqli_num_rows($result)> 0){
            $registration=mysqli_fetch_assoc($result);
            
            if($registration['password']===$password)
            {
              $_SESSION['user_id'] =$registration['user_id'];
              header("Location:dashboard.php");
              die;
            }
        }
        }
      echo"Username and Password dosen't match";

    }
    else{
        $error_message="Plese enter valid information";
    }

}
?>



<!DOCTYPE html>
<html>
<head>
  <title>Library Management System</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="dashboard.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <p><button type="submit">Login</button></p>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>
</body>
</html>