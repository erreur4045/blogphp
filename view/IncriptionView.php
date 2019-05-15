<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="inscription">
                <form action="index.php?action=validinscription" class="form_in" method="post">
                    <div class="form_in">
                        <label for="username" class="username_in">Username:</label><br>
                        <input type="text" name="username" id="username" class="username_in">
                        <div class="form_in">
                            <label for="mdp" class="mdp_in">mdp:</label><br>
                            <input type="password" name="mdp" id="mdp" class="mdp_in">
                        </div>
                        <div class="form_in">
                            <label for="mdp" class="mdp_in">Mail:</label><br>
                            <input type="email" name="mail" id="mail" class="mdp_in">
                        </div>
                        <br>
                        <div><input type="submit" name="submit" class="btn" value="submit"></div>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>