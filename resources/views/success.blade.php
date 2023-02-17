@extends('layouts.master')

@section('main-content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 4% !important; ">
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">
                <h4 class="shirt_text">{{$product->name}}</h4>
                <p class="price_text">Price  <span style="color: #262626;">INR {{$product->price}} </span></p>
                <div class="tshirt_img"><img src="{{ Vite::asset('resources/images/')}}{{$product->thumbnail_image}}"></div>
                <p> {{$product->description}} </p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <div class="alert alert-success">
                        Payment done successfully!
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <hr>
                            <a href="/" class="btn btn-info" >Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
