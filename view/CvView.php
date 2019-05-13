
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="cvstyle">
                <h1>CV</h1>
<embed src=cv.pdf width=1000 height=800 type='application/pdf'/>
            </div>
        </div>
    </div>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="cv_telechargement_style">
            <a href="cv.pdf" download="CV">Télécharger le CV au format PDF</a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>