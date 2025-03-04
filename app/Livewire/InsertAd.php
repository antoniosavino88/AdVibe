<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InsertAd extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_images;

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

    public function adCreate()
    {

        $this->validate();

        $this->ad = Ad::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "ads/{$this->ad->id}";
                $newImage = $this->ad->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 300, 300));
                // // $ad->images()->create([
                // //     'path' => $image->store('images', 'public')
                // ]);
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        $this->clearForm();
        return redirect()->route('insert_ad')->with('success', ' ');
    }
    protected function clearForm()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->images = [];
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function render()
    {
        return view('livewire.insert-ad');
    }
}
