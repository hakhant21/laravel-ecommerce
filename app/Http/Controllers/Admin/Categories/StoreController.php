<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateRequest;

class StoreController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $request->validate();

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        return back()->with('success', 'Successfully created a new category!');
    }
}
