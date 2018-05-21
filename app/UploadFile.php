<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
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

    public static function upload(UploadedFile $item)
    {
        $fileName = uniqid() . '.' . $item->extension();
        $date = date("Ymd");
        $res = $item->storeAs('upload/files' . '/' . $date, $fileName, 'upload');

        if($res) {
            $res = '/' . $res;
            self::create([
                'path' => $res,
                'name' => $fileName,
                'type' => $item->getClientMimeType(),
                'size' => $item->getClientSize()
            ]);
        }
        return $res;
    }
}
