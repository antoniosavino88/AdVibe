<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishList extends Component
{
    
    public $ad;
    public $isFavorite = false;

    public function mount(Ad $ad)
    {
        $this->ad = $ad;
        $this->isFavorite = Auth::user()?->savedAds()->where('ad_id', $ad->id)->exists();
    }

    public function toggleSavedAds()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Se non loggato, reindirizza al login
        }

        if ($this->isFavorite) {
            Auth::user()->savedAds()->detach($this->ad->id);
            $this->isFavorite = false;
        } else {
            Auth::user()->savedAds()->attach($this->ad->id);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.wish-list');
    }

}
