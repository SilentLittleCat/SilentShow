<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('web.index.index');
    }

    public function contact()
    {
        return view('web.index.contact');
    }
}
