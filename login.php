<?php
   $login = false;  
   $loginerr = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "components/db_connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username && $password){
        $sql = "SELECT * FROM users_1 WHERE username = '$username' AND password = '$password'";
        $result = $con->query($sql);
        $rows = mysqli_num_rows($result);
        if($rows){
          $login = true;  
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header('location: curd.php');
        }
        else{
            $loginerr = true;
        }
    }
}




?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php
    
    require "components/nav.php";

    if($login){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Login Successfull
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  }

  if($loginerr){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error! </strong> Invalid Credentials
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

// if($alreadyExists){
//   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
// <strong>Error! </strong> User Already Exists...!
// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';

// }
  
    ?>
    


    <div class="container w-50 my-5 m-auto text-center">
      <h1>Login</h1>
        <div class="row my-4">
            <div class="col-md-12">
            <form method = 'post' action = 'login.php'>

            <div class="mb-3">
                    <input type="text" class="form-control" id="username" name='username' aria-describedby="username" placeholder='Enter Your Username '>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name='password' placeholder ='Enter Your Password'>
                </div>
              

                <button type="submit" class="btn btn-dark">Signup</button>
                </form>
                            </div>
                        </div>
                    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>