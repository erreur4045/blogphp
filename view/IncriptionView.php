<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-12 mb-4">
                    <div class="card near-moon-gradient form-white">
                        <div class="card-body">
                            <!-- Form subscription -->
                            <form action="index.php?action=validinscription" method="post">
                                <h3 class="text-center indigo-text font-bold py-4"><strong>Se connecter</strong></h3>
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <label for="username" class="username_in">Username:</label><br>
                                    <input type="text" name="username" id="username" class="username_in">
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <label for="mdp" class="">Mots de pass</label><br>
                                    <input type="password" name="mdp" id="mdp" class="mdp_in">
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix white-text"></i>
                                    <label for="mdp" class="mdp_in">Mail:</label><br>
                                    <input type="email" name="mail" id="mail" class="mdp_in">
                                </div>
                                <div class="text-center py-4">
                                    <button class="btn btn-indigo">Send <i class="fa fa-paper-plane-o ml-1"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- Form subscription -->
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <h3 class="">Vous n'etes pas inscrit ?<span><a href="index.php?action=inscription" class="small"> Incription</a></span></h3>
                    </div>
                </div>
            </div>
        </div></div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>