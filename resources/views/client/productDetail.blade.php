@extends('client.clientLayout')
@section('content')
<!-- Product Details Area Start -->
<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="{{$objItem->image ? ''. Storage::url($objItem->image):'http://placehold.it/100x100'}}" alt="">
                            <a class="venobox full-preview" data-gall="myGallery" href="{{$objItem->image ? ''. Storage::url($objItem->image):'http://placehold.it/100x100'}}">
                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content ml-25px">
                    <h2>{{$objItem->name}}</h2>
                    <div class="pricing-meta">
                        <ul class="d-flex">
                            <li class="new-price">Giá: {{number_format($objItem->price)}}đ</li>
                        </ul>
                    </div>
                    <p class="mt-30px">{{$objItem->description}}</p>

                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                        <span>Danh Mục: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="{{route('ProByCate',['id_cate'=> $objItem->cate_id])}}">{{$objItem->cateName}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                        </div>
                        <div class="pro-details-cart">
                            <a href="" class="add-cart add-to-cart btn btn-primary" data-url="{{route('clientAddToCart', ['id' => $objItem->id])}}">Thêm giỏ hàng</a>
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                            <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Product Area Start -->
<div class="product-area related-product">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center m-0">
                    <h2 class="title">Sản phẩm tương tự</h2>
                    <p>Có rất nhiều các lựa chọn khác cho bạn</p>
                </div>
            </div>
        </div>
        <!-- Section Title & Tab End -->
        <div class="row">
            <div class="col">
                <div class="new-product-slider swiper-container slider-nav-style-1">
                    <div class="swiper-wrapper">
                        @foreach($listProByCate as $item)
                        <div class="swiper-slide">
                            <!-- Single Prodect -->
                            <div class="product">
                                <div class="thumb">
                                    <a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}" class="image">
                                        <img src="{{$item->image ? ''. Storage::url($item->image):'http://placehold.it/100x100'}}" alt="Product" />
                                        <img class="hover-image" src="{{$item->image ? ''. Storage::url($item->image):'http://placehold.it/100x100'}}" alt="Product" />
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="category"><a href="#">{{$item->cateName}}</a></span>
                                    <h5 class="title"><a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}">{{$item->name}}
                                        </a>
                                    </h5>
                                    <span class="price">
                                        <span class="new">Giá: {{number_format($item->price)}}đ</span>
                                    </span>
                                </div>
                                <div class="actions">
                                    <a href=""
                                       class="action add-to-cart btn btn secondary pe-7s-shopbag"
                                       data-url="{{route('clientAddToCart', ['id' => $item->id])}}"
                                    ></a>
                                    <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i class="pe-7s-like"></i></button>
                                    <a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}" class="action quickview btn btn secondary pe-7s-look"></a>

                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->
@endsection
