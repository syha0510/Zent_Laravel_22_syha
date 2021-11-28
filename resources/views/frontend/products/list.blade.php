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
                            <h3 class="widget-title">Chức năng</h3>
                    
                           
                            
                                <h4 class="widget-title-children">
                                    Thương hiệu
                                </h4>
                                <ul>
                                    @foreach ( $brands as $brand )
                                    <li>
                                        <a href="">{{ $brand->name }}<span> ({{ count($brand->products) }}) </span></a>
                                    </li> 
                                    @endforeach
                                    
                                    
                                </ul>
                            
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
                                <form class="shop-order" method="GET" action="{{ route('frontend.products.list') }}">
                                    <label class="form-arrow">
                                        <select class="number-item" name="number_item">
                                            <option selected value="3">3 sản phẩm</option>
                                            <option {{ Request::get('number_item') ==  6 ? "selected = 'selected '" : "" }}  value="6">6 sản phẩm</option>
                                            <option {{ Request::get('number_item') ==  12 ? "selected = 'selected '" : "" }}  value="12">12 sản phẩm</option>
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
                                            
                                            {{-- <p>
                                                {!! $product->content !!}
                                            </p> --}}
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
    <script>
        var loc = document.getElementsByClassName('number-item');
        var locsanpham = document.getElementsByClassName('shop-order'); 
        loc[0].addEventListener('change',function(event){
            event.preventDefault();
            locsanpham[0].submit();
        });
    </script>
@endsection
