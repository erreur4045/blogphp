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
                        <div class="col-md-12">
                            <?php while ($posts = $result_post->fetch()) : ?>
                            <?php if (!isset($_SESSION['username'])) : ?>
                                <em></em>
                            <?php elseif ($_SESSION['username'] == $posts['author']): ?>
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start ">
                                    <div class=""
                                    <p> le <?= $posts['date'] ?></p>
                                    <p><?= nl2br(htmlspecialchars($posts['content'])) ?></p>
                                    <em><a class="btn btn-outline-warning"
                                           href="index.php?action=modifpost&id=<?= $posts['number'] ?>">Modifier</a></em>
                                    <em><a class="btn btn-outline-danger confirmation"
                                           href="index.php?action=supprpost&id=<?= $posts['number'] . '&author=' . $posts['author'] ?>">Supprimer</a></em>
                                    <em><a class="btn btn-outline-info"
                                           href="index.php?action=post&id=<?= $posts['number'] ?>">Voir l'article et les
                                            commentaires</a></em>
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