<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="main">
    <h1>Mentions legales !</h1>
    <p>les mentions:</p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>