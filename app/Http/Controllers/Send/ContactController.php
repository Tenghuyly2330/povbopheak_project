<?php

namespace App\Http\Controllers\Send;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'full_name'     => 'required|string',
            'buyer_type'    => 'required',
            'country'       => 'required',
            'budget_range'  => 'required',
            'phone'         => 'required',
            'prefre_locate' => 'required',
            'email'         => 'required|email',
            'plannig_buy'   => 'required',
        ]);

       Mail::to('sales@povboheak.com')->send(new ContactMail($data));

        return back()->with('success', 'Contact Form submitted successfully!');
    }
}

//vinsolang9@gmail.com