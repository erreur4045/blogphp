<?php $title = $post->getTitle(); ?>
<?php ob_start(); ?>
<div class="main">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <p class="textcenter"><a href="index.php?action=listAllPosts">Retour à la liste des billets</a></p>
            </div>
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start ">
                    <h3><?= ucfirst(htmlspecialchars($post->getTitle())) ?></h3>
                    <em> <h5><?= 'Le ' . $post->getDate() . ' par ' . $post->getAuthor() ?></h5></em>
                </h3>
                    <?= nl2br(htmlspecialchars($post->getContent())) ?>
                </p>
            </div>
            </div>
        </div>

        <h2>Commentaires</h2>
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start ">
        <?php while ($comment = $comments->fetch()) : ?>

        <div class="row">

            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start ">
            <div class="col-md-6">
                <div >

                <p><strong><?= 'Par ' . ucfirst(htmlspecialchars($comment['autor'])) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['text'])) ?></p>
                <?php if (isset($_SESSION['username']) && ($_SESSION['username'] == $comment['autor'])) : ?>
                    <em><a class="btn btn-outline-warning" href="index.php?action=modifcomment&id=<?= $comment['id'] . '&idpost=' . $post->getNumber() ?>">Modifier</a></em>
                    <em><a class="btn btn-outline-danger confirmation" href="index.php?action=supprcom&id=<?= $comment['id'] . '&idpost=' . $post->getNumber() ?>">Supprimer</a></em>
                <?php elseif (isset($_SESSION['username']) && ($_SESSION['username'] == $post->getAuthor())) : ?>
                    <em><a class="btn btn-outline-danger confirmation" href="index.php?action=supprcom&id=<?= $comment['id'] . '&idpost=' . $post->getNumber() ?>">Supprimer</a></em>
                <?php endif; ?>
            </div>
            </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>
</div>
</div>
<?php if (isset($_SESSION['username'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Ajouter un commentaire</h3>
                <form action="index.php?<?php echo 'idpost=' . $post->getNumber() ?>&action=comment" method="post">
                    <div class="d-flex justify-content-center">
                        <textarea class="form-control" name="comments" placeholder="Votre message"></textarea>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
<?php elseif (!isset($_SESSION['username'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Pour ajoutez un commentaire connectez vous</h3>
                <em><a href="index.php?action=connection">Connection</a></em>
            </div>
        </div>
    </div>
    </div>
</div>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>
