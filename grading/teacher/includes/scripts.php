
    </div>

<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>
<script>
    $(document).ready(function($){
        $('.menu ul li a').filter(function() {
        var locationUrl = window.location.href;
        var currentItemUrl = $(this).prop('href');

        return currentItemUrl === locationUrl;
        }).parent('li').addClass('active');
    });
</script>
</body>
</html>