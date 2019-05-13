<?php $title = 'Mon blog'; ?>

<?php header( "refresh:5;url=index.php?action=connectionadmin" ); ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
        <div class="error_co">
            <h1>Username ou MDP incorrect, verrifiez les informations</h1>
            <h2>Vous allez être rediriger </h2>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>