<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany('App\MusicCategory', 'music_category_relations', 'music_id', 'category_id');
    }
}
