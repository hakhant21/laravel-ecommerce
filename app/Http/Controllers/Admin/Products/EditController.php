<?php

namespace App\Http\Controllers\Admin\Products;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Admin/Product/Edit');
    }
}
