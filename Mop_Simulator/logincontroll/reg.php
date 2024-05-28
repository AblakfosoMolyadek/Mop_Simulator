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
$b = new BaseFunc();

// Login
if(isset($_POST["Reg_Action"])){

    // Login check
    $l = $UserLogin->Register($_POST["username"], $_POST["password"]);
    
    if ($l == false) {
        $resp = $b->customMessage("warning", "User exist!", "Info");
    }else{
        $resp = $b->customMessage("success", "User has been created!", "Info");
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

    <title>Register</title>
</head>

<body>
    <!-- Render Toastr messages -->
    <?php if (isset($resp) && $resp != '') { echo $resp;}?>

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

                <h5 class="card-title mb-4">Register</h5>

                <div class="textFields mb-4">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <a type="submit" class="btn btn-info btnWidth mb-3" href="index.php">Back to log in</a>
                <button type="submit" class="btn btn-warning btnWidth mb-3" name="Reg_Action">Register</button>

                <div class="text-muted">
                    <?php echo SiteConfig::YEAR; ?>
                </div>

            </form>
        </div>
    </div>

</body>
</html>