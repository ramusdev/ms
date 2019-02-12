<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminProductController extends Controller
{
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin/product-edit', compact('product'));
    }

    public function add()
    {
        return view('admin/product-add');
    }

    public function storeMain(Request $request, $id = 0)
    {
        $product = Product::firstOrCreate([
            'id' => $id
        ]);

        $product->title = $request->title;
        $product->description = $request->description;

        if ($product->save()) {
            return redirect()->action('AdminProductController@edit', ['id' => $product->id])->with('message', 'Информация обновлена!');
        }
    }

    public function storePrice(Request $request, $id = 0)
    {
        $product = Product::firstOrCreate([
            'id' => $id,
        ]);

        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->status = $request->status;

        if ($product->save()) {
            return redirect()->action('AdminProductController@edit', ['id' => $product->id])->with('message', 'Информация обновлена!');
        }
    }


}
