<?php

namespace App\Http\Controllers\account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCardController extends Controller
{
    public function index(Request $request)
    {      
        // dd('sadsa'); 
        $client = $request->user()->createSetupIntent();
        // $plans =Plan::where('slug', '!=', $request->user()->plan->slug)->get();                
        return view('account.subscriptions.card',compact('client'));
    }

    public function store(Request $request)
    {       
        $this->validate($request,[
            'token' => 'required',           
          ]);

        $request->user()->updateDefaultPaymentMethod($request->token);
       
        return redirect()->route('account.subscriptions');
    }
}
