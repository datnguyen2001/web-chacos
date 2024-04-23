<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index()
    {
        return view('web.my-account.index');
    }

    public function editAccount()
    {
        return view('web.my-account.edit-account');
    }

    public function address()
    {
        return view('web.my-account.address');
    }

    public function orderHistory()
    {
        return view('web.my-account.order-history');
    }

    public function wishlist()
    {
        return view('web.wishlist.index');
    }
}
