<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with(['customer','items'])->latest()->get();
    }

    public function store(Request $request)
    {
        return Order::create($request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'subtotal' => 'required|numeric',
            'vat_amount' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'order_status' => 'required'
        ]));
    }

    public function show($id)
    {
        return Order::with('items')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return $order;
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return response()->json(['message' => 'Order deleted']);
    }
}

