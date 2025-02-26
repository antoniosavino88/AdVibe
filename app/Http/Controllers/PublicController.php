<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome()
    {
        $ads = Ad::take(4)->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('ads'));
    }
}
