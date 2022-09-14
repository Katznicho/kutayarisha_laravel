<?php

namespace App\Http\Controllers;

use App\Models\PlanModel;
use Illuminate\Http\Request;


class PricingController extends Controller
{
    //
    public function index(Request $request){
        return view('pricing.pricing');
    }

    //subscription
    public function subscription(Request $request, $package){
        //get the price of the package from the database like the package name

        $details = PlanModel::where('name', $package)->first();
        

        return view('pricing.setup', compact('package', 'details'));
    }
}
