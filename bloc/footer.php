
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <script type="text/javascript">
                    var elems = document.getElementsByClassName('confirmation');
                    var confirmIt = function (e) {
                        if (!confirm('Etes vous sur de vouloir supprimer?')) e.preventDefault();
                    };
                    for (var i = 0, l = elems.length; i < l; i++) {
                        elems[i].addEventListener('click', confirmIt, false);
                    }
                </script>
                <br>
                <div class="footer-copyright text-center ">© 2019 Copyright:
                    <a href="https://www.linkedin.com/in/maxime-thierry-93870a97/"> maximethierry.xyz</a>
                </div>
            </div>
        </div>
    </div>
</footer>