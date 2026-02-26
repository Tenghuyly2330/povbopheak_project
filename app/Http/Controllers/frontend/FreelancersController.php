<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreelancersController extends Controller
{
    public function Freelancers(){
        $visitorCount = DB::table('visitor_count')->first()->count;

        return view('frontend.layout.freelancers', compact('visitorCount'));
    }
}
