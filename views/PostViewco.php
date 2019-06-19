<?php $title = $post->getTitle(); ?>
<?php ob_start(); ?>
<div class="main">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="btn btn-info"><a href="index.php?action=listAllPosts">Retour à la liste des articles</a>
                    </p>
                    <?php if (isset($_SESSION['username']) && ($_SESSION['username'] == $post->getAuthor())) : ?>
                    <div class="btn-group-vertical-var">
                        <a class="btn btn-outline-warning" href="index.php?action=modifpost&id=<?= $post->getNumber()?>">Modifier votre aticle</a>
                    </div>
                    <?php endif; ?>
                    <div class="contact-form">
                        <h3 class="title text-primary mb-3"><?= ucfirst(htmlspecialchars($post->getTitle())) ?></h3>
                        <em><h5><?= 'Le ' . $post->getDate() . ' par ' . $post->getAuthor() ?></h5></em>
                        <p><?php echo nl2br(htmlspecialchars($post->getContent())); ?></p>
                    </div>
                </div>
            </div>
    </div>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center title text-primary mb-3">Commentaires</h2>
                    <?php foreach ($comments as $comment_data) : ?>
                        <div class="card mb-4 box-shadow h-md-250">
                            <div class="card-body align-items-start ">
                                <p><strong><?= 'Par ' . ucfirst(htmlspecialchars($comment_data->getAutor())) ?></strong><em>
                                        le <?= $comment_data->getComment_date() ?>
                                    </em></p>
                                <p><?= nl2br(htmlspecialchars($comment_data->getText())) ?></p>
                                <?php if (isset($_SESSION['username']) && ($_SESSION['username'] == $comment_data->getAutor())) : ?>
                                    <div class="btn-group-vertical-var">
                                        <em><a class="btn btn-outline-warning"
                                               href="index.php?action=modifcomment&id=<?= $comment_data->getId() . '&idpost=' . $post->getNumber() ?>">Modifier</a></em>
                                        <em><a class="btn btn-outline-danger confirmation"
                                               href="index.php?action=supprcom&id=<?= $comment_data->getId() . '&idpost=' . $post->getNumber() ?>">Supprimer</a></em>
                                    </div>
                                <?php elseif (isset($_SESSION['username']) && ($_SESSION['username'] == $post->getAuthor())) : ?>
                                    <em><a class="btn btn-outline-danger confirmation"
                                           href="index.php?action=supprcom&id=<?= $comment_data->getId() . '&idpost=' . $post->getNumber() ?>">Supprimer</a></em>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </div>
    <?php if (isset($_SESSION['username'])) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Ajouter un commentaire</h3>
                    <form class="contact-form"
                          action="index.php?<?php echo 'idpost=' . $post->getNumber() ?>&action=comment" method="post">
                        <div class="d-flex justify-content-center">
                            <textarea class="form-control" name="comments" placeholder="Votre message"></textarea>
                        </div>
                        <input class="btn btn-info" type="submit" value="Submit" id="btnviewpost">
                    </form>
                </div>
            </div>
        </div>
    <?php elseif (!isset($_SESSION['username'])) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title text-primary mb-3">Pour ajoutez un commentaire connectez vous</h3>
                    <em><a class="btn btn-outline-info text-primary mb-3" href="index.php?action=connection">Connection</a></em>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
