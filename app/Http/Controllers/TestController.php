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
        $res = Storage::disk('upload')->exists('/upload/images/5ad81f017b611.png');
        dd($res);
        return view('test.index');
    }
}
