
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="contact">
            <form action="index.php?action=validcontact" class="form_contact" method="post">
                <div class="form_in">
                    <h3><i class="fa fa-envelope"></i> Me contacter</h3>
                    <?php if (!isset($_SESSION['username'])) : ?>
                    <input type="text" name="username" id="username" class="username_in" placeholder="Nom Prénom">
                    <?php endif; ?>
                    <div class="form_in">
                        <label for="mail" class="mdp_in">Mail:</label><br>
                        <input type="email" name="mail" id="mail" class="mdp_in"  placeholder="mail@gmail.com">
                    </div>
                    <div class="form_in">
                        <label for="message" class="message_in">Message :</label><br>
                        <textarea class="form-control" placeholder="Votre message" required></textarea>
                        <br>
                        <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                    </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>