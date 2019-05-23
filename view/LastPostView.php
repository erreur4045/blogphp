<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
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
                <h4 class="titlenews"><em>le <?= $data['date'] = date("d-m-Y") ?></em><em> Ecrit
                        par <?= ucfirst($data['author']) ?></em></h4>

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
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="row align-items-center">
                <a href="index.php?action=listAllPosts">Voir tout les articles</a>
            </div>
        </div>
    </div>
<?php if (isset($_SESSION['username'])) : ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="row align-items-center">
                <a href="index.php?action=addnewpost">Ajouter un article</a>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>