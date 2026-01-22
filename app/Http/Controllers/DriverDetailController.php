<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\DriverDetail;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function indexDriver()
    {
        $drivers = DriverDetail::latest()->get();

        return view('account.drivers.drivers-list', [
            'drivers' => $drivers
        ]);
    }

    public function addDriver()
    {
        return view('account.drivers.drivers-add');
    }

    public function storeDriver(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:150',
            'phone'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:150',
            'address'       => 'nullable|string',
            'assigned_by'   => 'nullable|exists:users,id',
            'assigned_date' => 'nullable|date',
        ]);

        DriverDetail::create($data);

        return redirect()
            ->route(RouteNames::DRIVER_LIST)
            ->with('success', 'Driver added successfully');
    }

    public function showDriver($id)
    {
        $driver = DriverDetail::findOrFail($id);

        return view('account.drivers.drivers-show', [
            'driver' => $driver
        ]);
    }

    public function editDriver($id)
    {
        $driver = DriverDetail::findOrFail($id);

        return view('account.drivers.drivers-edit', [
            'driver' => $driver
        ]);
    }

    public function updateDriver(Request $request, $id)
    {
        $driver = DriverDetail::findOrFail($id);

        $data = $request->validate([
            'name'          => 'required|string|max:150',
            'phone'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:150',
            'address'       => 'nullable|string',
            'assigned_by'   => 'nullable|exists:users,id',
            'assigned_date' => 'nullable|date',
        ]);

        $driver->update($data);

        return redirect()
            ->route(RouteNames::DRIVER_LIST)
            ->with('success', 'Driver updated successfully');
    }

    public function deleteDriver($id)
    {
        $driver = DriverDetail::findOrFail($id);
        $driver->delete(); // soft delete

        return redirect()
            ->route(RouteNames::DRIVER_LIST)
            ->with('success', 'Driver deleted successfully');
    }
}
