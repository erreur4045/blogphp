<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
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
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start ">
                            <h3 class="titlenews">
                                <?= htmlspecialchars($data['title']) ?>
                            </h3>
                            <h4 class="titlenews"><em>le <?= $data['date'] /*= date('j-m-y') */ ?></em><em> Ecrit
                                    par <?= ucfirst($data['author']) ?></em></h4>

                            <p class="articleindex">
                                <?= nl2br(htmlspecialchars($data['content'])) ?>
                            </p>
                            <p class="hrefindex"><a class="hrefindex"
                                                    href="index.php?id=<?= $data['number'] ?>&action=post">Commentaires</a>
                            </p>
                        </div>
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
                    <a href="index.php?action=addnewpost">Ajouter un article</a>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>