<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
    <div class="row">
        <div class="col-md-4 "></div>
        <h2 class="">Derniers articles du blog :</h2>
    </div>
    <div class="container">
        <?php foreach ($posts as $post_data) : ?>
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start ">
                    <h3 class="titlenews">
                        <?= ucfirst(htmlspecialchars($post_data->getTitle())) ?>
                    </h3>
                    <h4 class="titlenews"><em>le <?= date('d M Y',
                                strtotime($post_data->getDate()))/* = date("d-m-Y")*/ ?></em><em> Ecrit
                            par <?= ucfirst($post_data->getAuthor()) ?></em></h4>
                    <h6 class="font-italic">chapo :</h6>
                    <p class="articleindex">
                        <?= substr(nl2br(htmlspecialchars($post_data->getContent())), 0, 90); ?>
                    </p>
                    <p><a class="btn btn-outline-info" href="index.php?id=<?= $post_data->getNumber() ?>&action=post">Article
                            détaillé</a>
                        <?php if (($_SESSION['username']) == $post_data->getAuthor()) : ?>
                            <em><a class="btn btn-outline-danger confirmation"
                                   href="index.php?action=supprpostlistpost&id=<?= $post_data->getNumber() . '&author=' . $post_data->getAuthor() ?>">Supprimer</a></em>
                        <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-5 col-md-offset-1">
        <a class="btn btn-warning" href="index.php?action=listAllPosts">Voir tout les articles</a>
    </div>
<?php if (isset($_SESSION['username'])) : ?>
    <div class="col-md-6">
        <a class="btn btn-warning" href="index.php?action=addnewpost">Ajouter un article</a>

    </div>
    </div>
    </div>
    </div>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>