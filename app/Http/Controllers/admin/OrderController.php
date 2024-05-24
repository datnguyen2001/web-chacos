<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page_menu = 'order';

        $orders = Order::with('users')->orderBy('id', 'desc')->get();

        return view('admin.order.index')->with(compact('page_menu', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tracking_code)
    {
        $page_menu = 'order';

        $order = Order::where('tracking_code', $tracking_code)->first();

        //Load relationship
        $order->load('orderDetails.productInfo.color.product');

        return view('admin.order.detail')->with(compact('page_menu', 'order', 'tracking_code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
