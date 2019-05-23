
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['username'])): ?>
<div class="main">
<div class="container">
    <div class="row">
        <div class="addnewpost">
            <form action="index.php?action=validpost" class="form_contact" method="post">
                <div class="form_in">
                    <h3><i class="fa fa-align-left"></i> Ajouter un article</h3>
                    <div class="form_in">
                        <label for="title" class="title_post">Titre:</label><br>
                        <input name="title" id="title" class="title_post"  placeholder="Titre de l'article">
                    </div>
                    <div class="form_in">
                        <label for="content" class="content_post">Contenue de l'article:</label><br>
                        <textarea name="content" class="form-control" placeholder="Votre article" required></textarea>
                        <br>
                        <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                    </div>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <h1 class="">Vous devez etre connecte pour ajouter un article</h1>
        </div>
    </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>