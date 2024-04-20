<!doctype html>
<html lang="zxx">


<!-- Mirrored from html.themexriver.com/radios/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 12:11:53 GMT -->

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Radios - Electronics Store WooCommerce Template</title>

    <link rel="shortcut icon" href="<?= PATH_VIEW ?> client/assets/img/favicon.png" type="images/x-icon" />

    <!-- css include -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/animate.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/uikit.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/slick.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/main.css">
</head>

<body>

    <div class="body_wrap">

        <!-- preloder start  -->

        <!-- preloder end  -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->

        <!-- header start -->
        <?php require_once  "layouts/header.php"; ?>
        <!-- header end -->

        <!-- slide-bar start -->
        <?php require_once  "layouts/sidebar.php"; ?>

        <div class="body-overlay"></div>
        <!-- slide-bar end -->


        <main>
            <?php require_once PATH_VIEW . $view . '.php'; ?>
        </main>


        <!-- footer start -->
        <?php require_once  "layouts/footer.php"; ?>

        <!-- footer end -->

        <!-- start newsletter-popup-area-section -->

        <!-- end newsletter-popup-area-section -->


        <!-- start cookies-area -->

        <!-- end cookies-area -->


    </div>

    <!-- jquery include -->
    <script src="<?= BASE_URL ?>assets/client/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/slick.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/backToTop.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/uikit.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/resize-sensor.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/theia-sticky-sidebar.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/wow.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/jqueryui.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/touchspin.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/countdown.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/metisMenu.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/main.js"></script>

    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 1000,
                max: 100000,
                values: [1000, 100000],
                slide: function(event, ui) {
                    $("#price").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#price").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
    </script>


</body>


<!-- Mirrored from html.themexriver.com/radios/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2024 12:11:53 GMT -->

</html>