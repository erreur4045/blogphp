<?php $title = 'Ma bio'; ?>

<?php ob_start(); ?>
<div class="main">
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info"><?= $_SESSION['message']; ?></div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start ">
                    <h1>Maxime THIERRY</h1>
                    <img src="src/moi.jpg" alt="" class="img-bio">
                    <h3>Developpeur PHP</h3>
                    <h3 class="">
                    </h3>
                    <h4 class="titlenews"></h4>
                    <p class="articleindex"></p>
                </div>
            </div>
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start ">
                    <p>Né à Paris en 1992, j'ai passé une moitié de mon enfance à Paris, puis à Toulouse. <br>


                        Je suis remonté à Paris quand j'avais 18 ans pour reprendre mes études, car j’avais l'opportunité de rentrer dans le domaine de la logistique dans lequel j'ai passe un bac, puis un BTS, ainsi qu'une licence.
                        J'ai découvert ce domaine très intéressant que j'ai pu le découvrir en alternance chez AREVA ,domaine de l'énergie nucléaire qui me passionne tout particulièrement au vu des enjeux très important qu’il génère.
                        <br>

                        Une fois ma licence acquise, j'ai voulu assouvir une de mes nombreuses autres passions, l'informatique et l'environnement qui l'entoure.
                        C'est ainsi que je me suis inscrit à l'école Etna, à Ivry-sur-Seine. <br>


                        En parallèle de cette inscription, j'ai pris connaissance de l'existence de l'école 42, et de cet enseignement novateur qui m'a beaucoup plu et je me suis donc inscrite pour le concours.
                        le concept de cette école : pas de prof, autonomie totale des élèves dans leur apprentissage en valorisant l'entraide et “peer to peer” des connaissances entre élèves.
                        <br>

                        J’ai donc passé les premiers tests sur internet pour savoir si j'ai été admissible au concours, et à ma grande joie je l'ai été.
                        <br>
                        Cela m'a amené à faire la piscine, c'est le nom qu'ils utilisaient pour désigner le concours, et c'est donc la première fois de ma vie dans cette école, que j'ai codé un programme informatique.
                        <br>
                        Ça a été l'une des expériences les plus intenses de ma vie, une revelation, un mois entouré de gens très intéressant et passionné dans une multitude de domaines, unis autour d'une même passion, l'informatique et la programmation.
                        <br>
                        Malheureusement, après un mois, je n'ai pas été accepté dans cette école et j'ai commencé mon cursus dans l'école de l'Etna.
                        <br>
                        Cette école se faisait en alternance, et grâce à mon année précédente en logistique dans la société Bazarchic, j'ai été accepté dans le service informatique, car j'y avais été un bon "apprenti" durant mon année en logistique.
                        Cependant, après quelques problèmes de santé, j'ai dû arrêter un an après, c'est ainsi, que j'ai quelques mois après repris mes études grâce à openclassrooms, commencé en septembre 2018.</p>
                </div>
            </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('style/template.php'); ?>