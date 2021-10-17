
    <!--Start class site-->

        <!--Start id tz header-->
        <header id="tz-header" class="bk-white">
            <div class="container">

                <!--Start class header top-->
                <div class="header-top">
                    <ul class="pull-left">
                        <li>
                            <a href="#">
                                Tiếng việt
                                <span class="fa fa-angle-down tz-down"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Liên hệ: 0814791595</a>
                        </li>
                    </ul>
                    <ul class="pull-right">
                        {{-- <li>
                            <a href="shop-register.html"></a>
                        </li>
                        <li>
                            <a href="#">Wishlist</a>
                        </li> --}}
                        <li>
                            <a href="#">Giỏ hàng </a>
                        </li>
                        {{-- <li>
                            <a href="shop-checkout.html"></a>
                        </li> --}}
                        <li class="tz-header-login">
                            @if (auth()->check())
                                <a href="#" style="font-size: 14px; padding: 0 18px;font-family: 'Lato', sans-serif;">
                                    {{ auth()->user()->name }}
                                </a>
                                <li >
                                    <form method="post" action="{{ route('auth.logout') }}">
                                        @csrf
                                        <a class="btn btn-danger" href="#" style="margin-left:15px;font-size: 14px; padding: 5px 10px;font-family: 'Lato', sans-serif;"  onclick="this.closest('form').submit(); return false;">
                                            <i class="fa fa-power-off" aria-hidden="true"></i>
                                        </a>
                                      </form>
                                </li>
                            @else
                            <a href="{{ route('auth.login') }}">Login</a>
                            <div class="tz-login-form">
                                <form>
                                    <p class="form-content">
                                        <label for="username">Username / Email</label>
                                        <input type="text" name="username" id="username" value>
                                    </p>
                                    <p class="form-content">
                                        <label for="password">Password</label>
                                        <input type="password" name="username" id="password" value>
                                    </p>
                                    <p class="form-footer">
                                        <a href="#">Lost Password?</a>
                                        <button type="submit" class="pull-right button_class">LOGIN</button>
                                    </p>
                                    <p class="form-text">
                                        Don't have an account? <a href="shop-register.html">Register Here</a>
                                    </p>
                                </form>
                            </div>
                            @endif
                            
                            
                        </li>
                    </ul>
                </div>
                <!--End class header top-->

                <!--Start header content-->
                <div class="header-content">
                    <h3 class="tz-logo pull-left"><a href="index.html"><img style="width:220px;height:80px" src="/frontend/images/syhalogo.jpg" alt="home"></a></h3>
                    <div class="tz-search pull-right">

                        <!--Start form search-->
                        <form>
                            {{-- <label class="select-arrow">
                                <select name="category">
                                @foreach ($posts as $post )                     
                                    <option> {{ $post->category->name }} </option>                             
                                @endforeach
                                </select>                    
                            </label> --}}
                            <input type="text" class="tz-query" id="tz-query" value placeholder="Tìm kiếm sản phẩm">
                            <button type="submit"></button>
                        </form>
                        <!--End Form search-->

                        <!--live search-->
                        <div class="live-search">
                            <ul>
                                <li>
                                    <div class="live-img"><img src="/frontend/images/product-search1.jpg" alt="product search one"></div>
                                    <div class="live-search-content">
                                        <h6><a href="single-product.html">Defy Advanced</a></h6>
                                        <span class="live-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="product-color">
                                                <i class="light-blue"></i>
                                                <i class="orange"></i>
                                                <i class="orange-dark"></i>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="live-img"><img src="/frontend/images/product-search2.jpg" alt="product search two"></div>
                                    <div class="live-search-content">
                                        <h6><a href="single-product.html">Defy Advanced</a></h6>
                                        <span class="live-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="product-color">
                                                <i class="light-blue"></i>
                                                <i class="orange"></i>
                                                <i class="blueviolet"></i>
                                                <i class="orange-dark"></i>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="live-img"><img src="/frontend/images/product-search3.jpg" alt="product search one"></div>
                                    <div class="live-search-content">
                                        <h6><a href="single-product.html">Defy Advanced</a></h6>
                                        <span class="live-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="product-color">
                                                <i class="blueviolet"></i>
                                                <i class="light-blue"></i>
                                                <i class="orange-dark"></i>
                                                <i class="orange"></i>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End live search-->
                    </div>
                </div>
                <!--End class header content-->
            </div>

            <!--Start main menu -->
            <nav class="tz-menu-primary">
                <div class="container">

                    <!--Main Menu-->
                    <ul class="tz-main-menu pull-left nav-collapse">
                        <li>
                            <a href="{{ route('frontend.home') }}">Trang chủ</a>
                            {{-- <ul class="sub-menu">
                                <li>
                                    <a href="home-boxed.html">Home Boxed</a>
                                </li>
                                <li>
                                    <a href="mega-menu.html">Mega Menu</a>
                                </li>
                            </ul> --}}
                        </li>
                        <li>
                            <a href="shop.html">
                                Danh mục
                                {{-- <span class="red-light">On sale!</span> --}}
                            </a>
                        </li>
                        {{-- <li>
                            <a href="shop.html">Bikes</a>
                        </li>
                        <li>
                            <a href="shop.html">Gear</a>
                        </li> --}}
                        <li>
                            <a href="shop.html">Cửa hàng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="shop-rightsidebar.html">Shop Right</a>
                                </li>
                                <li>
                                    <a href="shop-cart.html">Shop Cart</a>
                                </li>
                                <li>
                                    <a href="shop-checkout.html">Shop Checkout</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.register') }}">Shop Register</a>
                                </li>
                                <li>
                                    <a href="single-product.html">Shop Single</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                                {{-- <span class="cyan-dark">Best off!</span> --}}
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('frontend.posts.index') }}"> Danh sách bài viết</a>
                                </li>
                                @foreach ( $categories as $category )
                                <li>
                                    <a href="{{ route('frontend.post.post_category',$category->slug) }}"> {{ $category->name }}</a>
                                </li>  
                                @endforeach
                                
                            </ul>        
                        </li>
                        <li>
                            <a href="contact.html">Liên hệ</a>
                        </li>
                    </ul>
                    <!--End Main menu-->

                    <!--Shop meta-->
                    <ul class="tz-ecommerce-meta pull-right">
                        <li class="tz-menu-wishlist">
                            <a href="#"><strong>0</strong></a>
                        </li>
                        <li class="tz-mini-cart">
                            <a href="shop-cart.html"><strong>2</strong>Giỏ hàng : $199.00</a>

                            <!--Mini cart-->
                            <ul class="cart-inner">
                                <li class="mini-cart-content">
                                    <div class="mini-cart-img"><img src="/frontend/images/product-cart1.png" alt="product search one"></div>
                                    <div class="mini-cart-ds">
                                        <h6><a href="single-product.html">Liv Race Day Short</a></h6>
                                        <span class="mini-cart-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="mini-meta">
                                               <span class="mini-color">Color: <i class="orange"></i></span>
                                               <span class="mini-qty">Qty: 5</span>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mini-cart-delete"><img src="/frontend/images/delete.png" alt="delete"></span>
                                </li>
                                <li class="mini-cart-content">
                                    <div class="mini-cart-img"><img src="/frontend/images/product-cart2.png" alt="product search one"></div>
                                    <div class="mini-cart-ds">
                                        <h6><a href="single-product.html">City Pedals Sport</a></h6>
                                        <span class="mini-cart-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="mini-meta">
                                               <span class="mini-color">Color: <i class="orange"></i></span>
                                               <span class="mini-qty">Qty: 5</span>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mini-cart-delete"><img src="/frontend/images/delete.png" alt="delete"></span>
                                </li>
                                <li class="mini-cart-content">
                                    <div class="mini-cart-img"><img src="/frontend/images/product-cart3.png" alt="product search one"></div>
                                    <div class="mini-cart-ds">
                                        <h6><a href="single-product.html">Gloss</a></h6>
                                        <span class="mini-cart-meta">
                                            <a href="single-product.html">$2650.00</a>
                                            <span class="mini-meta">
                                               <span class="mini-color">Color: <i class="orange"></i></span>
                                               <span class="mini-qty">Qty: 5</span>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mini-cart-delete"><img src="/frontend/images/delete.png" alt="delete"></span>
                                </li>
                                <li class="mini-subtotal">
                                    <span class="subtotal-content">
                                        Subtotal:
                                        <strong class="pull-right">$1,100.00</strong>
                                    </span>
                                </li>
                                <li class="mini-footer">
                                    <a href="shop-cart.html" class="view-cart">View Cart</a>
                                    <a href="shop-checkout.html" class="check-out">Checkout</a>
                                </li>
                            </ul>
                            <!--End mini cart-->

                        </li>
                    </ul>
                    <!--End Shop meta-->

                    <!--navigation mobi-->
                    <button data-target=".nav-collapse" class="btn-navbar tz_icon_menu" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!--End navigation mobi-->
                </div>
            </nav>
            <!--End stat main menu-->

        </header>
        <!--End id tz header-->