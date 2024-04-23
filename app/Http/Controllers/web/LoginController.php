<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('web.login');
    }
    public function registration()
    {
        return view('web.registration');
    }
}
