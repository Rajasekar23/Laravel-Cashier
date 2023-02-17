<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Domain\Products\Models\Product;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProduct(Request $request)
    {
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->first();
        $user = Auth::user();

        return view('product_details')->with('product', $product)->with('userSetupIntent', $user->createSetupIntent());
    }


    public function checkout(Request $request)
    {
        $user = Auth::user();
        $productId = $request->product_id;
        $product = Product::find($productId);

        $amount = ($product->price) * 100;
        $paymentMethodId = $request->payment_method;

        $user->createOrGetStripeCustomer(['name'=> 'Rajasekar',
                                        'address' => ["city" => 'Madurai', "country" => 'India',
                                        "line1" => "Pasumalai",
                                        "line2" => "", "postal_code" => '625004',
                                        "state" => 'Tamilnadu']
                ]);
        $paymentMethod = $user->addPaymentMethod($paymentMethodId);
        $user->charge($amount, $paymentMethodId, ['off_session' => true, 'description' => 'test desc', 'currency' => 'INR']);
        $url = 'success/'.$product->id;
        return redirect($url);
    }

    /**
     *
     */
    public function success(Request $request){

        $product = Product::find($request->product_id);
        return view('success')->with('product', $product);

    }


}
