<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['name'];

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }

}
