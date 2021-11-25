@extends('frontend.layouts.master')

@section('container')
    <div class="tz-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!--Start for shop sidebar-->
                    <div class="tz-shop-sidebar">
                        <aside class="widget widget_product_categories">
                            <h3 class="widget-title">Danh mục sản phẩm</h3>
                            <ul class="product-categories">
                                @foreach ( $category_products as $category_product )
                                <li>
                                    <a href="">{{ $category_product->name }} <span>({{ count($category_product->products) }})</span></a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </aside>
                        <aside class="product-catlog widget">
                            <h3 class="widget-title">Catalog</h3>
                            <div class="widget_price_filter">
                                <h4 class="widget-title-children">
                                    Price Filter
                                </h4>
                                <form>
                                    <div id="slider-range"
                                        class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                                            style="left: 15%; width: 45%;"></div><span
                                            class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                            style="left: 15%;"></span><span
                                            class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                            style="left: 60%;"></span>
                                    </div>
                                    <div class="price_label">
                                        <button type="submit" class="button">Filter</button>
                                        <span class="value-price">
                                            <span class="from">$75</span>
                                            -
                                            <span class="to">$300</span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                           
                            <div class="widget-size-filter">
                                <h4 class="widget-title-children">
                                    Size Filter
                                </h4>
                                <ul>
                                    <li>
                                        <a href="shop.html">S - Small <span>(24)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">M - Medium <span>(18)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">L - Large <span>(9)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html"> XL - Extra Large <span>(39)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">xtra Extra Large <span>(24)</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-size-filter">
                                <h4 class="widget-title-children">
                                    Brand Filter
                                </h4>
                                <ul>
                                    <li>
                                        <a href="shop.html">S - Small <span>(24)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">M - Medium <span>(18)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">L - Large <span>(9)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html"> XL - Extra Large <span>(39)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">xtra Extra Large <span>(24)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                        
                        <aside class="widget widget_product">
                            <h3 class="widget-title">Sản phẩm nổi bật</h3>
                            <ul>
                                @foreach ( $feature_products as $feature_product )
                                <li>
                                    <a href="{{ route('frontend.products.detail', $feature_product->id) }}">
                                        <img src="{{ $feature_product->images[0]->image_url }}" alt="Defy Advanced">
                                        <div class="item-info">
                                            <h5>{{ $feature_product->name }}</h5>
                                            <span class="p-vote">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </span>
                                            <span class="price">{{ $feature_product->sale_price_format  }}</span>
                                        </div>
                                    </a>
                                </li>
                               @endforeach
                                
                            </ul>
                        </aside> 
                        
                    </div>
                    <!--End shop sidebar-->

                </div>

                <div class="col-md-9">

                    <!--Start shop content-->
                    <div class="tz-shop-content">
                        <ul class="tz-breadcrumbs">
                        </ul>
                        <div class="shop-banner">
                            <img src="/frontend/images/parallax.jpg" alt="banner">
                        </div>
                        <div class="catalog-meta">
                            <div class="catalog_top">
                                <span class="style-switch">
                                    <a class="nav-grid-view fa fa-th-large active"></a>
                                    {{-- <a class="nav-list-view fa fa-list"></a> --}}
                                </span>
                                <form class="shop-order">
                                    <label class="form-arrow">
                                        <select class="number-item" name="number_item">
                                            <option value="12">12 items/page</option>
                                            <option value="6">6 items/page</option>
                                            <option value="3">3 items/page</option>
                                        </select>
                                    </label>
                                    <label class="form-arrow">
                                        <select name="orderby" class="orderby">
                                            <option value="'">Sort By: Position</option>
                                            <option value="rating">Sort by rating</option>
                                            <option value="date">Sort by newness</option>
                                        </select>
                                    </label>
                                </form>
                            </div>
                        </div>

                        <div class="tz-product row grid-eff">

                            <!--Product item-->
                            @foreach ( $products as $product )
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            @if(count($product->images) > 0)
                                                <img style="height:200px;" src="{{ $product->images[0]->image_url }}">
                                            @else
                                                <img  src="/frontend/images/product1.jpg" alt="Liv Race Day Short Finger..">
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="{{ route('frontend.products.detail', $product->id) }}">{{ $product->name }}</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">{{ $product->sale_price_format  }}</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            
                                            <p>
                                                {!! $product->content !!}
                                            </p>
                                            <span class="p-mask">
                                                @if ( $product->quantity>0 )
                                                <a href="{{ route('frontend.carts.add', $product->id) }}" class="add-to-cart vancon">Thêm vào giỏ hàng</a>
                                                @else
                                                <a  class="add-to-cart hetsach">Hết hàng</a>   
                                                @endif
                                                
                                                {{-- <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to
                                                    wishlist</a> --}}
                                                <span class="quick-view">
                                                    <a href="{{ route('frontend.products.detail', $product->id) }}"><i class="fa fa-eye"></i>Chi tiết sản phẩm</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                            
                            <!--End product item-->

                        </div>

                        <nav class="pagination">
                            <nav>
                                {!! $products->appends(request()->input())->links() !!}
                            </nav>
                        </nav>
                    </div>
                    <!--End shop content-->
                </div>
            </div>
        </div>
    </div>
@endsection
