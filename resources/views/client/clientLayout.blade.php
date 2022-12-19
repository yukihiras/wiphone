<!DOCTYPE html>
<html lang="zxx" dir="ltr">


<!-- Mirrored from htmldemo.net/hmart/hmart/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 03:32:46 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiphone</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('clientBunker')}}/images/favicon.ico" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/font.awesome.css" />
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/venobox.css">
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/style.css">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="{{asset('clientBunker')}}/css/plugins.min.css">
    <link rel="stylesheet" href="{{asset('clientBunker')}}/css/style.min.css"> -->
</head>

<body>
    <div class="main-wrapper">
        <!-- header -->
        <header>
            <!-- Header top area start -->
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <div class="welcome-text">
                                <p>Wiphone cửa hàng điện thoại hàng đầu việt nam</p>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="top-nav">
                                <ul>
                                    <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                                    <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> thanhdo12a10gmail.com</a></li>
                                    <li><a href="my-account.html"><i class="fa fa-user"></i> Tài khoản</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end -->
            <!-- Header action area start -->
            <div class="header-bottom  d-none d-lg-block">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col">
                            <div class="header-logo">
                                <a href="{{route('clientHome')}}"><img src="{{asset('clientBunker')}}/images/logo/logo.png" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="search-element">
                                <form action="#">
                                    <input type="text" placeholder="Tìm Kiếm" />
                                    <button><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col">
                            <div class="header-actions">
                                <!-- Single Wedge Start -->
                                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                    <i class="pe-7s-like"></i>
                                </a>

                                <!-- Single Wedge End -->
                                <a href="{{route('clientShowCart')}}" class="header-action-btn">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="header-action-num"></span>
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                </a>

                                <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->
            <!-- Header action area start -->
            <div class="header-bottom d-lg-none sticky-nav style-1">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{asset('clientBunker')}}/images/logo/logo.png" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="search-element">
                                <form action="#">
                                    <input type="text" placeholder="Search" />
                                    <button><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col">
                            <div class="header-actions">
                                <!-- Single Wedge Start -->
                                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <!-- Single Wedge End -->
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="header-action-num">01</span>
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                </a>
                                <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->
            <!-- header navigation area start -->
            <div class="header-nav-area d-none d-lg-block sticky-nav">
                <div class="container">
                    <div class="header-nav">
                        <div class="main-menu position-relative">
                            <ul>
                                @foreach($list as $item)
                                <li><a href="{{route('ProByCate',['id'=> $item->id])}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header navigation area end -->
            <div class="mobile-search-box d-lg-none">
                <div class="container">
                    <!-- mobile search start -->
                    <div class="search-element max-width-100">
                        <form action="#">
                            <input type="text" placeholder="Search" />
                            <button><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                    <!-- mobile search start -->
                </div>
            </div>
        </header>

        {{-- modalCartAndwishlist--}}
        @include('client.modalCartAndWitlist')

        <!-- main-content -->
        @yield('content')
        <!-- end-content -->



        <!-- Footer Area Start -->
        <div class="footer-area">
            <div class="footer-container">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                                <div class="single-wedge">
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="{{asset('clientBunker')}}/images/logo/footer-logo.png" alt=""></a>
                                    </div>
                                    <p class="about-text">Hệ thống siêu thị điện thoại wiphone đảm bảo về uy tín và chất lượng của sản phẩm
                                    </p>
                                    <ul class="link-follow">
                                        <li>
                                            <a class="m-0" title="Twitter" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a title="Tumblr" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-tumblr" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Facebook" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Instagram" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-60px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Dịch Vụ</h4>
                                    <div class="footer-links">
                                        <div class="footer-row">
                                            <ul class="align-items-center">
                                                <li class="li"><a class="single-link" href="my-account.html">Tài khoản</a></li>
                                                <li class="li"><a class="single-link" href="contact.html">Liên Hệ</a></li>
                                                <li class="li"><a class="single-link" href="cart.html">Giỏ hàng</a></li>
                                                <li class="li"><a class="single-link" href="shop-left-sidebar.html">Cửa hàng</a></li>
                                                <li class="li"><a class="single-link" href="login.html">Đăng nhập</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-40px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Tài khoản của tôi</h4>
                                    <div class="footer-links">
                                        <div class="footer-row">
                                            <ul class="align-items-center">
                                                <li class="li"><a class="single-link" href="my-account.html">Thông tin</a></li>
                                                <li class="li"><a class="single-link" href="contact.html">Liên hệ</a></li>
                                                <li class="li"><a class="single-link" href="cart.html">Giỏ hàng</a></li>
                                                <li class="li"><a class="single-link" href="shop-left-sidebar.html">Quên mật khẩu</a></li>
                                                <li class="li"><a class="single-link" href="login.html">Sản phẩm yêu thích</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-12">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Thông tin liên hệ</h4>
                                    <div class="footer-links">
                                        <!-- News letter area -->
                                        <p class="address">Địa chỉ:34 Thanh Nhàn, Hai Bà Trưng, Hà Nội.</p>
                                        <p class="phone">SĐT/Fax:<a href="tel:0123456789"> 0123456789</a></p>
                                        <p class="mail">Email:<a href="mailto:demo@example.com"> thanhdo12a10@gmail.com</a></p>
                                        <!-- News letter area  End -->
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="line-shape-top line-height-1">
                            <div class="row flex-md-row-reverse align-items-center">
                                <div class="col-md-6 text-center text-md-end">
                                    <div class="payment-mth"><a href="#"><img class="img img-fluid" src="{{asset('clientBunker')}}/images/icons/payment.png" alt="payment-image"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center text-md-start">
                                    <p class="copy-text"> © 2022 <strong>Hmart</strong> Made With <i class="fa fa-heart" aria-hidden="true"></i> By <a class="company-name" href="https://themeforest.net/user/codecarnival/portfolio">
                                            <strong> thanh1709</strong></a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End -->
    </div>



    <!-- Modal Cart -->
    <div class="modal customize-class fade" id="exampleModal-Cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to cart successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="{{asset('clientBunker')}}/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal wishlist -->
    <div class="modal customize-class fade" id="exampleModal-Wishlist" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to Wishlist successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="{{asset('clientBunker')}}/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal compare -->
    <div class="modal customize-class fade" id="exampleModal-Compare" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to compare successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="{{asset('clientBunker')}}/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
    <script src="{{asset('clientBunker')}}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins/scrollUp.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins/venobox.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins/jquery-ui.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins/mailchimp-ajax.js"></script>

    <!-- Minify Version -->
    <!-- <script src="{{asset('clientBunker')}}/js/vendor.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/plugins.min.js"></script>
    <script src="{{asset('clientBunker')}}/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="{{asset('clientBunker')}}/js/main.js"></script>

    {{-- giỏ hàng--}}
    <script>
        //thêm giỏ hàng
        function addToCart(event) {
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                success: function(data) {
                    if (data.code === 200) {
                        alert('Thêm sản phẩm thành công');
                    }
                },
                error: function() {

                }
            })
        }
        $(function() {
            $('.add-to-cart').on('click', addToCart);
        })


        //update giỏ hàng
        function cartUpdate(event){
            // event.preventDefault();
            let urlUpdateCart = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            // alert(quantity);
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function (data){
                    // console.log(data);
                    if(data.code === 200){
                        $('.cart-main-area').html(data.showCart);
                        alert('cập nhật sản phẩm thành công');
                    }
                },
                error: function (){

                }
            })
        }
        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
        })

        //xóa giỏ hàng
        function cartDelete(event) {
            let urlDeleteCart = $('.cart-main-area ').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: urlDeleteCart,
                data: {
                    id: id,
                },
                success: function (data){
                    // console.log(data);
                    if(data.code === 200){
                        $('.cart-main-area').html(data.showCart);
                        alert('xóa thành công');
                    }
                },
                error: function (){

                }
            })
        }
        $(function() {
            $(document).on('click', '.cart_delete', cartDelete);
        })
    </script>


</body>


<!-- Mirrored from htmldemo.net/hmart/hmart/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 03:32:49 GMT -->

</html>
