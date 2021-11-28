@extends('frontend.layouts.master')
@section('container')
<section class="shop-checkout">
    <div class="container">
        <!--Start Breadcrumbs-->
        {{-- <ul class="tz-breadcrumbs">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Shop Cart
            </li>
        </ul> --}}
        <!--End Breadcrumbs-->
        <h1 class="page-title">Giỏ hàng</h1>

        <!--Start form table-->
        <form>
            <table class="shop_table cart">
                <!--Table header-->
                <thead>
                    <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail">Sản phẩm</th>
                        <th class="product-name text-center" >Tên sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity text-center">Số lượng</th>
                        <th class="product-subtotal">Tổng </th>
                    </tr>
                </thead>
                <!--End table header-->

                <!--Table body-->
                <tbody>
                    @foreach ( $items as $item )
                    <tr class="cart_item">
                        <td class="product-remove">
                            <a href="{{ route('frontend.carts.remove',['id' => $item->rowId]) }}" class="remove" title="Remove this item"></a>
                        </td>
                        <td class="product-thumbnail">
                            <a href="{{ route('frontend.products.detail', $item->id) }}">
                                <img src="{{ $item->options->image }}" alt="cart">
                            </a>
                        </td>

                        <td class="product-name text-center">
                            {{ $item->name }}
                            
                        </td>
                        <td class="product-price">
                            <span class="amount">{{ number_format($item->price) }} đ</span>
                        </td>

                        <td class="product-quantity">
                            <div class="quantity text-center">
                                <input  autocomplete="off" type="number" step="1" min="1" name="cart" value="{{ $item->qty }}" title="Qty" class="input-text qty text" size="4" onchange="updateCart(this.value,'{{ $item->rowId }}')">
                                {{-- {{$item->qty}} --}}
                            </div>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount">{{ number_format($item->qty*$item->price) }} đ</span>
                        </td>
                    </tr>
                    @endforeach
                    

                    <tr>
                        <td class="actions" colspan="6">
                            <a class="back-shop" href="{{ route('frontend.products.list') }}"><i class="fa fa-angle-left"></i>TIẾP TỤC MUA HÀNG</a>
                            @if (count($items)>0)
                            <a href="{{ route('frontend.carts.destroy') }}" class="update-cart" >Xóa sản phẩm</a>
                            @endif
                        </td>
                    </tr>

                </tbody>
                <!--End table body-->
            </table>
        </form>
        <!--End form table-->

        <!--Cart attr-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <!--Coupon-->
                {{-- <div class="coupon">
                    <h3>MÃ GIAM GIÁ</h3>
                    <form>
                        <p>Vui lòng nhập mã giảm giá</p>
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Nhập mã giảm giá tại đây">
                        <input type="submit" class="button" name="apply_coupon" value="Xác nhận">
                    </form>
                </div> --}}
                <!--End coupon-->
            </div>
            <div class="col-md-12 col-sm-12">

                <!--Cart totals-->
                <div class="cart_totals">
                    <div class="cart_totals_inner">
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Thuế</th>
                                    <td><span class="amount">{{ number_format(Cart::tax()) }} đ</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Tổng tiền</th>
                                    <td><span class="amount">{{ number_format(Cart::total()) }} đ</span></td>
                                </tr>
                                {{-- <tr class="shipping">
                                    <th>Chọn đơn vị vận chuyển</th>
                                    <td>
                                        <form class="shop-shipping-calculator" method="post">
                                           <p class="form-r">
                                               <input type="checkbox" name="rate" value="1">
                                               <span>
                                                   Flat Rate:
                                                   <span class="price">
                                                       $30.00
                                                   </span>
                                               </span>
                                           </p>
                                            <p class="form-r">
                                                <input type="checkbox" name="international" value="1">
                                               <span>
                                                   International Delivery:
                                                   <span class="price">
                                                       $150.00
                                                   </span>
                                               </span>
                                            </p>
                                            <p class="form-r">
                                                <input type="checkbox" name="rate" value="1">
                                               <span>
                                                   Local Delivery:
                                                   <span class="price">
                                                       $90.00
                                                   </span>
                                               </span>
                                            </p>
                                            <p class="form-r">
                                                <input type="checkbox" name="pickup" value="1">
                                               <span>Local Pickup (Free)</span>
                                            </p>
                                        </form>
                                    </td>
                                </tr> --}}
                                <tr class="order-total">
                                    <th>Tổng hóa đơn</th>
                                    <td><span class="amount">{{ number_format(Cart::total()) }} đ</span></td>                                   
                                </tr>
                            </tbody>
                            
                        </table>
                        <a class="back-shop" href="{{ route('frontend.carts.checkout') }}">Thanh toán </a><i style="margin-left: 10px" class="fa fa-angle-right"></i>
                    </div>

                </div>
                <!--End cart totals-->

            </div>
        </div>
        <!--End cart attr-->
    </div>
</section>
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script>
    function updateCart(qty,rowId){
        $.get(
            '{{ asset('carts/update') }}',{qty:qty,rowId:rowId},
            function(){
                location.reload();
            }
        )
    }
</script>
@endsection