<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch($lang)
    {
        // Allow only supported languages
        $available = ['en', 'kh', 'cn'];

        if (in_array($lang, $available)) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }

        return redirect()->back();
    }
}
