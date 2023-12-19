<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        DB::table('products')->insert([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect('/products');
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);

        return redirect('/products');
    }
}
