<?php

namespace App\Http\Controllers\Admin\Products;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Products\ProductResource;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = Product::paginate(10)->withQueryString();

        $products = ProductResource::collection($data);

        return Inertia::render('Admin/Product/Index', [
            'products' => $products
        ]);
    }
}
