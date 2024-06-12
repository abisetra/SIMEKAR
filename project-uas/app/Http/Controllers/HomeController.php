<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('dashboard.admin');
         } elseif (Gate::allows('direktur')) {
            return view('dashboard.direktur');
         } elseif (Gate::allows('hrd')) {
            return view('dashboard.hrd');
         } elseif (Gate::allows('karyawan')) {
            return view('dashboard.karyawan');
         } else {
            return abort(403);
         }
    }
}
