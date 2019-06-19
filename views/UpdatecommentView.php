<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
<?php if (!isset($_SESSION['username'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Vous devez être connecté pour utiliser cette fonctionnalité.</h3>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                <h3>Modifier le commentaire</h3>
                <form action="index.php?idpost=<?php echo $_GET['idpost'] . '&id=' . $_GET['id'] ?>&action=updatecomment"
                      method="post">
                    <p class="">Ancien commentaire : </p>
                    <p><?php echo $old_com_for_view->getText() ?></p>
                    <textarea class="form-control" name="comments"
                              placeholder="Votre nouveau commentaire"></textarea>
                    <input class="btn btn-outline-warning" type="submit" value="Submit">
                </form>
            </div>
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>