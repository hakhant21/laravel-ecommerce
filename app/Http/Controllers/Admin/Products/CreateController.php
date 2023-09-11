<?php

namespace App\Http\Controllers\Admin\Products;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Admin/Product/Create', [
             'categories' => Category::select('id', 'name')->get(),
        ]);
    }
}
