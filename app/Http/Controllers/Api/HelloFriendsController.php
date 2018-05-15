<?php

namespace App\Http\Controllers\Api;

use App\LearnFun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelloFriendsController extends Controller
{
    public function getLearnFun(Request $request)
    {
        $offset = $request->has('offset') ? (int) $request->input('offset') : 0;
        $limit = $request->has('limit') ? (int) $request->input('limit') : 5;
        $items = LearnFun::orderBy('updated_at', 'desc')->offset($offset)->limit($limit)->get()->each(function ($item) {
            $item->image = url($item->image);
        });
        return response()->json($items->toArray(), 200);
    }
}
