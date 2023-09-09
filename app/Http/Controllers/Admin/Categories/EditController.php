<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Categories\CategoryResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        return Inertia::render('Admin/Category/Edit', [
            'category' => $category
        ]);
    }
}
