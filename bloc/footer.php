<footer>
                <script type="text/javascript">
                    var elems = document.getElementsByClassName('confirmation');
                    var confirmIt = function (e) {
                        if (!confirm('Etes vous sur de vouloir supprimer?')) e.preventDefault();
                    };
                    for (var i = 0, l = elems.length; i < l; i++) {
                        elems[i].addEventListener('click', confirmIt, false);
                    }
                </script>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h3 class="footer-heading mb-4">À propos</h3>
                            <p>Développeur PHP/Synfony 4 formation en cours chez OPENCLASSROOMS.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ml-auto">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Navigation</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="index.php?action=CV">CV</a></li>
                                <li><a href="index.php?action=contact">Contact</a></li>
                                <li><a href="index.php?action=listPosts">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="mb-4">
                        <a href="https://www.facebook.com/yrreiht.emixam?ref=bookmarks" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="https://twitter.com/mapethierry" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="https://www.linkedin.com/in/maxime-thierry-93870a97/" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                        with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>

            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/stickyfill.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>

        <script src="js/jquery.fancybox.min.js"></script>
        <script src="js/main.js"></script>

</footer>