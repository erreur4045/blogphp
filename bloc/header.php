<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Blog PHP POO MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=CV">CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listPosts">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=contact">Contact</a>
                </li>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=connection">Se connecter</a>
                    </li>
                <?php else: ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php?action=dashboard" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= ucfirst($_SESSION['username']) ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?action=addnewpost">Ajouter un article</a>
                        <a class="dropdown-item" href="index.php?action=dashboard"">Dashboard</a>
                            <?php if ($_SESSION['admin'] == TRUE) : ?>
                            <a class="dropdown-item" href="index.php?action=adminuser">Administration utilisateur</a>
                            <?php endif; ?>
                        <a class="dropdown-item" href="index.php?action=deconnection">Se deconnecter</a>
                    </div>
                </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['username'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=inscription">Inscription</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
