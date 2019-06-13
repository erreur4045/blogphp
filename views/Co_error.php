<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <div class="container textcenter">
            <div class="row">
                <div class="col-md-12">
                    <div class="error_co">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-hand-paper fa-9x"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1 class="title text-primary mb-3">Vous n'est pas autorisé sur cette page</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>