<?php

$loggedin = false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = $_SESSION['loggedin'];
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="curd.php">PHP-CURD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">';
              if($loggedin){
                echo '<a class="nav-link active" aria-current="page" href="curd.php">Home</a>';
            }
          echo '</li>
              
            </ul>';
           if(!$loggedin){
            echo '<a href ="signup.php" class="btn btn-light">SignUp</a>';
            echo '<a href ="login.php" class="btn btn-light mx-2" >Login</a>';
            };
            if($loggedin){
            echo '<a href ="logout.php" class="btn btn-light mx-2" >LogOut</a>';
          };
        echo '</div>
        </div>
      </nav>';
      ?>

      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>
      <body>
        <div class="row">
          <div class="col-md-6">
            
          </div>
        </div>
      </body>
      </html>