<header class="blog-header py-0">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#"></a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark  line-accueil" href="index.php">Blog de Maxime</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <?php if (!isset($_SESSION['username'])) : ?>
                    <a class="btn btn-sm btn-outline-secondary nav-bar-inscription" href="index.php?action=inscription">Inscription</a>
                <?php endif; ?>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?action=connection">Se connecter</a>
                <?php else: ?>
<!--                    <a class="btn btn-sm btn-outline-secondary pseudo" href="index.php?action=dashboard"><?/*= " " . ucfirst($_SESSION['username']) */?></a>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?action=deconnection">Se deconnecter</a>-->
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary pseudo dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?= " " . ucfirst($_SESSION['username']) ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a class="boutonmenu" href="index.php?action=dashboard" ">Dashboard</a></li>
                            <li><a class="boutonmenu" href="index.php?action=deconnection" >Se deconnecter</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="index.php">Accueil</a>
        <a class="p-2 text-muted" href="index.php?action=CV">CV</a>
        <a class="p-2 text-muted" href="index.php?action=listPosts">Articles</a>
        <a class="p-2 text-muted" href="index.php?action=testfunction">test function</a>
        <a class="p-2 text-muted" href="index.php?action=contact">Contact</a>
        <a class="p-2 text-muted" href="index.php?action=testmail">test_mail</a>
    </nav>
</div>
</header>