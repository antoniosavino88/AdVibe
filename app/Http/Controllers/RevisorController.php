<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Routing\Controllers\HasMiddleware;

class RevisorController extends Controller
{
    // public function indexRev()
    // {
    //     $ad_to_check = Ad::where('is_accepted', null)->first();
    //     return view('revisor.index_rev', compact('ad_to_check'));
    // }

    //     public function indexRev()
    // {
    //     $ad_to_check = Ad::where('is_accepted', null)
    //         ->where('user_id', '!=', Auth::id()) // Esclude gli annunci dell'utente attuale
    //         ->first();

    //         dd($ad_to_check);

    //     return view('revisor.index_rev', compact('ad_to_check'));
    // }

    // public function indexRevReject()
    // {
    //     // Recupera tutti gli annunci rifiutati (is_accepted = false)
    //     $ads_to_reject = Ad::where('is_accepted', false)
    //     ->where('user_id', '!=', Auth::id()) // Esclude gli annunci creati dall'utente attuale
    //     ->get(); // Usa get() per ottenere tutti i risultati, non solo il primo

    //     return view('revisor.index_rev', compact('ads_to_reject'));
    // }

    public function indexRev()
    {
        // Recupera gli annunci in attesa di revisione (is_accepted = null)
        $ad_to_check = Ad::with(['images', 'category', 'user'])
            ->where('is_accepted', null)
            ->where('user_id', '!=', Auth::id())
            ->first();

        // Recupera gli annunci rifiutati (is_accepted = false)
        $ads_to_reject = Ad::with(['images', 'category', 'user'])
            ->where('is_accepted', false)
            ->where('user_id', '!=', Auth::id())
            ->get();

        $ads_to_accepted = Ad::with(['images', 'category', 'user'])
            ->where('is_accepted', true)
            ->where('user_id', '!=', Auth::id())
            ->get();


        return view('revisor.index_rev', compact('ad_to_check', 'ads_to_reject', 'ads_to_accepted'));
    }



    public function accept(Ad $ad)
    {
        $ad->setAccepted(true);
        return redirect()->back()->with('success', "Hai accettato l'annuncio $ad->title");
    }

    public function reject(Ad $ad)
    {
        $ad->setAccepted(false);
        return redirect()->back()->with('rejectMessage', "Hai rifiutato l'annuncio $ad->title");
    }

    public function becomeRevisor()
    {

        Mail::to('admin@advibe.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('welcome')->with('message', 'Richiesta inviata con successo!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call("app:make-user-revisor", ['email' => $user->email]);
        return redirect()->back();
    }

    //     public function undoLastAction()
    // {
    //     // Trova l'ultimo annuncio modificato dal revisore attuale
    //     $lastAd = Ad::whereNotNull('is_accepted')
    //                 ->orderBy('updated_at', 'desc')
    //                 ->first();

    //     if ($lastAd) {
    //         $lastAd->is_accepted = null;
    //         $lastAd->save();

    //         return redirect()->back()->with('success', "L'ultima azione sull'annuncio '{$lastAd->title}' è stata annullata.");
    //     }

    //     return redirect()->back()->with('error', 'Nessuna operazione recente da annullare.');
    // }

    public function undoAdAction(Ad $ad)
    {
        $ad->is_accepted = null;
        $ad->save();

        return redirect()->back()->with('success', "L'azione sull'annuncio '{$ad->title}' è stata annullata.");
    }
}
