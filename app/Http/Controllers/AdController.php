<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            new Middleware('auth', only: ['insertAd', 'myAds']),
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
        $ads = Ad::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);
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
    public function adCategory(Category $category)
    {
        // $ads = Ad::all();
        $ads = $category->ads->where('is_accepted', true);
        return view('ad.ad_category', compact('ads', 'category'));
    }

    // FUNZIONE DI RICERCA DELLA DOCUMENTAZIONE:
    // public function searchAds(Request $request)
    // {
    //     $query = $request->input('query');
    //     $ads = Ad::search($query)->where('is_accepted', true)->paginate(10);
    //     // dd($ads);
    //     return view('ad.ad_search', ['ads' => $ads, 'query' => $query]);
    // }
    // FUNZIONE DI RICERCA CUSTOM:
    public function searchAds(Request $request)
    {
        $query = $request->input('query');

        $ads = Ad::where('is_accepted', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhereHas('category', function ($q) use ($query) {
                        $q->where('name', 'LIKE', "%{$query}%");
                    });
            })
            ->paginate(10);

        return view('ad.ad_search', ['ads' => $ads, 'query' => $query]);
    }
    
    // FUNZIONE MOSTRA WISHLIST
    public function myAds (){
        $myAds = Auth::user()->ads()->orderBy('created_at', 'desc')->get();
        $favoriteAds = Auth::user()->savedAds()->orderBy('created_at', 'desc')->get();

        return view('ad.my_ads', compact('myAds', 'favoriteAds'));
    }
}
