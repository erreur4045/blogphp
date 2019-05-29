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
                                <a class="nav-link active" href="index.php?action=dashboardcom">Vos Commentaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?action=dashboardcomtovalidated">Vos commentaires a
                                    valider</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <?php while ($com = $result_com->fetch()) : ?>
                            <?php if (!isset($_SESSION['username'])) : ?>
                                <em></em>
                            <?php elseif ($_SESSION['username'] == $com['autor']): ?>
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start ">
                                        <div class="">
                                            <p> le <?= $com['comment_date_fr'] ?></p>
                                            <p><?= nl2br(htmlspecialchars($com['text'])) ?></p>
                                            <em><a class="btn btn-outline-warning"
                                                   href="index.php?action=modifcomment&id=<?= $com['id'] . '&idpost=' . $com['post_id'] ?>"
                                                   role="button">Modifier</a></em>
                                            <em><a class="btn btn-outline-danger confirmation"
                                                   href="index.php?action=supprcom&id=<?= $com['id'] . '&idpost=' . $com['post_id'] ?>"
                                                   role="button">Supprimer</a></em>
                                            <em><a class="btn btn-info"
                                                   href="index.php?action=post&id=<?= $com['post_id'] ?>" role="button">Voir
                                                    le post</a></em>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>