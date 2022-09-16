<?php

namespace App\Http\Controllers\account\Subscriptions;

use App\Http\Controllers\Controller;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
       
        return view('account.subscriptions.coupon');

    }

    public function store(Request $request)
    {
        $this->validate($request,[          
            'coupon' => [
                'required',
                new ValidCoupon
            ],
        ]);

        $request->user()->subscription('default')->updateStripeSubscription([
            'coupon' => $request->coupon
        ]);

        return redirect()->route('account.subscriptions');

    }
}
