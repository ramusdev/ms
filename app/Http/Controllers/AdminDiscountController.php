<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class AdminDiscountController extends Controller
{
    public function show()
    {
        //echo 'from show controller';

        return view('/admin/discounts');
    }

    public function add(Request $request)
    {

        $request->validate([
            'code' => 'required',
            'discount' => 'required|integer|max:100'
        ]);
        
        $discount = new Discount();
        $discount->code = $request->code;
        $discount->discount = $request->discount;
        $discount->save();

        return redirect()->back();
    }
}
