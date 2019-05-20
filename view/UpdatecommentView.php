<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <body>
    <?php if (!isset($_SESSION['username'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Vous devez etre connecter pour utilisez cette fonctionalite</h3>
            </div>
        </div>
    </div>
        <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Modifier un commentaire</h3>
                    <form action="index.php?idpost=<?php echo $_GET['idpost'] . '&id=' . $_GET['id'] ?>&action=updatecomment" method="post">
                        <div class="d-flex justify-content-center">
                            <p class="">Ancien commentaire : </p>
                            <p><?php echo $old_com_for_view->getText() ?></p>
                            <textarea class="form-control" name="comments" placeholder="Votre nouveau commentaire"></textarea>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    <?php endif;?>
    </body>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>