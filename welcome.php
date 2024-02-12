<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'basier';
            src: url('Fonts/basiersquare-regular-webfont.eot');
            src: url('Fonts/basiersquare-regular-webfont.eot?#iefix') format('embedded-opentype'),
                url('Fonts/basiersquare-regular-webfont.woff2') format('woff2'),
                url('Fonts/basiersquare-regular-webfont.woff') format('woff'),
                url('Fonts/basiersquare-regular-webfont.ttf') format('truetype');
        }

        /* Custom CSS */
        
        body {
            font-family: 'basier', sans-serif;
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg stroke='%23CCC' stroke-width='0' %3E%3Crect fill='%23F5F5F5' x='-60' y='-60' width='110' height='240'/%3E%3C/g%3E%3C/svg%3E");
        }

        .jumbotron {
            background-image: url("https://i.pinimg.com/736x/d4/53/8f/d4538fe17aa2078656cfeaa00f5e301f.jpg");
            border-bottom-left-radius: 200px;
            border-bottom-right-radius: 200px;
            padding-bottom: 5%;
            background-size: cover;
            text-align: center;
            color: white;
        }

        .navbar-brand {
            font-family: 'basier', sans-serif;
            font-size: 24px;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-toggler {
            border-color: white !important;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .container {
            padding-top: 20px;
        
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Login System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
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
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="https://img.icons8.com/metro/26/000000/guest-male.png" alt="User Icon"> 
                    <?php echo "Welcome ". $_SESSION['username']?>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h3><?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3>
    <h4><a href="https://akashmathi.github.io/click-challenge/">Click here to play the Click Challenge game</a></h4>

    <div class="jumbotron">
        <h1 class="display-4">Empowering Students <br/> Transforming Ideas</h1>
        <p class="lead">Inspire, Learn, Achieve</p>
        <hr class="my-4">
        <p class="text-center">
            <a class="btn btn-primary btn-lg" href="./signup.html" role="button">Get Started</a>
        </p>
    </div>

    <h2><a href="Teja_Resume.pdf">Click here to download the PDF file.</a></h2>
    <h1>My Projects</h1>
    <h4><a href="https://akashmathi.github.io/click-challenge/">Speed Click Test</a></h4>
    <h4><a href="https://menufoodmunch.ccbp.tech">Food Munch Website</a></h4>
    <h4><a href="http://typetestteja.ccbp.tech">Speed Type Test Website</a></h4>
    <h4><a href="http://virtualproject.ccbp.tech">VR Website</a></h4>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
