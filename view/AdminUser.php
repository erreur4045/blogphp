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
                                <a class="nav-link active href="index.php?action=adminusertobevalided"">Utilisateur à valider</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="index.php?action=adminuserlist"">Liste des utilisateurs</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <?php foreach ($list_user as $user_data) : ?>
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start ">
                                    <p> <?= ucfirst($user_data->getPseudo()) . ' inscrit le : ' . $user_data->getDatesub()  ?></p>
                                    <div class="sameline">
                                    <em><a class="btn btn-outline-success"
                                           href="index.php?action=accceptuser&id=<?= $user_data->getId()  ?>">Accepeter</a></em>
                                    <em><a class="btn btn-outline-danger confirmation"
                                           href="index.php?action=suppuser&id=<?= $user_data->getId()?>">Refuser l'inscription</a></em>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>