<header>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <div class="container-fluid">
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-4">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Home</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-4">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="index.php">Home</a></li>-->
                        <li><a href="index.php?action=CV">CV</a></li>
                        <?php if (!isset($_SESSION['username'])) : ?>
                        <li><a href="index.php?action=inscription">Inscription</a></li>
                        <?php endif; ?>
                        <li><a href="index.php?action=contact">Contact</a></li>
                        <li><a href="index.php?action=testmail">test_mail</a></li>
                        <?php if (!isset($_SESSION['username'])) : ?>
                            <li><a href="index.php?action=connectionadmin">Se connecter</a></li>
                        <?php else: ?>
                            <li>
                                <button type="button" class="btn btn-default btn-sm">
                                    <a href="index.php?action=dashboard" class="usersessionicon">
                                        <span class="glyphicon glyphicon-user"><?= " " . $_SESSION['username'] ?></span>
                                    </a>
                                </button>
                            </li>
                            <li><a href="index.php?action=deconnection">Se deconnecter</a></li>
                        <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php if (isset($_SESSION['message'])): ?>
<div class="container">
    <div class="row">
        <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
    </div>
</div>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>