<?php

namespace App\Http\Controllers\account\Subscriptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionSwapRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;


class SubscriptionSwapController extends Controller
{


    public function index(Request $request)
    {       
        $plans =Plan::where('slug', '!=', $request->user()->plan->slug)->get();                
        return view('account.subscriptions.swap' , compact('plans'));
    }

    public function store(SubscriptionSwapRequest $request)
    {
     
      try
      {
        // dd('saf',$request->user()->subscription('default'));
        $request->user()->subscription('default')
        ->swap(Plan::where('slug',$request->plan)->first()->stripe_id);
       return redirect()->route('account.subscriptions');
      }
      catch(IncompletePayment $e){
        // dd('sasf');
        return redirect()->route('cashier.payment',
        [$e->payment->id, 'redirect' => route('account.subscriptions')]

        );

      }
    }
}
