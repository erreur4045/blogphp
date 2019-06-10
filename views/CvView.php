<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div>
            <iframe src="images/cv.pdf" style="width: 100%;height: 800px;border: none;"></iframe>
        </div>
        <div class="d-flex justify-content-center">
        <div class="row">

            <div class="col-md-12 readmore">
                <a href="src/cv.pdf" download="CV">Télécharger le CV au format PDF</a>
            </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>