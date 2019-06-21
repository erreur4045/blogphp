<?php $title = 'Dashboard'; ?>
<?php ob_start(); ?>
    <div class="main">
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
                                <a class="nav-link" href="index.php?action=dashboard">Vos articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?action=dashboardcom">Vos Commentaires</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?action=dashboardcomtovalidated">Vos commentaires à
                                    valider</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <?php foreach ($result_com as $com_data) : ?>
                            <?php if (!isset($_SESSION['username'])) : ?>
                                <em></em>
                            <?php elseif ($_SESSION['username'] == $com_data->getAutor()): ?>
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start ">
                                        <div class="">
                                            <p> le <?= $com_data->getComment_date() ?></p>
                                            <p><?= nl2br(htmlspecialchars($com_data->getText())) ?></p>
                                            <div class="sameline">
                                                <em><a class="btn btn-outline-warning"
                                                       href="index.php?action=modifcomment&id=<?= $com_data->getId() . '&idpost=' . $com_data->getPostid() ?>"
                                                       role="button">Modifier</a></em>
                                                <em><a class="btn btn-outline-danger confirmation"
                                                       href="index.php?action=supprcom&id=<?= $com_data->getId() . '&idpost=' . $com_data->getPostid() ?>"
                                                       role="button">Supprimer</a></em>
                                                <em><a class="btn btn-outline-info"
                                                       href="index.php?action=post&id=<?= $com_data->getPostid() ?>"
                                                       role="button">Voir
                                                        le post</a></em>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>