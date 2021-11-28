@extends('frontend.layouts.master')
<style>
    label.error,.red{
  color: red;
}
#thanhtoan{
  width: 100%;
  margin: 0 auto;
}
/* input{
 margin: 10px 0;
} */
</style>
@section('container')
<section class="shop-cart">
    <div class="container">
        <!--Start Breadcrumbs-->
        <ul class="tz-breadcrumbs">
            {{-- <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Checkout
            </li> --}}
        </ul>
        <!--End Breadcrumbs-->

        <div class="row">
            <div class="col-md-6">
                <h1 class="page-title">Thanh toán</h1>

                <!--Shop info-->
                <div class="shop-info">
                    {{-- <p>Returning customer? <a href="#">Click here to login</a></p> --}}
                    {{-- <p>Có mã giảm giá ?<a href="{{ route('frontend.carts.index') }}"> Chọn để nhập code</a></p> --}}
                </div>
                <!--End shop info-->

                <!--Start form checkout-->
                <form action="{{ route('frontend.carts.pay') }}" method="POST" id="thanhtoan">
                    @csrf
                    <div class="shop-billing-fields">
                        <h3>Thông tin khách hàng</h3>
                        
                        <div class="clear"></div>
                        <p class="form-row">
                            <label for="address">Họ và tên<span class="required">*</span></label>
                            <input type="text" class="input-text " name="name" id="name" placeholder="" value="">
                        </p>

                        @error('name')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                        @enderror

                        <div class="clear"></div>
                        <p class="form-row">
                            <label for="address">Địa chỉ  <span class="required">*</span></label>
                            <input type="text" class="input-text " name="address" id="address" placeholder="" value="">
                        </p>

                        @error('address')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                        @enderror
                        
                        <div class="clear"></div>
                        <p class="form-row">
                            <label for="phone">Số điện thoại  <span class="required">*</span></label>
                            <input type="text" class="input-text " name="phone" id="phone" placeholder="" value="">
                        </p>

                        @error('phone')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                        @enderror

                        <div class="clear"></div>
                        {{-- <p class="form-row create-account">
                            <input class="createaccount" id="createaccount" type="checkbox" name="createaccount" value="1"> <label for="createaccount" class="checkbox">Create an account?</label>
                        </p> --}}
                        {{-- <p class="form-row ship-to-different-address-checkbox">
                            <input class="input-checkbox" id="ship-to-different-address-checkbox" type="checkbox" name="ship-to-different-address-checkbox" value="1">
                            <label for="ship-to-different-address-checkbox" class="ship-to-different-address-checkbox">Ship to a different address?</label>
                        </p> --}}
                        <p class="form-row notes">
                            <label for="order_comments" class="">Ghi chú</label>
                            <textarea name="note" class="input-text " id="order_comments" placeholder="vui lòng nhập tại đây" rows="2" cols="5"></textarea>
                        </p>

                        
                        
                        <button  type="submit"  class="btn btn-danger btn-lg"> <i style="margin-right:8px;" class="fa fa-shopping-cart"></i>Đặt hàng</button>
                        
                    </div>
                </form>
                <!--End form checkout-->

            </div>
            <div class="col-md-6">

                <!--Order review-->
                <div id="order_review" style="padding: 156px 70px;">
                    <h3>Thông tin đơn hàng</h3>

                    <!--Shop table-->
                    <table class="shop_table">
                        <thead>
                            <tr>
                                <th class="product-name">Sản phẩm</th>
                                <th class="product-total">Tổng </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $items as $item )
                            <tr class="cart_item">
                                <td class="product-name">
                                    {{ $item->name }}
                                    <strong class="product-quantity">× {{ $item->qty }}</strong>
                                </td>
                                <td class="product-total">
                                    <span class="amount">{{ number_format($item->qty*$item->price) }} đ</span>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <th>Thuế</th>
                                <td><span class="amount">{{ number_format(Cart::tax()) }} đ</span></td>
                            </tr>

                        {{-- <tr class="shipping">
                            <th>Đơn vị vận chuyển</th>
                            <td>
                                <form class="shop-shipping-calculator" method="post">
                                    <p class="form-r">
                                        <input type="checkbox" name="rate" value="1">
                                        <span>
                                           Giao hàng nhanh:
                                           <span class="price">
                                               $30.00
                                           </span>
                                        </span>
                                    </p>
                                    <p class="form-r">
                                        <input type="checkbox" name="international" value="1">
                                        <span>
                                           Giao hàng quốc tế:
                                           <span class="price">
                                               $150.00
                                           </span>
                                        </span>
                                    </p>
                                    <p class="form-r">
                                        <input type="checkbox" name="rate" value="1">
                                        <span>
                                           Giao nội địa:
                                           <span class="price">
                                               $90.00
                                           </span>
                                        </span>
                                    </p>
                                    <p class="form-r">
                                        <input type="checkbox" name="pickup" value="1">
                                        <span>Giao hàng thường (Free)</span>
                                    </p>
                                </form>
                            </td>
                        </tr> --}}

                        <tr class="order-total">
                            <th>Tổng tiền</th>
                            <td><strong><span class="amount">{{ number_format(Cart::total()) }} đ</span></strong> </td>
                        </tr>
                        </tfoot>
                    </table>
                    <!--End shop table-->

                    
                    <!--Start payment-->
                    {{-- <div id="payment" class="checkout-payment">
                        <ul class="payment_methods methods">
                            <li class="payment_method_bacs">
                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">

                                <label for="payment_method_bacs">
                                    Direct Bank Transfer
                                </label>
                                <div class="payment_box payment_method_bacs">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </div>
                            </li>
                            <li class="payment_method_cheque">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque">
                                <label for="payment_method_cheque">
                                    Cheque Payment
                                </label>
                            </li>
                            <li class="payment_method_paypal">
                                <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal">
                                <label for="payment_method_paypal">
                                    PayPal
                                </label>
                            </li>
                        </ul>

                        <div class="clear"></div>
                    </div> --}}
                    <!--End payment-->

                </div>
                <!--End order review-->

            </div>
        </div>

    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
jQuery(document).ready(function($){
    $('#thanhtoan').validate({
        rules: {
            name: "required",
            address:"required",
            phone:"required",

            
        },
        messages: {
            name: "Vui lòng nhập họ tên",
            address:"Vui lòng nhập địa chỉ",
            phone:"Vui lòng nhập số điện thoại"
        },
    });
});
</script>
@endsection