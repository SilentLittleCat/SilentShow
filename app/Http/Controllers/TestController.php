<?php

namespace App\Http\Controllers;

use App\Photo;
use App\PhotoCategory;
use App\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $item = (new PhotoCategory())->find(10)->photos;
        dd($item);
        return view('test.index');
    }
}
