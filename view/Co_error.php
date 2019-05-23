<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
    <div class="container">
        <div class="row">
        <div class="error_co">
            <h1>Vous n'est pas autorisez sur cette page</h1>
        </div>
    </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>