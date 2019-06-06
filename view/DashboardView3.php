<?php $title = 'Dashboard'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <h1 class="textcenter">Dashboard</h1>
        <div class="container">
            <div class="row dashboard">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=dashboard">Vos articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=dashboardcom">Vos Commentaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?action=dashboardcomtovalidated">Vos
                                    commentaires a valider</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <?php foreach ($result_com as $com_data) : ?>
                            <?php if (!isset($_SESSION['username'])) : ?>
                                <em></em>
                            <?php elseif (1 == 1): ?>
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start ">
                                        <p> le <?= $com_data->getComment_date() ?></p>
                                        <p> le contenue de l'article : </p>
                                        <?php foreach ($result_post as $com_dataa) : ?>
                                            <?php if ($com_data->getPostid() == $com_dataa->getNumber()) : ?>
                                                <p><?= nl2br(htmlspecialchars($com_dataa->getContent())) ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <p>Nouveau commentaire :</p>
                                        <p><?= nl2br(htmlspecialchars($com_data->getText())) ?></p>
                                        <div class="sameline">
                                            <em><a class="btn btn-outline-warning "
                                                   href="index.php?action=validcomment&id=<?= $com_data->getId() . '&idpost=' . $com_data->getPostid() ?>"
                                                   role="button">Valider le commentaire</a></em>
                                            <em><a class="btn btn-info"
                                                   href="index.php?action=post&id=<?= $com_data->getPostid() ?>"
                                                   role="button">Voir
                                                    le post</a></em>
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
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>