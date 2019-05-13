<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <h1 class="titleindex">Mon super blog !</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h2 class="titleindex">Derniers billets du blog :</h2>
        </div>
    </div>
<?php
while ($data = $posts->fetch()) {
    ?>
    <div class="container">
        <div class="row">
            <div class="news">
                <h3 class="titlenews">
                    <?= htmlspecialchars($data['title']) ?>
                </h3>
                <h4 class="titlenews"><em>le <?= $data['creation_date_fr'] = date('j-m-y') ?></em></h4>

                <p class="articleindex">
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                </p>
                <p class="hrefindex"><a class="hrefindex" href="index.php?id=<?= $data['number'] ?>&action=post">Commentaires</a>
                </p>

            </div>
        </div>
    </div>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>