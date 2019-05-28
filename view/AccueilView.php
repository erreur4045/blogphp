<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-2">
                <h1 class="display-4 font-italic">Bienvenue sur le projet 5, "Créez votre premier blog en PHP" </h1>
                <p class="lead my-3">Je me presente je suis Maxime THIERRY, ce site est le mon premier site en php/POO</p>
                <p class="lead my-3">Ma devise: Sapere aude</p>
                <p class="lead mb-0"><a href="index.php?action=bio" class="text-white font-weight-bold">Lire ma bio</a></p>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                        <div class="card bg-secondary form-white">
                            <div class="card-body">
                                <!-- Form contact -->
                                <form action="index.php?action=contacter">
                                    <h2 class="text-center py-4 font-bold font-up white-text">Contactez moi</h2>
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <input type="text" id="form32" class="form-control">
                                        <label for="form32">Votre nom/prenom</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <input type="text" id="form22" class="form-control">
                                        <label for="form22">Votre mail</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-tag prefix white-text"></i>
                                        <input type="text" id="form322" class="form-control">
                                        <label for="form342">Sujet</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix white-text"></i>
                                        <textarea type="text" id="form82" class="form-control""></textarea>
                                        <label for="form82" class="">Votre message</label>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg waves-effect waves-light">Envoyer</button>
                                    </div>
                                </form>
                                <!-- Form contact -->
                            </div>
                        </div>
                    </div>
            <div class="col-md-6">
                <div>
                    <iframe src="src/cv.pdf" style="width: 100%;height: 496px;border: none;"></iframe>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="accueil">
                    <h1>Vous pouvez me suivre sur GitHub et LinkedIn</a></h1>
                    <div class="container">
                        <a href="https://github.com/erreur4045" target="_blank"><i class="fab fa-github fa-7x"></i></a>
                        <a href="https://www.linkedin.com/in/maxime-thierry-93870a97/" target="_blank"><i class=" fab fa-linkedin fa-7x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>