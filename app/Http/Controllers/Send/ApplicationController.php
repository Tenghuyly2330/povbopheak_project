<?php

namespace App\Http\Controllers\Send;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'sex' => 'required|string',
            'experience' => 'required|string',
            'position' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        //  SEND TO DIFFERENT GMAIL
        Mail::to('admin@povbopheak.com')->send(new ApplicationMail($data));

        return back()->with('successfully', 'Application submitted successfully!');
    }


}
