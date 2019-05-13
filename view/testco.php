<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>vous etes sur la page de connection</h1>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>