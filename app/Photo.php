<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany('App\PhotoCategory', 'photo_category_relations', 'photo_id', 'category_id');
    }
}
