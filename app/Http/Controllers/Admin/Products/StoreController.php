<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateRequest;

class StoreController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $request->validate();

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return back()->with('success', 'Successfully created a new product!');
    }
}
