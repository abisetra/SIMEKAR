<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        return view('user.index', $data);
    }

    public function create()
    {
        $data['user'] = User::all();
        return view('user.create', $data);
    }
    
}
