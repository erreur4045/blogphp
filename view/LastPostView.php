<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <div class="row">
            <div class="col-md-4 "></div>
            <h2 class="">Derniers articles du blog :</h2>
        </div>
    <div class="container">
        <?php while ($data = $posts->fetch()) { ?>
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start ">
                <h3 class="titlenews">
                    <?= ucfirst(htmlspecialchars($data['title'])) ?>
                </h3>
                <h4 class="titlenews"><em>le <?= $data['date'] = date("d-m-Y") ?></em><em> Ecrit
                        par <?= ucfirst($data['author']) ?></em></h4>

                <p class="articleindex">
                    <?= substr(nl2br(htmlspecialchars($data['content'])),0,90); ?>
                </p>
                <p><a class="btn btn-outline-info" href="index.php?id=<?= $data['number'] ?>&action=post">Article
                        détaillé</a></p>
            </div>
        </div>
    <?php } $posts->closeCursor(); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                    <a class="btn btn-outline-warning" href="index.php?action=listAllPosts">Voir tout les articles</a>
            </div>
            <?php if (isset($_SESSION['username'])) :  ?>
            <div class="col-md-6">
                    <a class="btn btn-outline-warning" href="index.php?action=addnewpost">Ajouter un article</a>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>