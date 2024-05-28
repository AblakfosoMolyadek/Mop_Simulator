<!-- Navigation -->
<?php echo SiteConfig::STYLE_SET; ?>
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="<?php echo SiteConfig::LOGGED_IN_PAGE; ?>"> <?php echo SiteConfig::WEBSITE_NAME; ?> </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>

            <div class="d-flex">
                
                <?php
                    // Logout
                    if(SiteConfig::PASSWORD_PROTECTED_WEBSITE == 1){
                        echo '
                        <div class="form-inline my-2 my-lg-0">
                            <a href="../includes/inc.logout.php" class="btn btn-danger btn-sm">'.$_SESSION["FullName"].' <i class="fas fa-sign-out-alt"></i>  </a>
                        </div>';
                    }
                    
                ?>

            </div>

        </div>
    </div>
</nav>

