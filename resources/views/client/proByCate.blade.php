@extends('client.clientLayout')
@section('content')
<!-- Shop Page Start  -->
<div class="shop-category-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <div class="shop-tab nav">
                        <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </button>
                        <button data-bs-target="#shop-list" data-bs-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                    </div>
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <!-- Single Wedge End -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                                <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                                <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                                <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                                <li><a class="dropdown-item" href="#">Sort By new</a></li>
                                <li><a class="dropdown-item" href="#">Sort By old</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge Start -->
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->
                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">
                    <!-- Tab Content Area Start -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="shop-grid">
                                    <div class="row mb-n-30px">
                                        @foreach($listProByCate as $item)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">
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
                                                    <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i
                                                            class="pe-7s-like"></i></button>
                                                    <a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}" class="action quickview btn btn secondary pe-7s-look"></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade mb-n-30px" id="shop-list">
                                    <div class="shop-list-wrapper mb-30px">
                                        @foreach($listProByCate as $item)
                                        <div class="row">
                                            <div class="col-md-5 col-lg-5 col-xl-4 mb-lm-30px">
                                                <div class="product">
                                                    <div class="thumb">
                                                        <a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}" class="image">
                                                            <img src="{{$item->image ? ''. Storage::url($item->image):'http://placehold.it/100x100'}}" alt="Product" />
                                                            <img class="hover-image" src="{{$item->image ? ''. Storage::url($item->image):'http://placehold.it/100x100'}}" alt="Product" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-7 col-xl-8">
                                                <div class="content-desc-wrap">
                                                    <div class="content">
                                                        <span class="category"><a href="#">{{$item->cateName}}</a></span>
                                                        <h5 class="title"><a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}">{{$item->name}}</a></h5>
                                                        <p>{{$item->description}}</p>
                                                    </div>
                                                    <div class="box-inner">
                                                                <span class="price">
                                                                <span class="new">Giá: {{number_format($item->price)}}đ</span>
                                                                </span>
                                                        <div class="actions">
                                                            <a href=""
                                                               class="action add-to-cart btn btn secondary pe-7s-shopbag"
                                                               data-url="{{route('clientAddToCart', ['id' => $item->id])}}"
                                                            ></a>
                                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i
                                                                    class="pe-7s-like"></i></button>
                                                            <a href="{{route('route_Client_Product_Detail', ['id'=> $item->id, 'id_cate'=> $item->cate_id])}}" class="action quickview btn btn secondary pe-7s-look"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->


                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
                        <div class="pages">
                            <ul>
                                <li class="li page-link active">{{$list->appends($exitParams)->links()}}
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!--  Pagination Area End -->
                </div>

                <!-- Shop Bottom Area End -->
            </div>



            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Danh mục</h4>
                        <div class="sidebar-widget-category">
                            <ul>
                                @foreach($list as $item)
                                <li><a href="{{route('ProByCate',['id_cate'=> $item->id])}}" class=""> {{$item->name}}
                                        <span></span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End  -->
@endsection
