@extends('layouts.master')
@section('main-content')
    <div class="banner_bg_main">
        <!-- header top section start -->

        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo"><a href="index.html"><img src="{{ Vite::asset('resources/images/logo.png') }}"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- logo section end -->

        <!-- banner section start -->
        <div class="banner_section layout_padding">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                            <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                            <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                            <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        </div>
        <!-- banner section end -->
    </div>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">Man & Woman Fashion</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">{{$product->name}}</h4>
                                        <p class="price_text">Price  <span style="color: #262626;">INR {{$product->price}} </span></p>
                                        <div class="tshirt_img"><img src="{{ Vite::asset('resources/images/')}}{{$product->thumbnail_image}}"></div>
                                        <div class="btn_main">
                                        <div class="buy_bt"><a href="product/{{ $product->slug }}">Buy Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
@endpush
