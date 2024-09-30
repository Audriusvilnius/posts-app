<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function langChange(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('language', $request->lang);
        return back();
    }

}