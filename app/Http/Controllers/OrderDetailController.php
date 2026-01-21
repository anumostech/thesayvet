<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function store(Request $request)
    {
        return OrderDetail::create($request->validate([
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id',
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'vat_amount' => 'numeric',
            'total_price' => 'required|numeric'
        ]));
    }

    public function destroy($id)
    {
        OrderDetail::findOrFail($id)->delete();
        return response()->json(['message' => 'Item removed']);
    }
}
