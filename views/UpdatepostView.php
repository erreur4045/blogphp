<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<?php if (isset($_SESSION['username'])): ?>
    <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="index.php?action=validupdatepost&id=<?= $_GET['id'] ?>" class="form_contact"
                      method="post">
                    <div class="contact-form">
                        <h3><i class="fa fa-align-left"></i> Modifier un article</h3>
                        <div class="form_in">
                            <!--todo : largeur du titre trop petite http://localhost/accent/index.php?action=modifpost&id=52-->
                            <label for="title" class="">Titre:</label><br>
                            <input name="title" id="title" class="title_post" value="<?= $data_view->getTitle() ?>"></div>
                        <div class="form_in">
                            <label for="content" class="content_post">Contenue de l'article:</label><br>
                            <textarea name="content" class="form-control"
                                      required><?= $data_view->getContent()  ?></textarea>
                            <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                        </div>
                </form>
        </div>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <h1 class="">Vous devez être connecté pour ajouter un article.</h1>
        </div>
    </div>
    </div>
<?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>