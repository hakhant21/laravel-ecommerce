<?php

namespace App\Http\Controllers\Admin\Categories;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Categories\CategoryResource;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = Category::when($request->filterName, function($filterName, $query) {
                        $query->where('name', "%{$filterName}%");
                })->paginate(10)->withQueryString();

        $categories = CategoryResource::collection($data);

        return Inertia::render('Admin/Category/Index', [
            'categories' => $categories,
            'filters' => $request->only('name')
        ]);
    }
}
