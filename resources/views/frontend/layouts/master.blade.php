<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/css.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/stylesheet.css" rel="stylesheet" type="text/css">

    <link href="/frontend/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/settings.css" rel="stylesheet" type="text/css">
    <link href="/frontend/css/custom.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--Start class site-->
    <div class="tz-site">

        <!--Start id tz header-->
        @include('frontend.includes.header')
        <!--End id tz header-->

        <!--SATRT REVOLUTION SLIDER-->
        @yield('container')

        <!--Start Footer-->
        @include('frontend.includes.footer')
        <!--End Footer-->

    </div>
    <!--End class site-->

    <script type="text/javascript" src="/frontend/js/jquery.min.js"></script>
    <script type="text/javascript" src="/frontend/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/frontend/js/off-canvas.js"></script>
    <!--jQuery Countdow-->
    <script type="text/javascript" src="/frontend/js/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="/frontend/js/jquery.countdown.min.js"></script>
    <!--End Countdow-->
    <script type="text/javascript" src="/frontend/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="/frontend/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/frontend/js/custom.js"></script>
    <script type="text/javascript" src="/frontend/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/frontend/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/frontend/js/custom-rs.js"></script>
</body>
</html>