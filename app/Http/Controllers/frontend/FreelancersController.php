<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FreelancersController extends Controller
{
    public function Freelancers(){
        return view('frontend.layout.freelancers');
    }
}
