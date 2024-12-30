<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function assignRole($userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);

        // Find the 'member' role
        $role = Role::where('name', $roleName)->first();

        // Assign the role to the user
        $user->roles()->attach($role);

        // Return a success message or redirect as needed
        return redirect()->back()->with('success', 'Role assigned successfully!');
    }
}
