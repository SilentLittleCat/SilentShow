<?php

namespace App\Http\Controllers\Friends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('friends.index.index');
    }
}
