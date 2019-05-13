<!DOCTYPE html>
<html>
<body>
<div class="container">
    <div class="row">
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3 class="titrefull">
                <?= htmlspecialchars($post['title']) ?>
                <em> le <?= $post['creation_date_fr'] ?></em>
            </h3>

            <p class="articlefull">
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>
    </div>
</div>
<?php
while ($comment = $comments->fetch()) {
    ?>
    <div class="container">
        <div class="row">
            <p class="author"><strong><?= htmlspecialchars($comment['autor']) ?></strong>
                le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['text'])) ?></p>
            <em><a href="index.php?action=modifcomment&id=<?= $comment['id'];
                echo '&';
                echo 'idpost=' . $post['number'] ?>">Modifier</a></em>

        </div>
    </div>
    <?php
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Pour ajouter une commentaire connectez vous </h3>
            <!--<form action="index.php?<?php /*echo 'idpost=' . $post['number']; */?>&action=comment" method="post">
                <div class="d-flex justify-content-center">
                    <label for="name">Votre nom</label>
                    <input id="name" name="name" type="text" value="<?php /*echo $value; */?>" class="form-control"
                           required>
                    <br>
                    <textarea class="form-control" name="comments" placeholder="Votre message"></textarea>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>-->

</body>
</html>