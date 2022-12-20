@extends('client.clientLayout')
@section('content')
<!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            @foreach($listBanner as $item)
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height-2 swiper-slide bg-color1" data-bg-image="assets/images/hero/bg/hero-bg-2-1.webp">
                <div class="container h-100">
                    <div class="row h-100 flex-row-reverse">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center position-relative align-items-center">
                            <div class="show-case">
                                <div class="hero-slide-image slider-2">
                                    <img src="{{$item->image ? ''. Storage::url($item->image):'error image'}}" alt="your image" style="width: 1500px; height: 800px" class="img-responsive" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!-- Hero/Intro Slider End -->
<!-- Banner Area Start -->
<div class="banner-area style-two pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-banner nth-child-2 mb-lm-30px">
                    <img src="{{asset('clientBunker')}}/images/banner/6.webp" alt="">
                    <div class="banner-content nth-child-3">
                        <h3 class="title">Micro thu âm</h3>
                        <span class="category">Giá chỉ từ: 1.681.000đ</span>
                        <a href="shop-left-sidebar.html" class="shop-link">Mua ngay <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-banner nth-child-2">
                    <img src="{{asset('clientBunker')}}/images/banner/7.webp" alt="">
                    <div class="banner-content nth-child-2">
                        <h3 class="title">Điện thoại di dộng</h3>
                        <span class="category">Giá chỉ từ: 3.000.000đ</span>
                        <a href="shop-left-sidebar.html" class="shop-link">Mua ngay <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Product Area Start -->
<div class="product-area pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm mới</h2>
                    <p>Wiphone đem cả thế giới di động đến ngôi nhà của bạn</p>
                </div>
            </div>
        </div>
        <!-- Section Title & Tab End -->
        <div class="row">
            <div class="col">
                <div class="row mb-n-30px">
                    @foreach($listProducts as $item)
                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                        <!-- Single Prodect -->
                        <div class="product">
                            <span class="badges">
                                <span class="new">New</span>
                            </span>
                            <div class="thumb">
                                <a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}" class="image">
                                    <img src="{{$item->image ? ''. Storage::url($item->image):'http://placehold.it/100x100'}}" alt="Product" class="img-responsive" />
                                    <img class="hover-image" src="{{$item->image ? ''. Storage::url($item->image):'http://placehold.it/100x100'}}" alt="Product" class="img-responsive" />
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="title"><a class="text-center" href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}">{{$item->name}}
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
                                <!-- <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i class="pe-7s-refresh-2"></i></button> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->
<!-- Feature Area Start -->
<div class="feature-area pt-100px pb-100px">
    <div class="container">
        <div class="feature-wrapper">
            <div class="single-feture-col mb-md-30px mb-lm-30px">
                <!-- single item -->
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{asset('clientBunker')}}/images/icons/1.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Miễn phí ship</h4>
                        <span class="sub-title">Áp dụng cho các đơn hàng từ 2tr trở lên</span>
                    </div>
                </div>
            </div>
            <!-- single item -->
            <div class="single-feture-col mb-md-30px mb-lm-30px">
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{asset('clientBunker')}}/images/icons/2.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Thanh toán bằng thẻ</h4>
                        <span class="sub-title">nhanh tróng, tiện lợi</span>
                    </div>
                </div>
            </div>
            <!-- single item -->
            <div class="single-feture-col">
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{asset('clientBunker')}}/images/icons/3.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Hoàn trả hàng</h4>
                        <span class="sub-title">Shop nhận hoàn trả hàng</span>
                    </div>
                </div>
                <!-- single item -->
            </div>
        </div>
    </div>
</div>
<!-- Feature Area End -->


@endsection
