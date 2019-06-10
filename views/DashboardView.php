<?php $title = 'Dashboard'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="d-flex justify-content-center">
            <h1 class="title text-primary mb-3">Dashboard</h1>
        </div>
        <div class="container">
            <div class="row dashboard">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?action=dashboard"">Vos articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=dashboardcom">Vos Commentaires</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?action=dashboardcomtovalidated">Vos commentaires
                                    a valider</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <?php foreach ($result_post

                                       as $post_data) : ?>
                            <?php if (!isset($_SESSION['username'])) : ?>
                                <em></em>
                            <?php elseif ($_SESSION['username'] == $post_data->getAuthor()): ?>
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start ">
                                    <p> le <?= $post_data->getDate() ?></p>
                                    <p><?= nl2br(htmlspecialchars($post_data->getContent())) ?></p>
                                    <div class="sameline">
                                        <em><a class="btn btn-outline-warning"
                                               href="index.php?action=modifpost&id=<?= $post_data->getNumber() ?>">Modifier</a></em>
                                        <em><a class="btn btn-outline-danger confirmation"
                                               href="index.php?action=supprpost&id=<?= $post_data->getNumber() . '&author=' . $post_data->getAuthor() ?>">Supprimer</a></em>
                                        <em><a class="btn btn-outline-info"
                                               href="index.php?action=post&id=<?= $post_data->getNumber() ?>">Voir
                                                l'article et les
                                                commentaires</a></em>
                                    </div>
                                </div>
                            <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>