<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function getUsers()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the name, username, email, mobile fields from users.
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('username', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('mobile', 'LIKE', "%{$search}%")
            ->get();

        // Return the dashboard view with the searched users
        return view('dashboard', compact('users'));
    }

    public function show(User $user)
    {
        # code...
    }

    public function edit(User $user)
    {
        # code...
    }
}
