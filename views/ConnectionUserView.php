<?php $title = 'Connection'; ?>
<?php ob_start(); ?>
    <div class="main">
        <div class="container ">
            <div class="site-section" id="contact-section">
                <div class="container">
                    <form action="index.php?action=connectionuser" class="contact-form" method="post">
                                    <h3 class="text-center indigo-text font-bold py-4"><strong>Se connecter :</strong>
                                    </h3>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <label for="form35">Pseudo :</label>
                                        <input  name="username" type="text" id="form35" class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <label for="form25">Mot de passe :</label>
                                        <input  name="mdp" type="password" id="form25" class="form-control">
                                    </div>
                                    <div class="text-center py-4">
                                        <button class="btn btn-primary btn-md">Envoyer <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>