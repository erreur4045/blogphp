<?php $title = 'Ma bio'; ?>
<?php ob_start(); ?>
    <div class="site-section bg-light" id="what-we-do-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 section-title">
                    <span class="sub-title mb-2 d-block">Maxime THIERRY</span>
                    <h2 class="title text-primary">Developpeur PHP</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ml-auto">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mb-6 mb-lg-6">
                            <div class="service h-100">
                                <span class="icon-photo_album display-4 text-primary d-block mb-4"></span>
                                <h3>Bio</h3>
                                <p>Né à Paris en 1992, j'ai passé une moitié de mon enfance à Paris, puis à Toulouse.
                                    <br>


                                    Je suis remonté à Paris quand j'avais 18 ans pour reprendre mes études, car j’avais
                                    l'opportunité de
                                    rentrer dans le domaine de la logistique dans lequel j'ai passe un bac, puis un BTS,
                                    ainsi qu'une
                                    licence.
                                    J'ai découvert ce domaine très intéressant que j'ai pu le découvrir en alternance
                                    chez AREVA
                                    ,domaine de l'énergie nucléaire qui me passionne tout particulièrement au vu des
                                    enjeux très
                                    important qu’il génère.</p>

                                Une fois ma licence acquise, j'ai voulu assouvir une de mes nombreuses autres passions,
                                l'informatique et l'environnement qui l'entoure.
                                C'est ainsi que je me suis inscrit à l'école Etna, à Ivry-sur-Seine. <br>

                                <p>
                                    En parallèle de cette inscription, j'ai pris connaissance de l'existence de l'école
                                    42, et de cet
                                    enseignement novateur qui m'a beaucoup plu et je me suis donc inscrite pour le
                                    concours.
                                    le concept de cette école : pas de prof, autonomie totale des élèves dans leur
                                    apprentissage en
                                    valorisant l'entraide et “peer to peer” des connaissances entre élèves.
                                </p>
                                <p>
                                    J’ai donc passé les premiers tests sur internet pour savoir si j'ai été admissible
                                    au concours, et à
                                    ma grande joie je l'ai été.
                                    <br>
                                    Cela m'a amené à faire la piscine, c'est le nom qu'ils utilisaient pour désigner le
                                    concours, et
                                    c'est donc la première fois de ma vie dans cette école, que j'ai codé un programme
                                    informatique.
                                    Ça a été l'une des expériences les plus intenses de ma vie, une revelation, un mois
                                    entouré de gens
                                    très intéressant et passionné dans une multitude de domaines, unis autour d'une même
                                    passion,
                                    l'informatique et la programmation.
                                    <br>
                                    Malheureusement, après un mois, je n'ai pas été accepté dans cette école et j'ai
                                    commencé mon cursus
                                    dans l'école de l'Etna.
                                    <br>
                                    Cette école se faisait en alternance, et grâce à mon année précédente en logistique
                                    dans la société
                                    Bazarchic, j'ai été accepté dans le service informatique, car j'y avais été un bon
                                    "apprenti" durant
                                    mon année en logistique.
                                    Cependant, après quelques problèmes de santé, j'ai dû arrêter un an après, c'est
                                    ainsi, que j'ai
                                    quelques mois après repris mes études grâce à openclassrooms, commencé en septembre
                                    2018.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>