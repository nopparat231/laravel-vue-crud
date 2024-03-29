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
  
        redirect('/home');
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
