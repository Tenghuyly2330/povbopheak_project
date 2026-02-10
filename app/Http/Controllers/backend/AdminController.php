<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('backend.admin');
    }
    public function welcomToAdmin(){
        return view('backend.welcome');
    }
}
