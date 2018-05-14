<?php

namespace App\Http\Controllers;

use App\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UploadFileController extends Controller
{
    public function images(Request $request)
    {
        if(!$request->has('files') || !$request->file('files') || !is_array($request->file('files'))) {
            return response()->json(['status' => 'fail', 'info' => '无文件']);
        }

        if(!$request->has('class') || !$request->input('class')) {
            $class = $request->input('class');
        } else {
            $class = '未分类';
        }
        $fileList = collect();
        foreach($request->file('files') as $item) {
            $fileName = uniqid() . '.' . $item->extension();
            $date = date("Ymd");
            $res = $item->storeAs('upload/images' . '/' . $date, $fileName, 'upload');

            if($res) {
                $res = '/' . $res;
                UploadFile::create([
                    'path' => $res,
                    'name' => $fileName,
                    'type' => $item->getClientMimeType(),
                    'class' => $class,
                    'size' => $item->getClientSize()
                ]);
                $fileList->push($res);
            }
        }
        return response()->json(['status' => 'success', 'fileList' => $fileList->toArray()]);
    }
}
