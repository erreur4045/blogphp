<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="main">
    <div>
            <iframe src="src/cv.pdf" style="width: 100%;height: 500px;border: none;"></iframe>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="cv_telechargement_style">
                <a href="src/cv.pdf" download="CV">Télécharger le CV au format PDF</a>
            </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>