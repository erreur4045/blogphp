<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                <div class="row form_contact">
                        <div class="card bg-secondary form-white form_contact">
                            <div class="card-body form_contact">
                                <!-- Form contact -->
                                <form action="index.php?action=contacter">
                                    <h2 class="text-center py-4 font-bold font-up white-text">Contactez moi</h2>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <label for="form32">Votre nom/prenom</label>
                                        <input type="text" id="form32" class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <label for="form22">Votre mail</label>
                                        <input type="text" id="form22" class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-tag prefix white-text"></i>
                                        <label for="form342">Sujet</label>
                                        <input type="text" id="form322" class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix white-text"></i>
                                        <label for="form82" class="">Votre message</label>
                                        <textarea type="text" id="form82" class="form-control""></textarea>
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