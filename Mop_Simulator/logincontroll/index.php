<?php

// Setup
require_once "../includes/autoload.inc.php";


// Start session
session_start();

// If session is set forward user to first page.
if(isset($_SESSION[SiteConfig::USER_SESSION])){
    header("location: ".SiteConfig::LOGGED_IN_PAGE);
    exit;
}

// Login class
$UserLogin = new MyAccount();

// Login
if(isset($_POST["Login_Action"])){

    // Login check
    $l = $UserLogin->LoginCheckUnique($_POST["username"], $_POST["password"]);
    
    if ($l == 1) {
        header("location: ".SiteConfig::LOGGED_IN_PAGE);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php 
        $link = new SiteConfig();
        echo $link->LoginLinks("../");
    ?>

    <title>Login</title>
</head>

<body>
    <!-- Render Toastr messages -->
    <?php if(isset($l)){echo $l[0];} ?>

    <!-- Navbar -->
    <?php echo SiteConfig::STYLE_SET; ?>
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"> <?php echo SiteConfig::WEBSITE_NAME; ?> </a>
        </div>
    </nav>

    <!-- Login card -->
    <div class="card">
        <div class="card-body text-center">
            <form method="POST">

                <h5 class="card-title mb-4">Login</h5>

                <div class="textFields mb-4">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary btnWidth mb-3" name="Login_Action">Sign In</button>
                <a type="submit" class="btn btn-warning btnWidth mb-3" name="Login_Action" href="reg.php">Register</a>

                <div class="text-muted">
                    <?php echo SiteConfig::YEAR; ?>
                </div>

            </form>
        </div>
    </div>

</body>
</html>