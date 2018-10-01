<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function pessoas(){
        return view('admin.menu.pessoa');
    }
    public function cargo(){
        return view('admin.menu.cargo');
    }
    public function servico(){
        return view('admin.menu.servico');
    }
}
