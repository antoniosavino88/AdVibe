<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InsertAd extends Component
{

    public $title;
    public $price;
    public $description;
    public $category_id;
    public $categories;
    // public $users;

    public function adCreate(){
        Ad::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id
        ]);
        // dd($this->categories);
        $this->clearForm();
    }
    protected function clearForm(){
         $this->title= '';
         $this->price= '';
         $this->description= '';
    }

    public function render()
    {
        return view('livewire.insert-ad');
    }
}
