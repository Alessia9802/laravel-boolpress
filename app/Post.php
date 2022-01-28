<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'cover', 'decription', 'slug', 'category_id'];
    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);


}

}
