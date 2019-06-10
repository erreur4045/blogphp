<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <h2 class="titleindex">Derniers billets du blog :</h2>
            </div>
        </div>
        <div class="container">
            <?php foreach ($posts as $post_data) : ?>
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start ">
                        <h3 class="titlenews">
                            <?= ucfirst(htmlspecialchars($post_data->getTitle())) ?>
                        </h3>
                        <h4 class="titlenews"><em>le <?= date('d/m/Y', strtotime($post_data->getDate())) ?></em><em>
                                Ecrit
                                par <?= ucfirst($post_data->getAuthor()) ?></em></h4>
                        <h6 class="font-italic">chapo :</h6>
                        <p class="articleindex">
                            <?= substr(nl2br(htmlspecialchars($post_data->getContent())), 0, 90); ?>
                        </p>
                        <p><a class="btn btn-outline-info"
                              href="index.php?id=<?= $post_data->getNumber() ?>&action=post">Article
                                détaillé</a>
    <?php if (!isset($_SESSION['username'])) : ?>
        <em></em>
                            <?php elseif (($_SESSION['username']) == $post_data->getAuthor()) : ?>
                                <em><a class="btn btn-outline-danger confirmation"
                                       href="index.php?action=supprpostlistpost&id=<?= $post_data->getNumber() . '&author=' . $post_data->getAuthor() ?>">Supprimer</a></em>
                            <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
<?php if (!isset($_SESSION['username'])) : ?>
    <em></em>
<?php elseif (isset($_SESSION['username']) && $_SESSION['grade'] == 1 OR $_SESSION['grade'] == 2) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="row align-items-center">
                    <a class="btn btn-warning" href="index.php?action=addnewpost">Ajouter un article</a>
                </div>
            </div>
        </div>
<?php endif; ?>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>