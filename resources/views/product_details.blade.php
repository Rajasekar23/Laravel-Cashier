@extends('layouts.master')

@section('main-content')

<div class="container">
    <div class="row justify-content-center" style="margin-top: 4% !important; ">
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">
                <h4 class="shirt_text">{{$product->name}}</h4>
                <p class="price_text">Price  <span style="color: #262626;">INR {{$product->price}} </span></p>
                <div class="tshirt_img"><img src="{{ Vite::asset('resources/images/')}}{{$product->thumbnail_image}}"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    You will be charged INR {{ number_format($product->price, 2) }} for {{ $product->name }} Plan
                </div>

                <div class="card-body">

                    <form id="payment-form" action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="payment_method" id="payment_method">


                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Card details</label>
                                    <div id="card-element"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                            <hr>
                                <button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $userSetupIntent->client_secret }}">Purchase</button>
                                <a href="/" class="btn btn-info" >Back</a>
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-danger" id="error_div" style="padding: 15px; margin-top: 15px; display:none;">
                         <span id="error_msg">  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disabled = false
            if(error.message){
                $('#error_div').show();
                $('#error_msg').html(error.message);
            }
        } else {
            $('#payment_method').val(setupIntent.payment_method);
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('description', 'test description')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            token.setAttribute('payment_method', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
</script>
@endsection
