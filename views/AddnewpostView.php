<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="contact-form">
                    <h3 class="title text-primary mb-3"> Ajouter un article :</h3>
                    <form action="index.php?action=validpost" class="form_control" method="post">
                        <form action="index.php?action=contacter">
                            <div class="md-form">
                                <i class="fa fa-tag prefix white-text"></i>
                                <label for="form32">Titre de l'article :</label>
                                <input type="text" name="title" id="form32" class="form-control"
                                       placeholder="Titre de l'article" required="required">
                            </div>
                            <div class="md-form">
                                <i class="fas fa-align-left"></i>
                                <label for="form82" class="">Contenu de l'article :</label>
                                <textarea name="content" type="text" id="form82" class="form-control"
                                          placeholder="Votre article" required="required"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-md">Envoyer <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require'template.php'; ?>