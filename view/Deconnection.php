<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php header( "refresh:5;url=index.php" ); ?>
    <div class="container">
        <div class="row">
            <div class="deconnection">
                <h1>Merci de votre visite</h1>
                <h2>Vous allez être rediriger </h2>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>