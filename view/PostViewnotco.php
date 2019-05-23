<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <div class="container">
            <div class="row">
                <p><a href="index.php">Retour à la liste des billets</a></p>

                <div class="news">
                    <h3 class="titrefull">
                        <?= htmlspecialchars($post['title']) ?>
                        <em> le <?= $post['creation_date_fr'] ?></em>
                    </h3>

                    <p class="articlefull">
                        <?= nl2br(htmlspecialchars($post['content'])) ?>
                    </p>
                </div>

                <h2>Commentaires</h2>
            </div>
        </div>
        <?php
        while ($comment = $comments->fetch()) {
            ?>
            <div class="container">
                <div class="row">
                    <p class="author"><strong><?= htmlspecialchars($comment['autor']) ?></strong>
                        le <?= $comment['comment_date_fr'] ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['text'])) ?></p>
                    <em><a href="index.php?action=modifcomment&id=<?= $comment['id'];
                        echo '&';
                        echo 'idpost=' . $post['number'] ?>">Modifier</a></em>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>