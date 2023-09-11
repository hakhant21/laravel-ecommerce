<?php

namespace App\Http\Controllers\Admin\Products;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        return Inertia::render('Admin/Product/Edit', [
            'categories' => Category::select('id', 'name')->get(),
            'product' => $product
        ]);
    }
}
