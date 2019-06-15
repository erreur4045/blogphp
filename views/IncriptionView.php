<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <div class="container ">
            <div class="site-section" id="contact-section">
                    <form action="index.php?action=validinscription" method="post" class="contact-form">
                                    <h3 class="text-center indigo-text font-bold py-4"><strong>S'inscrire</strong>
                                    </h3>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <label for="username" class="username_in">Pseudo :</label><br>
                                        <input type="text" name="username" id="form35" class="form-control" required="required">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <label for="mdp" class="">Mots de passe :</label><br>
                                        <input type="password" name="mdp" id="form35" class="form-control" required="required">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <label for="mdp" class="mdp_in">Mail :</label><br>
                                        <input type="email" name="mail" id="form35" class="form-control" required="required">
                                    </div>
                                    <div class="text-center py-4">
                                        <button class="btn btn-primary btn-md">Send <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>


<?php $content = ob_get_clean(); ?>

<?php require'template.php'; ?>