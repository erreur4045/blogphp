<?php $title = $post->getTitle(); ?>
<?php ob_start(); ?>
<div class="main">
    <div class="container">
        <div class="row">
            <p><a href="index.php?action=listAllPosts">Retour à la liste des billets</a></p>

            <div class="news">
                <h3 class="titrefull">
                    <?= htmlspecialchars($post->getTitle()) ?>
                    <em> le <?= $post->getDate() ?></em>
                </h3>

                <p class="articlefull">
                    <?= nl2br(htmlspecialchars($post->getContent())) ?>
                </p>
            </div>

            <h2>Commentaires</h2>
        </div>
    </div>
    <?php while ($comment = $comments->fetch()) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="articleco" style="border: 3px solid var(--color-tree);>
                <p class=" author"><strong><?= htmlspecialchars($comment['autor']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['text'])) ?></p>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <em></em>
                <?php elseif ($_SESSION['username'] == $comment['autor']): ?>
                    <em><a class="btn btn-outline-warning" href="index.php?action=modifcomment&id=<?= $comment['id'] . '&idpost=' . $post->getNumber() ?>">Modifier</a></em>
                    <em><a class="btn btn-outline-danger confirmation" href="index.php?action=supprcom&id=<?= $comment['id'] . '&idpost=' . $post->getNumber() ?>">Supprimer</a></em>
                <?php endif; ?>
                <br>
                <br>
            </div>
            <br>
        </div>
    </div>
</div>
    </div>
<?php endwhile; ?>
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
<?php endif; ?>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>
