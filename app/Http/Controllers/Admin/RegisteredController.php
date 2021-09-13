<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisteredController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role_as', $request->input('roles'))->get();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user_roles = User::find($id);
        return view('admin.users.edit')->with('user_roles', $user_roles);
    }

    public function updaterole(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role_as = $request->input('roles');
        $user->isban = $request->input('isban');
        $user->update();
        return redirect()->back()->with('status', "Role is Updated");

    }
}
