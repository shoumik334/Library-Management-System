<?php
session_start();
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect.php';
    
    $id=$_POST['Login_ID'];
    $pass=$_POST['Password'];

    $sql="select * from authentication_system where
    Login_ID='$id' and Password='$pass'";

    $result=mysqli_query($conn,$sql);
    if($result){
       $num=mysqli_num_rows($result);
       if($num>0){
        $login=1;
        $_SESSION['Login_ID']=$id;
        header('location:home.php');
        exit();
       }else{
        $invalid=1;
    }
}else{
  die(mysqli_error($conn));
}

}

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <title>Login </title>
  </head>
  <body>
  <?php
    if($invalid){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry </strong> Username and passowrd does not match
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    ?>

    <?php
    if($login){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success </strong> Youre are logged in
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    ?>

    <div class="container mt-5">
    <form method="POST" action="login%20(1).php">
    <h1 class="text-center">Login to lms</h1>

  <div class="form-group">
    <label for="exampleInputEmail1">User ID</label>
    <input type="text" class="form-control" 
    placeholder="Enter your username" 
    name="Login_ID">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" 
    class="form-label">Password</label>
    <input type="password"
    class="form-control" 
    placeholder="Enter your password"
    name="Password">
  </div>
  <button type="submit" class="btn btn-primary
  w-100">Submit</button>
</form>
<a href="singup.php">Do not have account? REGISTER</a>
    </div>
  </body>
</html>