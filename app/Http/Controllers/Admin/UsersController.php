<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
