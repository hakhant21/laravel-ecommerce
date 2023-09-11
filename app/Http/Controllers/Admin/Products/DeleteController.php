<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Successfully deleted product!');
    }
}
