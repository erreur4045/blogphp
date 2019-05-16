<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="accueil">
                <h1>Bienvenue sur la page d'accueil</h1>
                <p>Je me presente je suis Maxime THIERRY, ce site est le mon premier site en php/POO</p>
                <p>Ma devise: Sapere aude</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="form_acceuil">
                <form action="index.php?action=contacter">
                    <h2>Vous pouvez me contacter via ce formulaire</h2>
                    <div class=""><input type="text" name="username" id="username" class="" placeholder="Nom Prenom">
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
    </div>
    <div class="container">
        <div class="row">
            <div class="accueil">
                <h1>Vous trouverais un lien vers mon CV <a href="index.php?action=CV"> ici</a></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="accueil">
                <h1>Vous pouvez me suivre sur GitHub et LinkedIn</a></h1>
                <div class="container">
                <i class="fa fa-github" style="font-size:24px"><a href="google.com"></a></i>
                    <a href="#" ><i style="font-size:24px" class=" fa fa-github"></i></a>
                <i class="fa fa-linkedin-square" style="font-size:24px"></i>
                </div>
                </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('style/template.php'); ?>