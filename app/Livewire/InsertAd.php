<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class InsertAd extends Component
{

    #[Validate('required', message: 'Devi riempire il campo "Titolo"!')]
    #[Validate('min:5', message: 'Il titolo dell\'annuncio deve avere minimo 5 caratteri!')]
    public $title;
    #[Validate('required', message: 'Devi riempire il campo "Prezzo"!')]
    public $price;
    #[Validate('required', message: 'Devi riempire il campo "Descrizione"!')]
    public $description;
    #[Validate('required', message: 'Devi selezionare una categoria!')]
    public $category_id;
    // public $users;

    public function adCreate(){

        $this->validate();

        Ad::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id
        ]);
        // dd($this->categories);
        $this->clearForm();
        return redirect()->route('insert_ad')->with('success', 'Annuncio creato con successo!');
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
