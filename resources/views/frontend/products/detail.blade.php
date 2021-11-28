@extends('frontend.layouts.master')
@section('container')
<section class="tz-shop-single">
    <div class="container">

        <!--Start Breadcrumbs-->
        <ul class="tz-breadcrumbs">
            <li>
                <a href="index.html"></a>
            </li>
            
        </ul>
        <!--End Breadcrumbs-->
        <div class="row">
            <div class="col-md-6 col-sm-6">

                <!--Shop images-->
                <div class="shop-images">
                    <ul style="margin-top:52px;" class="single-gallery">
                        @foreach ($detail_product->images as $value )
                        <li>
                            <img style="height: 428px;" src="{{\Illuminate\Support\Facades\Storage::url($value->path)}}" alt="Propel Advanced Pro">
                        </li>
                        @endforeach
                        
                    </ul>
                    <div class="product-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-dribbble"></a>
                    </div>
                </div>
                <!--End shop image-->
            </div>
            <div class="col-md-6 col-sm-6">
                <!--Shop content-->
                <div class="entry-summary">
                    <h1>{{ $detail_product->name }}</h1>
                    {{-- <span class="p-vote">
                        <p>{{ $detail_product->brand_id->name  }}</p>
                    </span> --}}
                    <p class="product-price">
                        <span class="price">{{ $detail_product->sale_price_format }}</span>
                        <span class="stock">Trạng thái:  <span>{{ $detail_product->status_text }}</span></span>
                    </p>
                    <div class="description">
                        <p>
                           {!! $detail_product->content !!}
                        </p>
                    </div>
                    <form class="tz_variations_form ">
                        <p class="form-attr">
                            
                            <span class="tzqty">
                                <label style="margin-left: -38px!important">Số lượng:</label>
                                <input type="text" name="quantity" value="{{ $detail_product->quantity }}" disabled title="Qty" class="input-text qty text" >
                            </span>
                        </p>
                      
                        <p>
                            @if ($detail_product->quantity>0)
                            <a id="conhang" href="{{ route('frontend.carts.add',$detail_product->id) }}" type="submit" class="single_add_to_cart_button">Thêm vào giỏ hàng</a>
                            @else
                            <a id="hethang" type="submit" class="single_add_to_cart_button">Hết hàng</a>
                            @endif
                        </p>
                        
                    </form>
                </div>
                <!--End shop content-->
            </div>

        </div>
    </div>

    <!--Shop tabs-->
    <div class="tz-shop-tabs">
        <div class="container">
            
        </div>
    </div>
    <!--End tab-->

    <!--Tabs product-->
    
    <!--End partners-->
</section>
<!--End Shop single-->

@endsection
