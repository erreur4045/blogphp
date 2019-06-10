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
                                <p><a href="index.php?action=bio" target="_blank" class="btn btn-primary btn-md">Bio</a></p>
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
                        <p class="mb-4"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eos ex, illum iure magnam maiores neque nobis sunt! Animi assumenda molestiae placeat quam quibusdam quis quo repellat rerum. Perferendis, saepe.</span></p>


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
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae suscipit soluta odio itaque,
                                        consequuntur excepturi architecto, omnis iure repellat, ipsum consectetur praesentium accusantium
                                        quibusdam temporibus quasi. Ipsa quisquam rem illo.</p>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus suscipit dolores illum, deleniti
                                        quod officiis labore ipsam? Nulla, ab perspiciatis!</p>
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
                        <h2 class="title text-primary">Voici un bref aperçu des possibilitées que je peux mener à bien pour votre projet</h2>
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
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
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
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="mb-5"><strong class="text-black">Rôles:</strong> Design, CMS Wordpress, Mise en ligne, Nom de dommaine</p>
                        <p class="mb-4"><a href="http://bluemorpho.xyz/wordpress/" class="readmore">Visitez le</a></p>
                    </div>
                </div>

            </div>

        </div>
    </div>

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
    </div> <!-- END .site-section -->


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>