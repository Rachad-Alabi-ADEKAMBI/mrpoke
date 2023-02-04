<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="./public/img/logo.png" class="logo" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Spécialités</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php#gallery">Galerie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php#game">Jeu-concours</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact">Contact</a>
                    </li>

                    <?php if (isset($_SESSION['user'])) { ?>
                    <li class="nav-item" ?>
                        <a class="nav-link" href="dashboard.php">Tableau de bord</a>
                    </li>
                    <?php } ?>
                </ul>

                <?php if (!isset($_SESSION['user'])) { ?>
                <a class="btn btn-outline-primary my-2 my-sm-0" href="login.php">Connexion</a>
                <?php } ?>

                <?php if (isset($_SESSION['user'])) { ?>
                <a class="btn btn-outline-danger my-2 my-sm-0" href="../api/api.php?action=logout">Déconnexion</a>
                <?php } ?>


            </div>
        </nav>
    </div>
</div>