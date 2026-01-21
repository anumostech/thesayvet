<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        $userDetails = UserDetail::with('user')->get();
        return view('user_details.index', compact('userDetails'));
    }

    public function create()
    {
        $users = User::all();
        return view('user_details.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string',
            'type'       => 'required|in:admin,sales,accounts,warehouse',
        ]);

        UserDetail::create($request->all());

        return redirect()->back()->with('success', 'User detail created');
    }

    public function edit($id)
    {
        $userDetail = UserDetail::findOrFail($id);
        $users = User::all();

        return view('user_details.edit', compact('userDetail', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string',
            'type'       => 'required|in:admin,sales,accounts,warehouse',
        ]);

        $userDetail = UserDetail::findOrFail($id);
        $userDetail->update($request->all());

        return redirect()->back()->with('success', 'User detail updated');
    }

    public function destroy($id)
    {
        UserDetail::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User detail deleted');
    }
}
