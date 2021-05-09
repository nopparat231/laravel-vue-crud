<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all()->toArray();
        return array_reverse($orders);      
    }

    
    public function store(Request $request)
    {
        $order = new Order([
            'user_id'       => '1',
            'menu_id'       => $request->input('id'),
            'orders_detail' => $request->input('orders_detail'),
            'order_status'  => '0'
        ]);
        $order->save();

        return response()->json('order created!');
    }

    public function show($id)
    {
        $order = Order::find($id);

        return response()->json($order);
    }

    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $order->update($request->all());

        return response()->json('order updated!');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return response()->json('order deleted!');
    }
}
