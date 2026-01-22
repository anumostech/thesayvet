<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function indexCustomer()
    {
        $customers = Customer::where('status', 'active')->get();
        return view('account.customers.customers-list', [
            'customers' => $customers
        ]);
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'phone' => 'nullable',
            'email' => 'required|email|unique:customers',
            'customer_type' => 'required|in:individual,organization',
            'address' => 'nullable',
            'status' => 'required|in:active,inactive'
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->customer_type = $request->customer_type;
        $customer->address = $request->address;
        $customer->status = 'active';

        $customer->save();

        return redirect()->route(RouteNames::CUSTOMER_LIST)->with('success', 'Customer added successfully');
    }

    public function showCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('account.customers.customers-show', [
            'customer' => $customer
        ]); 
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route(RouteNames::CUSTOMER_LIST)->with('success', 'Customer updated successfully');
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        
        return redirect()->route(RouteNames::USER_LIST)->with('success', 'Customer deleted successfully');
    }
}
