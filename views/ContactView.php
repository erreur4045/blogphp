<?php $title = 'Contact'; ?>

<?php ob_start(); ?>
    <div class="main bg-light">
        <div class="container ">
        <div class="site-section " id="contact-section">
            <div class="container">
                <form action="index.php?action=contacter" class="contact-form" method="post">
                    <div class="section-title text-center mb-5">
                        <span class="sub-title mb-2 d-block">Restons en contact</span>
                        <h2 class="title text-primary">Contactez moi</h2>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <input required="required" name="firstname" type="text" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="col-md-6">
                            <input required="required" name="lastname" type="text" class="form-control" placeholder="Nom">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <input required="required" name="mail" type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <input required="required" name="subject" type="text" class="form-control" placeholder="Sujet">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <textarea required="required" class="form-control" name="content" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-md">Envoyer</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>