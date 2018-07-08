<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function charge(Request $request)
    {
        dd($request->all());
    }
}
