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
    public function indexRev()
    {
        $ad_to_check = Ad::where('is_accepted', null)->first();
        return view('revisor.index_rev', compact('ad_to_check'));
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

    public function becomeRevisor(){

        Mail::to('admin@advibe.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('welcome')->with('message', 'Richiesta inviata con successo!');
    }

    public function makeRevisor(User $user){
        Artisan::call("app:make-user-revisor",['email'=>$user->email]);
        return redirect()->back();
    }
}
