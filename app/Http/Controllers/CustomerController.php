<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::with('user')->latest()->get();
    }

    public function store(Request $request)
    {
        return Customer::create($request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'phone' => 'nullable',
            'email' => 'required|email|unique:customers',
            'customer_type' => 'required|in:individual,organization',
            'address' => 'nullable',
            'status' => 'required|in:active,inactive'
        ]));
    }

    public function show($id)
    {
        return Customer::with('orders')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return $customer;
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return response()->json(['message' => 'Customer deleted']);
    }
}

