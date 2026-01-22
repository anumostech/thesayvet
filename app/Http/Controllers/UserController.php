<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexUser()
    {
        $users = User::with('users.userdetails')->where('status', 'active')->get();
        return view('account.users.users-list', [
            'users' => $users
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'type' => 'required|in:admin,staff,customer',
            'status' => 'required|in:active,inactive'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->status = 'active';

        $user->save();

        return redirect()->route(RouteNames::USER_LIST)->with('success', 'User added successfully');
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('account.users.users-show', [
            'user' => $user
        ]); 
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'username' => 'sometimes|unique:users,username,' . $id,
            'password' => 'nullable|min:6',
            'type' => 'sometimes',
            'status' => 'sometimes'
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route(RouteNames::USER_LIST)->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route(RouteNames::USER_LIST)->with('success', 'User deleted successfully');
    }
}
