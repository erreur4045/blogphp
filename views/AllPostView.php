<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
            <div class="d-flex justify-content-center">
                <h1 class="title text-primary mb-3">Articles</h1>
            </div>
        <div class="site-section bg-light" id="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ml-auto">
                        <div class="row">
                            <?php foreach ($posts as $post_data) : ?>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                    <div class="service h-100">
                                        <span class="icon-photo_album display-4 text-primary d-block mb-4"></span>
                                        <h3 class="title text-primary mb-3">
                                            <?= ucfirst(htmlspecialchars($post_data->getTitle())) ?>
                                        </h3>
                                        <h4 class="titlenews"><em>le <?= date('d/m/Y',
                                                    strtotime($post_data->getDate())) ?></em><em>
                                                Écrit
                                                par <?= ucfirst($post_data->getAuthor()) ?></em></h4>
                                        <h6 class="font-italic">chapo :</h6>
                                        <p class="articleindex">
                                            <?= substr(nl2br(htmlspecialchars($post_data->getContent())), 0, 90); ?>
                                        </p>
                                        <p><a class="readmore"
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
                    </div>
                </div>
            </div>
            <?php if (!isset($_SESSION['username'])) : ?>
                <em></em>
            <?php elseif (isset($_SESSION['username']) && $_SESSION['grade'] == 1 OR $_SESSION['grade'] == 2) : ?>
                <div class="container">

                        <div class="col-md-12"></div>
                            <div class="d-flex justify-content-center">
                            <a class="btn btn-primary btn-md" href="index.php?action=addnewpost">Ajouter un article</a>
                        </div>
                    </div>
            <?php endif; ?>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>