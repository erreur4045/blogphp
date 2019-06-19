<header>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <div class="site-navbar-wrap">
        <div class="site-navbar site-navbar-target js-sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-4">
                        <h1 class="my-0 site-logo"><a href="index.php">Domeneo<span class="text-primary">.</span> </a></h1>
                    </div>
                    <div class="col-6 col-md-8">
                        <nav class="site-navigation text-right">
                            <div class="container">

                                <div class="d-inline-block d-lg-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black">
                                        <span class="icon-menu h3"></span> <span class="menu-text"></span>
                                    </a></div>

                                <ul class="site-menu main-menu js-clone-nav d-none d-lg-none">
                                    <li><a href="index.php" class="nav-link">Accueil</a></li>
                                    <li><a href="index.php?action=CV" class="nav-link">CV</a></li>
                                    <li><a href="index.php?action=contact" class="nav-link">Contact</a></li>
                                    <li><a href="index.php?action=listPosts" class="nav-link">Blog</a></li>
                                    <?php if (!isset($_SESSION['username'])) : ?>
                                    <li><a href="index.php?action=connection" class="nav-link">Se connecter</a></li>
                                    <?php else: ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=dashboard" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= ucfirst($_SESSION['username']) ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <?php if ($_SESSION['grade'] == 1 OR $_SESSION['grade'] == 2) : ?>
                                                <a class="dropdown-item" href="index.php?action=addnewpost">Ajouter un article</a>
                                            <?php endif; ?>
                                            <a class="dropdown-item" href="index.php?action=dashboard"">Dashboard</a>
                                            <?php if ($_SESSION['admin'] == true) : ?>
                                                <a class="dropdown-item" href="index.php?action=adminusertobevalided">Administration utilisateur</a>
                                            <?php endif; ?>
                                            <a class="dropdown-item" href="index.php?action=deconnection">Se deconnecter</a>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (!isset($_SESSION['username'])) : ?>
                                    <li><a href="index.php?action=inscription" class="nav-link">Incription</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END .site-navbar-wrap -->
</header>
