<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexOrder()
    {
        $orders = Order::with(['customer', 'items'])
            ->latest()
            ->get();

        return view('account.orders.orders-list', [
            'orders' => $orders
        ]);
    }

    public function addOrder()
    {
        $customers = Customer::where('status', 'active')->get();

        return view('account.orders.orders-add', [
            'customers' => $customers
        ]);
    }

    public function storeOrder(Request $request)
    {
        $data = $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'order_date'   => 'required|date',
            'subtotal'     => 'required|numeric',
            'vat_amount'   => 'required|numeric',
            'total_amount' => 'required|numeric',
            'order_status' => 'required|string',
        ]);

        Order::create($data);

        return redirect()
            ->route(RouteNames::ORDER_LIST)
            ->with('success', 'Order created successfully');
    }

    public function showOrder($id)
    {
        $order = Order::with(['customer', 'items.product'])
            ->findOrFail($id);

        return view('account.orders.orders-show', [
            'order' => $order
        ]);
    }

    public function editOrder($id)
    {
        $order     = Order::findOrFail($id);
        $customers = Customer::where('status', 'active')->get();

        return view('account.orders.orders-edit', [
            'order'     => $order,
            'customers' => $customers
        ]);
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $data = $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'order_date'   => 'required|date',
            'subtotal'     => 'required|numeric',
            'vat_amount'   => 'required|numeric',
            'total_amount' => 'required|numeric',
            'order_status' => 'required|string',
        ]);

        $order->update($data);

        return redirect()
            ->route(RouteNames::ORDER_LIST)
            ->with('success', 'Order updated successfully');
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete(); // soft delete

        return redirect()
            ->route(RouteNames::ORDER_LIST)
            ->with('success', 'Order deleted successfully');
    }
}
