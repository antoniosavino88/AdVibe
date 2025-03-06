<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InsertAd extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_images;

    #[Validate('required|max:100')]
    public $title;
    #[Validate('required|max:8')]
    public $price;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $category_id;

public function formatPrice()
    {
        $numericValue = str_replace(',', '.', $this->price);

        if (is_numeric($numericValue)) {
            $this->price = number_format((float) $numericValue, 2, '.', '');
        } else {
            $this->price = 0.00;
        }

        $this->validateOnly('price');
    }

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
                // VECCHIO CODICE:
                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));

                // NUOVO CODICE:
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
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
            'temporary_images' => 'max:5'
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
