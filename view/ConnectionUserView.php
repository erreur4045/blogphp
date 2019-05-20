<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h2 class="text-center">Connection</h2>
    <div class="container">
        <div class="row">
            <form action="index.php?action=connectionuser" class="form_con" method="post">
                <div class="form_co">
                    <label for="username" class="username_co">Username:</label><br>
                    <input type="text" name="username" id="username" class="username_co">
                    <div class="form_co">
                        <label for="mdp" class="mdp_co">mdp:</label><br>
                        <input type="password" name="mdp" id="mdp" class="mdp_co">
                    </div>
                    <br>
                    <div><input type="submit" name="submit" class="btn btn-primary" value="submit"></div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h3 class="">Vous n'etes pas inscrit ?<span><a href="index.php?action=inscription" class="small"> Incription</a></span></h3>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>