<?php

namespace App\Http\Controllers;

use App\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $path = '/upload/images/20180514/5af97c03bfe72.jpeg';
        $res = Storage::disk('upload')->exists($path);
        $res_1 = UploadFile::where('path', $path)->get();
        dd($res, $res_1);
        return view('test.index');
    }
}
