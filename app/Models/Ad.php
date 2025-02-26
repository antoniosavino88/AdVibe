<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Routing\Controllers\HasMiddleware;
use Laravel\Scout\Searchable;

class Ad extends Model
{
    use Searchable;

    protected $fillable = ['title', 'description', 'price','user_id','category_id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

<<<<<<< HEAD
    public static function toBeRevisedCount(){
        return Ad::where('is_accepted', null)->count();
=======
    public function toSearchableArray()
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'description' =>$this->description,
            'category' =>$this->category
        ];
>>>>>>> c300b1e0ed6d33bc4d562d2bb51b5e896c35da0b
    }
}

