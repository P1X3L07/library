<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Ensure the user is a staff member before accessing these routes
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:staff'); // Add middleware to ensure only staff can access these routes
    }

    public function assignRole($userId, $roleName)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);

        // Find the role by name
        $role = Role::where('name', $roleName)->first();

        // Check if the role exists
        if ($role) {
            // Attach the role to the user
            $user->roles()->attach($role);
            return redirect()->route('home')->with('success', 'Role assigned successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Role not found.');
        }
    }

    // Display staff dashboard
    public function index()
    {
        return view('home');
    }
}
