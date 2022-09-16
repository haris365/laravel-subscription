<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Rules\ValidCoupon;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionController extends Controller
{
    public function __construct()
    {
         $this->middleware(['auth','not.subscribed']);
    }

    public function index(Request $request)
    {
     
        $client = $request->user()->createSetupIntent();

        return view('subscriptions.checkout',compact('client'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'token' => 'required',
        'coupon' => [
          'nullable',
          new ValidCoupon
        ],
          'plan' => 'required|exists:plans,slug'
        ]);

      $plan = Plan::where('slug',$request->get('plan','monthly'))->first();
      
       try{
          $request->user()->newSubscription('default',$plan->stripe_id)
          ->withCoupon($request->coupon)
          ->create($request->token);

       }catch(IncompletePayment $e){
         return redirect()->route('cashier.payment',
         [$e->payment->id, 'redirect' => route('account.subscriptions')]

         );

       }

      return back();
    }
}
