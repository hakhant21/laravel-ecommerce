<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CreateController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Admin/Category/Create');
    }
}
