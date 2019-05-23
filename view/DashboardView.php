<?php $title = 'Dashboard'; ?>
<?php ob_start(); ?>
    <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <h1>Voici vos posts</h1>
                <?php while ($posts = $result_post->fetch()) : ?>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <em></em>
                <?php elseif ($_SESSION['username'] == $posts['author']): ?>
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start ">
                        <div class=""
                        <p> le <?= $posts['date'] ?></p>
                        <p><?= nl2br(htmlspecialchars($posts['content'])) ?></p>
                        <em><a class="btn btn-outline-warning" href="index.php?action=modifpost&id=<?= $posts['number'] ?>">Modifier</a></em>
                        <em><a class="btn btn-outline-danger confirmation" href="index.php?action=supprpost&id=<?= $posts['number'].'&author='.$posts['author']?>" >Supprimer</a></em>
                        <em><a class="btn btn-outline-info" href="index.php?action=post&id=<?= $posts['number'] ?>">Voir l'article et les commentaires</a></em>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <div class="col-md-6">
            <h1>Voici vos Commentaires</h1>
            <?php while ($com = $result_com->fetch()) : ?>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <em></em>
                <?php elseif ($_SESSION['username'] == $com['autor']): ?>
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start ">
                            <div class="">
                                <p> le <?= $com['comment_date_fr'] ?></p>
                                <p><?= nl2br(htmlspecialchars($com['text'])) ?></p>
                                <em><a class="btn btn-outline-warning" href="index.php?action=modifcomment&id=<?= $com['id'] . '&idpost=' . $com['post_id'] ?>"role="button">Modifier</a></em>
                                <em><a class="btn btn-outline-danger confirmation" href="index.php?action=supprcom&id=<?= $com['id'] . '&idpost=' . $com['post_id'] ?>"role="button">Supprimer</a></em>
                                <em><a class="btn btn-info" href="index.php?action=post&id=<?= $com['post_id'] ?>" role="button">Voir le post</a></em>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>