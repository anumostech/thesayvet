<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function indexUserDetail()
    {
        $userDetails = UserDetail::with('user')->get();
        return view('user_details.index', [
            'userDetails' => $userDetails
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('user_details.create', compact('users'));
    }

    public function storeUserDetail(Request $request)
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

        $userDetail = new UserDetail();
        $userDetail->user_id = $request->user_id;
        $userDetail->first_name = $request->first_name;
        $userDetail->last_name = $request->last_name;
        $userDetail->email = $request->email;
        $userDetail->phone = $request->phone;
        $userDetail->type = $request->type;

        $userDetail->save();

        return redirect()->back()->with('success', 'User detail added successfully');
    }

    public function editUserDetail($id)
    {
        $userDetail = UserDetail::findOrFail($id);
        $users = User::all();

        return view('user_details.edit', [
            'user_details' => $userDetail,
            'users' => $users
        ]);
    }

    public function updateUserDetail(Request $request, $id)
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

        return redirect()->back()->with('success', 'User detail updated successfully');
    }

    public function deleteUserDetail($id)
    {
        $userDetail = UserDetail::findOrFail($id);
        $userDetail->delete();
        
        return redirect()->back()->with('success', 'User detail deleted successfully');
    }
}
