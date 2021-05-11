<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function Language($lang)
    {
        $langs = config('my.langs');
        if(isset($langs['lang']));
            session(['lang'=>$lang]);
        return redirect()->back();
    }
}
