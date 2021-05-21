<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        $list = Guest::all();
        dd($list);
    }
}
