@extends('client.clientLayout')
@section('content')
<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px" data-url="{{route('clientDeleteCart')}}">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table class="update_cart_url" data-url="{{route('clientUpdateCart')}}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ảnh sp</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            @php
                                $totalCart = 0;
                            @endphp
                            <tbody>
                                @foreach($cart as $id => $cartItem)
                                    @php
                                        $totalCart += $cartItem['price'] * $cartItem['quantity'];
                                    @endphp
                                <tr>
                                    <td>{{$id}}</td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px" src="{{$cartItem['image'] ? ''. Storage::url($cartItem['image']):'http://placehold.it/100x100'}}" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$cartItem['name']}}</a></td>
                                    <td class="product-price-cart"><span class="amount">{{number_format($cartItem['price'])}} đ</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box quantity" type="text" name="qtybutton" value="{{$cartItem['quantity']}}" min="1" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal">{{number_format($cartItem['price'] * $cartItem['quantity'])}} đ</td>
                                    <td class="product-remove">
                                        <a href="" data-id="{{$id}}" class="cart_update fa fa-pencil"></a>
                                        <a onclick="return confirm('Bạn có muốn xoá')" href="" data-id="{{$id}}" class="cart_delete fa fa-times"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{route('clientHome')}}">Tiếp tục mua</a>
                                </div>
                                <div class="cart-clear">
                                    <button>Cập nhật giỏ hàng</button>
                                    <a href="#">Xóa toàn bộ giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Tổng đơn hàng</h4>
                            </div>
                            <h5>Tổng giá <span>{{number_format($totalCart)}} đ</span></h5>
                            <h4 class="grand-totall-title">Thành tiền<span>{{number_format($totalCart)}} đ</span></h4>
                            <a href="checkout.html">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->

@endsection
