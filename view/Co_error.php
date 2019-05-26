<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
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