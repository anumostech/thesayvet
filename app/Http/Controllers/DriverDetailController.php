<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverDetail;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        return DriverDetail::latest()->get();
    }

    public function store(Request $request)
    {
        return DriverDetail::create($request->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
            'assigned_by' => 'nullable|exists:users,id',
            'assigned_date' => 'nullable|date'
        ]));
    }

    public function update(Request $request, $id)
    {
        $driver = DriverDetail::findOrFail($id);
        $driver->update($request->all());
        return $driver;
    }

    public function destroy($id)
    {
        DriverDetail::findOrFail($id)->delete();
        return response()->json(['message' => 'Driver deleted']);
    }
}

