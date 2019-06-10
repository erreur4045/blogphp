<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="main bg-light">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="container ">
        <div class="site-section " id="contact-section">
            <div class="container">
                <form action="" class="contact-form">
                    <div class="section-title text-center mb-5">
                        <span class="sub-title mb-2 d-block">Restons en contact</span>
                        <h2 class="title text-primary">Contactez moi</h2>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <input name="firstname" type="text" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="col-md-6">
                            <input name="lastname" type="text" class="form-control" placeholder="Nom">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <input name="mail" type="text" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-md">Send Message</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>