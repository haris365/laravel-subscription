<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    
    public function index()
    {
        $plans = Plan::all();
       
        return view('subscriptions.plan',compact('plans'));
    }
    
    public function home_index()
    {
        return view('home');
    }
}
