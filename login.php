<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome.php");
                            
                        }
                        else{
                            $err = "Password doesn't match";
                        }
                    }

                }

    }
}    


}


?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        /* Common styles */
        .navbar {
            border-radius: 0;
        }

        
        body {
          background-color: #dd33bb;
          background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'%3E%3Cdefs%3E%3CradialGradient id='a' cx='500' cy='500' r='50%25' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23dd33bb'/%3E%3Cstop offset='1' stop-color='%23404'/%3E%3C/radialGradient%3E%3CradialGradient id='b' cx='500' cy='500' r='60%25' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23F70' stop-opacity='1'/%3E%3Cstop offset='1' stop-color='%23F70' stop-opacity='0'/%3E%3C/radialGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='1000' height='1000'/%3E%3Cg fill='none' stroke='%23F6B' stroke-width='1' stroke-miterlimit='10' stroke-opacity='.3'%3E%3Crect x='12.5' y='12.5' width='975' height='975'/%3E%3Crect x='25' y='25' width='950' height='950'/%3E%3Crect x='37.5' y='37.5' width='925' height='925'/%3E%3Crect x='50' y='50' width='900' height='900'/%3E%3Crect x='62.5' y='62.5' width='875' height='875'/%3E%3Crect x='75' y='75' width='850' height='850'/%3E%3Crect x='87.5' y='87.5' width='825' height='825'/%3E%3Crect x='100' y='100' width='800' height='800'/%3E%3Crect x='112.5' y='112.5' width='775' height='775'/%3E%3Crect x='125' y='125' width='750' height='750'/%3E%3Crect x='137.5' y='137.5' width='725' height='725'/%3E%3Crect x='150' y='150' width='700' height='700'/%3E%3Crect x='162.5' y='162.5' width='675' height='675'/%3E%3Crect x='175' y='175' width='650' height='650'/%3E%3Crect x='187.5' y='187.5' width='625' height='625'/%3E%3Crect x='200' y='200' width='600' height='600'/%3E%3Crect x='212.5' y='212.5' width='575' height='575'/%3E%3Crect x='225' y='225' width='550' height='550'/%3E%3Crect x='237.5' y='237.5' width='525' height='525'/%3E%3Crect x='250' y='250' width='500' height='500'/%3E%3Crect x='262.5' y='262.5' width='475' height='475'/%3E%3Crect x='275' y='275' width='450' height='450'/%3E%3Crect x='287.5' y='287.5' width='425' height='425'/%3E%3Crect x='300' y='300' width='400' height='400'/%3E%3Crect x='312.5' y='312.5' width='375' height='375'/%3E%3Crect x='325' y='325' width='350' height='350'/%3E%3Crect x='337.5' y='337.5' width='325' height='325'/%3E%3Crect x='350' y='350' width='300' height='300'/%3E%3Crect x='362.5' y='362.5' width='275' height='275'/%3E%3Crect x='375' y='375' width='250' height='250'/%3E%3Crect x='387.5' y='387.5' width='225' height='225'/%3E%3Crect x='400' y='400' width='200' height='200'/%3E%3Crect x='412.5' y='412.5' width='175' height='175'/%3E%3Crect x='425' y='425' width='150' height='150'/%3E%3Crect x='437.5' y='437.5' width='125' height='125'/%3E%3Crect x='450' y='450' width='100' height='100'/%3E%3Crect x='462.5' y='462.5' width='75' height='75'/%3E%3Crect x='475' y='475' width='50' height='50'/%3E%3Crect x='487.5' y='487.5' width='25' height='25'/%3E%3C/g%3E%3Crect fill-opacity='.3' fill='url(%23b)' width='1000' height='1000'/%3E %3C/svg%3E");
          background-attachment: fixed;
          background-size: cover;;
          padding-top: 20px;
        }

        .container {
          width: 400px; /* Adjust the width as needed */
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          padding: 30px;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }

        .text-danger {
            font-size: 0.9em;
        }
    </style>

    <title>PHP login system!</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Php Login System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Login form -->
    <div class="container mt-4">
      <h3>Please Login Here:</h3>
      <hr>
      <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <span class="text-danger"><?php echo $err; ?></span>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
