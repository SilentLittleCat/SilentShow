<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadFile extends Model
{
    protected $guarded = [];

    public static function deleteImage($path)
    {
        $path = trim($path);
        if(isset($path) && !empty($path)) {
            if(Storage::disk('upload')->exists($path)) {
                Storage::disk('upload')->delete($path);
                self::where('path', $path)->delete();
            }
        }
    }
}
