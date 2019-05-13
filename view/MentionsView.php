
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mentions legales !</h1>
    <p>les mentions:</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>