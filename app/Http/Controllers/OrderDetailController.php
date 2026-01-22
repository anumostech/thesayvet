<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function addOrderItem($orderId)
    {
        $order    = Order::findOrFail($orderId);
        $products = Product::where('status', 'active')->get();

        return view('account.order-details.order-items-add', [
            'order'    => $order,
            'products' => $products
        ]);
    }

    public function storeOrderItem(Request $request)
    {
        $data = $request->validate([
            'user_id'     => 'required|exists:users,id',
            'order_id'    => 'required|exists:orders,id',
            'category_id' => 'required|exists:categories,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|integer|min:1',
            'unit_price'  => 'required|numeric',
            'vat_amount'  => 'nullable|numeric',
            'total_price' => 'required|numeric',
        ]);

        OrderDetail::create($data);

        return redirect()
            ->route(RouteNames::ORDER_SHOW, $request->order_id)
            ->with('success', 'Order item added successfully');
    }

    public function deleteOrderItem($id)
    {
        $item = OrderDetail::findOrFail($id);
        $orderId = $item->order_id;

        $item->delete(); // soft delete

        return redirect()
            ->route(RouteNames::ORDER_SHOW, $orderId)
            ->with('success', 'Order item removed successfully');
    }
}
