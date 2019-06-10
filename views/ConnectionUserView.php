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
                    <div class="col-md-12 mb-4 margin-form">
                        <div class="card near-moon-gradient form-white">
                            <div class="card-body">
                                <form action="index.php?action=connectionuser" method="post">
                                    <h3 class="text-center indigo-text font-bold py-4"><strong>Se connecter</strong>
                                    </h3>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <label for="form35">Pseudo</label>
                                        <input name="username" type="text" id="form35" class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <label for="form25">Mot de pass</label>
                                        <input name="mdp" type="password" id="form25" class="form-control">
                                    </div>
                                    <div class="text-center py-4">
                                        <button class="btn btn-indigo">Send <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>