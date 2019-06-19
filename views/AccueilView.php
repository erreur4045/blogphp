<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-blocks-cover" id="home-section">
            <div class="img-wrap">
                <div class="owl-carousel slide-one-item hero-slider">
                    <div class="slide overlay">
                        <img src="images/hero_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="slide overlay">
                        <img src="images/hero_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="slide overlay">
                        <img src="images/hero_3.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 align-self-center">
                        <div class="intro">
                            <div class="heading">
                                <h1>Blog personnel de Maxime THIERRY</h1>
                            </div>
                            <div class="text">
                                <p class="sub-text mb-5">Développeur PHP7 MVC POO</p>
                                <p><a href="index.php?action=bio" class="btn btn-primary btn-md">Bio</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- END .site-blocks-cover -->

        <div class="site-section" id="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5">
                        <img src="images/hero_3.jpg" alt="Image" class="img-fluid" class="img-fluid">
                    </div>
                    <div class="col-lg-5 ml-auto section-title">
                        <span class="sub-title mb-2 d-block">Compétences</span>
                        <h2 class="title text-primary mb-3">Developpement en PHP</h2>
                        <p class="mb-4"><span>PHP: Hypertext Preprocessor, plus connu sous son sigle PHP, est un langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant également fonctionner comme n'importe quel langage interprété de façon locale. </span></p>


                        <div class="d-flex">
                            <ul class="list-unstyled ul-check success mr-5">
                                <li>Design CSS 4</li>
                                <li>Development PHP 7</li>
                                <li>Back-end</li>
                                <li>Front-end</li>
                                <li>Programmation orientée objet (POO)</li>
                                <li>Architecture MVC</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .END site-section -->

        <div class="site-section bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-6 section-title">
                        <span class="sub-title mb-2 d-block">L'équipe de développement</span>
                        <h2 class="title text-primary">Je vous propose des solutions de développement de site web</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5 person">
                        <img src="images/moi3.jpg" alt="Image" class="img-fluid mb-5">

                        <div class="row">
                            <div class="col-lg-10 ml-auto">
                                <div class="pr-lg-5">
                                    <h3>Maxime THIERRY</h3>
                                    <span class="mb-4 d-block">Développeur PHP</span>
                                    <p>Parisien né en 1992, j’ai commencé a développé d’abord en C puis en PHP il y a 3 ans.</p>
                                    <p>J'ai commencé le parcours Développeur d'application - PHP/Symfony en septembre 2018. Je suis actuellement au projet 5 "Créez votre premier blog en PHP". Vous êtes actuellement sur le rendu de ce projet.</p>

                                    <p>Retrouvez moi sur les reseaux sociaux :</p>
                                    <p class="d-flex align-items-center">
                                        <a href="https://twitter.com/mapethierry" class="twitter pr-2 pt-2 pb-2 pl-0"><span class="icon-twitter"></span></a>
                                        <a href="https://www.facebook.com/yrreiht.emixam?ref=bookmarks" class="facebook p-2"><span class="icon-facebook"></span></a>
                                        <a href="https://www.linkedin.com/in/maxime-thierry-93870a97/" class="linkedin p-2"><span class="icon-linkedin"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-section" id="what-we-do-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-6 section-title">
                        <span class="sub-title mb-2 d-block">Ce que je fais</span>
                        <h2 class="title text-primary">Voici un aperçu des solutions que je peux mener à bien pour votre projet</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 ml-auto">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <span class="icon-photo_album display-4 text-primary d-block mb-4"></span>
                                    <h3>Web Design</h3>
                                    <p>La conception de site web ou web design est la conception de l'interface web : l’architecture interactionnelle, l’organisation des pages, l’arborescence et la navigation dans un site web.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <span class="icon-laptop_mac display-4 text-primary d-block mb-4"></span>
                                    <h3>Web Development</h3>
                                    <p>Le développement Web est le travail nécessaire pour développer un site Web pour Internet ou un intranet.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <span class="icon-layers display-4 text-primary d-block mb-4"></span>
                                    <h3>Web Apps</h3>
                                    <p>En informatique, une application web est une application manipulable directement en ligne grâce à un navigateur web et qui ne nécessite donc pas d'installation sur les machines clientes, contrairement aux applications mobiles.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <span class="icon-mobile display-4 text-primary d-block mb-4"></span>
                                    <h3>Mobile Apps</h3>
                                    <p>Une application mobile est un logiciel applicatif développé pour un appareil électronique mobile, tel qu'un assistant personnel, un téléphone portable, un smartphone, un baladeur numérique, une tablette tactile.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <span class="icon-pencil display-4 text-primary d-block mb-4"></span>
                                    <h3>CopyWriting</h3>
                                    <p>Le copywriting représente les mots qu’utilisent les marketeurs, à l’écrit ou à l’oral, pour persuader les gens d’effectuer une action après les avoir lus ou écoutés</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <span class="icon-search2 display-4 text-primary d-block mb-4"></span>
                                    <h3>Search Engine Optimization</h3>
                                    <p>L’optimisation pour les moteurs de recherche, référencement naturel ou SEO (pour search engine optimization), est un ensemble de techniques visant à optimiser la visibilité d'une page web dans les résultats de recherche (SERP, pour search engine result pages). </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- END .site-section -->



        <div class="site-section bg-light" id="portfolio-section">
            <div class="container">
                <div class="row mb-5 ">
                    <div class="col-md-8 section-title text-center mx-auto">
                        <span class="sub-title mb-2 d-block">Projets récents</span>
                        <h2 class="title text-primary mb-3">Voici quelques uns de mes projets</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="images/project_11.jpg" alt="Image" class="img-fluid" class="img-fluid">
                        <img src="images/project_22.jpg" alt="Image" class="img-fluid" class="img-fluid">
                    </div>
                    <div class="col-lg-5 h-100 jm-sticky-top ml-auto">
                        <h3>Maquette de site pour un festival de film</h3>
                        <p class="mb-4">Initulé du projet:</p>
                        <p class="mb-4">L'agence "Chalets et caviar" à Courchevel vous a missionné pour créer son site web. Elle possède une quinzaine de chalets de luxe à la vente ainsi que d'autres chalets de luxe en location.
                            Elle souhaite un design "clair, épuré, qui respire la ligne luxe de l'agence". A vous de le trouver, de l'installer et de le configurer. Vous devez personnaliser le thème de telle sorte que l'agence se sente "chez elle" et qu'on n'ait pas l'impression d'avoir un thème en anglais à moitié intégré. Veillez donc tout particulièrement aux détails.</p>
                        <p class="mb-5"><strong class="text-black">Rôles:</strong> Design, Web</p>
                        <p class="mb-4"><a href="http://bluemorpho.xyz/maquette/" class="readmore">Visitez le</a></p>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                        <img src="images/project_12.jpg" alt="Image" class="img-fluid" class="img-fluid">
                        <img src="images/project_123.jpg" alt="Image" class="img-fluid" class="img-fluid">
                    </div>
                    <div class="col-lg-5 h-100 jm-sticky-top mr-auto order-2 order-lg-1">
                        <h3>Projet pour une agence immobilières à Courchevel</h3>
                        <p class="mb-4">Initulé du projet:</p>
                        <p class="mb-4">Jennifer Viala est l'organisatrice du Festival des Films de Plein Air. Elle ambitionne de sélectionner et projeter des films d'auteur en plein air du 5 au 8 août au parc Monceau à Paris. Son association vient juste d'être créée et elle dispose d'un budget limité. Elle a besoin de communiquer en ligne sur son festival, d'annoncer les films projetés et de recueillir les réservations.</p>
                        <p class="mb-5"><strong class="text-black">Rôles:</strong> Design, CMS Wordpress, Mise en ligne, Nom de dommaine</p>
                        <p class="mb-4"><a href="http://bluemorpho.xyz/wordpress/" class="readmore">Visitez le</a></p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="images/projet44.jpg" alt="Image" class="img-fluid" class="img-fluid">
                        <img src="images/projet441.png" alt="Image" class="img-fluid" class="img-fluid">
                    </div>
                    <div class="col-lg-5 h-100 jm-sticky-top ml-auto">
                        <h3>Concevez la solution technique d'une application de restauration en ligne, Express Food</h3>
                        <p class="mb-4">Initulé du projet:</p>
                        <p class="mb-4">Vous venez d'être recruté(e) par la toute jeune startup ExpressFood. Elle ambitionne de livrer des plats de qualité à domicile en moins de 20 minutes grâce à un réseau de livreurs à vélo.
                            Chaque jour, ExpressFood élabore 2 plats et 2 desserts à son QG avec l'aide de chefs expérimentés. Ces plats sont conditionnés à froid puis transmis à des livreurs à domicile qui "maraudent" ensuite dans les rues en attendant une livraison. Dès qu'un client a commandé, l'un des livreurs (qui possède déjà les plats dans un sac) est missionné pour livrer en moins de 20 minutes.
                            Sur son application, ExpressFood propose à ses clients de commander un ou plusieurs plats et desserts. Les frais de livraison sont gratuits. Les plats changent chaque jour.
                            Une fois la commande passée, le client a accès à une page lui indiquant si un livreur a pris sa commande et le temps estimé avant livraison.</p>
                        <p class="mb-5"><strong class="text-black">Rôles:</strong> UML, Conception architecture logiciel</p>
                        <p class="mb-4"><a href="http://bluemorpho.xyz/projet4/" class="readmore">Visitez le</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="site-section " id="contact-section">
        <div class="container">
            <form action="index.php?action=contacter" class="contact-form" method="post">

                <div class="section-title text-center mb-5">
                    <span class="sub-title mb-2 d-block">Restons en contact</span>
                    <h2 class="title text-primary">Contactez moi</h2>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <input name="firstname" type="text" class="form-control" placeholder="Prénom" required="required">
                    </div>
                    <div class="col-md-6">
                        <input name="lastname" type="text" class="form-control" placeholder="Nom" required="required">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <input name="mail" type="text" class="form-control" placeholder="Email" required="required">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <input required="required" name="subject" type="text" class="form-control" placeholder="Sujet" required="required">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Message" required="required"></textarea>
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
    </div> <!-- END .site-section -->
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>