<?php $title = 'Dashboard'; ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h1>Voici vos posts</h1></div>
            <div class="col-md-6"><h1>Voici vos Commentaires</h1></div>
        </div>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-6">
<?php while ($posts = $result_post->fetch()) : ?>
    <?php if (!isset($_SESSION['username'])) : ?>
        <em></em>
    <?php elseif ($_SESSION['username'] == $posts['author']): ?>

                    <div class="articleco" style="border: 3px solid var(--color-tree);>
                <p class=" author"> le <?= $posts['date'] ?></p>
                    <p><?= nl2br(htmlspecialchars($posts['content'])) ?></p>
                    <!-- Ajouter function modifier article -->
                    <em><a href="index.php?action=modifpost&id=<?= $posts['number'] ?>">Modifier</a></em>
                </div>
    <?php endif; ?>
<?php endwhile; ?>
    </div>
    <div class="col-md-6">
<?php while ($com = $result_com->fetch()) : ?>
    <?php if (!isset($_SESSION['username'])) : ?>
        <em></em>
    <?php elseif ($_SESSION['username'] == $com['autor']): ?>
                    <div class="articleco" style="border: 3px solid var(--color-tree);>
                <p class=" author"> le <?= $com['comment_date_fr'] ?></p>
                    <p><?= nl2br(htmlspecialchars($com['text'])) ?></p>
                    <em><a href="index.php?action=modifcomment&id=<?= $com['id']. '&idpost=' . $com['post_id'] ?>">Modifier</a></em>
                </div>
    <?php endif; ?>
<?php endwhile; ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>