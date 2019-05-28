<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="container">
            <div class="col-md-8">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="card bg-secondary form-white">
                            <div class="card-body" >
                                <form action="index.php?action=contacter">
                                    <h2 class="text-center py-4 font-bold font-up white-text">Contacter moi</h2>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i><em></em>
                                        <input type="text" id="form32" class="form-control">
                                        <label for="form32">Votre nom</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <input type="text" id="form22" class="form-control">
                                        <label for="form22">Votre mail</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-tag prefix white-text"></i>
                                        <input type="text" id="form322" class="form-control">
                                        <label for="form342">Sujet</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix white-text"></i>
                                        <textarea type="text" id="form82" class="form-control" placeholder="Votre message"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg waves-effect waves-light">Envoyer</button>
                                    </div>
                                </form>
                                <!-- Form contact -->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>