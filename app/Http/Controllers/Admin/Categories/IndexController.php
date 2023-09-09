<?php

namespace App\Http\Controllers\Admin\Categories;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Admin/Category/Index');
    }
}
