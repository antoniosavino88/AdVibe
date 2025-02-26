<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function indexRev()
    {
        $ad_to_check = Ad::where('is_accepted', null)->first();
        return view('revisor.index_rev', compact('ad_to_check'));
    }
}
