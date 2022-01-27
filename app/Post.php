<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
    //protected $fillable = ['title', 'cover', 'decription'];
    
}

}
