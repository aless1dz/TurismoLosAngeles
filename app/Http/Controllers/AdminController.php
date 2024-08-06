<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('admin');
    // }

    public function index()
    {
        // Lógica del dashboard de admin
        return view('adminFold.dashboard');
    }
}

