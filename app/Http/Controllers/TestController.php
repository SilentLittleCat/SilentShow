<?php

namespace App\Http\Controllers;

use App\Photo;
use App\PhotoCategory;
use App\UploadFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(Request $request)
    {
        Carbon::setLocale('zh');
        return view('test.index');
    }
}
