<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>vous etes sur la page d'admin</h1>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>