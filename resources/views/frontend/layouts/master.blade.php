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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('sweetalert::alert')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    
    <script>
        var hethang = document.getElementById('hethang');    
        hethang.addEventListener('click',function(){
            toastr.error('Sản phẩm đã hết hàng')
        });

    </script>
    <script>
        var hetsach = document.getElementsByClassName('hetsach');
        for( let i=0;i<hetsach.length;i++)
        {
            hetsach[i].addEventListener('click',function(){
            toastr.error('Thêm giỏ hàng thất bại')
            });
        }
        
    </script>
    <script>
        var vancon = document.getElementsByClassName('vancon');
        for( let i=0;i<vancon.length;i++)
        {
            vancon[i].addEventListener('click',function(){
            toastr.success('Thêm giỏ hàng thành công')
            });
        }
        
    </script>
    <script>
        var conhang = document.getElementById('conhang');
        conhang.addEventListener('click',function(){
            toastr.success('Thêm vào giỏ hàng thành công')
        });
    </script>
    
    
</body>
</html>