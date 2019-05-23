<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>Bienvenue sur la page d'accueil</h1>
                    <p>Je me presente je suis Maxime THIERRY, ce site est le mon premier site en php/POO</p>
                    <p>Ma devise: Sapere aude</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form_acceuil">
                    <form action="index.php?action=contacter">
                        <h2>Vous pouvez me contacter via ce formulaire</h2>
                        <div class=""><input type="text" name="username" id="username" class=""
                                             placeholder="Nom Prenom">
                        </div>
                        <label for="form" class="">Mail</label>
                        <div class=""><input type="email" name="mail_accueil" id="mail_accueil" class=""
                                             placeholder="votre@mail.com"></div>
                        <div class="">
                            <label for="message" class="message_in">Message :</label><br>
                            <textarea class="form-control" placeholder="Votre message" required></textarea>
                            <br>
                            <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="accueil">
                    <h1>Vous pouvez trouver un lien vers mon CV <a href="index.php?action=CV"> ici</a></h1>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <div class="accueil">
                        <h1>Vous pouvez me suivre sur GitHub et LinkedIn</a></h1>
                        <div class="container">
                            <a href="https://github.com/erreur4045" target="_blank"><i style="font-size:48px"
                                                                                       class=" fa fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/maxime-thierry-93870a97/" target="_blank"><i
                                        style="font-size:48px" class=" fa fa-linkedin-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>