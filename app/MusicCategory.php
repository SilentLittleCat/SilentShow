<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicCategory extends Model
{
    protected $table = 'music_categories';

    protected $guarded = [];

    public function photos()
    {
        return $this->belongsToMany('App\Music', 'music_category_relations', 'category_id', 'music_id');
    }
}
