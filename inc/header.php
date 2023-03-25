<?php
include_once 'models/variables.php';
?>
<header>
    <nav class="navbar navbar-dark  navbar-expand-lg bg-custom-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://api.dicebear.com/5.x/identicon/svg?seed=ms-logo-0
" alt="" height="20"> Microservices
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_role'])) :
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                 if (isset($_SESSION)) :
                                    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 0) :
                                ?>
                                <span class="badge rounded-pill text-bg-custom-secondary"><i class="bi bi-person-circle"></i> <?=$_SESSION['user_firstname'] .' '. $_SESSION['user_lastname'].' Admin'?> </span>
                                  
                                    <?php
                                    else :
                                    ?>
                                    <span class="badge rounded-pill text-bg-custom-primary"><i class="bi bi-person-circle"></i> <?=$_SESSION['user_firstname'] .' '. $_SESSION['user_lastname']?> </span>
                                    <?php
                                        endif;
                                    endif;
                                  ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-custom-dark">
                                <li><a class="dropdown-item" href="<?= BROWSER_PATH . '/dashboard.php' ?>">Dashboard</a></li>
                                <li><a class="dropdown-item disable" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= BROWSER_PATH . '/deconnexion.php' ?>">Déconnexion</a></li>
                            </ul>
                        </li>
                    <?php
                    else :
                    ?>
                        <li class="nav-item"><a class="nav-link disable" href="<?= BROWSER_PATH . '/inscription.php' ?>"> Inscription </a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BROWSER_PATH . '/connexion.php' ?>">Connexion</a></li>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    </div>
</header>
<?php 
// var_dump($_SESSION)
?>