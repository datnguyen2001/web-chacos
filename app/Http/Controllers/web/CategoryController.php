<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($slug)
    {
        return view('web.category.index');
    }
    public function search()
    {
        return view('web.category.search');
    }
}
