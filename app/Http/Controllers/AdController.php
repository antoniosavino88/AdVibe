<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     public static function middleware(): array
     {
         return [
             new Middleware('auth', only: ['insertAd']),
         ];
     }

    public function insertAd()
    {
        // $categories = Category::all();

        return view('ad.insert_ad');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adIndex()
    {
        $ads = Ad::orderBy('created_at', 'desc')->paginate(6);
        return view('ad.ad_index', compact('ads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function adShow(Ad $ad)
    {
        return view('ad.ad_show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //
    }
    public function adCategory(Category $category){
        // $ads = Ad::all();
        return view ('ad.ad_category', ['ads' => $category->ads, 'category' => $category]);
    }
}
