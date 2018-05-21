<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    protected $table = 'photo_categories';

    protected $guarded = [];

    public function photos()
    {
        return $this->belongsToMany('App\Photo', 'photo_category_relations', 'category_id', 'photo_id');
    }
}
